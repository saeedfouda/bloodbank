<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Category;
use App\Models\Post;
use App\Models\Contact;
use App\Models\BloodType;
use App\Models\Setting;
use App\Models\Order;
use App\Models\Token;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;


class MainController extends Controller
{
    public function governorates(){
        $governorates= Governorate::all();
        return responseJson(1, 'success', $governorates);
    }

    public function cities(Request $request){
        $cities= City::where(function ($query) use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return responseJson(1, 'success', $cities);
    }

    public function categories(){
        $categories= Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function getePosts(){
        $posts=  Post::with('categories')->paginate(10); /* the name of relation from the model*/
        return responseJson(1, 'success', $posts);
    }

    public function createPost(Request $request){

        RequestLog::create(['content'=>$request->all(),'service' => 'post details']);
        $post = Post::with('category')->find($request->post_id);

        if(!$post)
        {
            return responseJson(0, '404 Not post Found');
        }

        return responseJson(1, 'success', $post);
    }


    public function contacts(Request $request){
        $validator=  validator()->make($request->all(),[
            'phone' => 'required|unique:contacts',
            'title' => 'required',
            'body'  => 'required',
        ]);
        if($validator->fails()){
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $contacts= Contact::create($request->all());
        return responseJson(1,'تم الاضافه بنجاح', $contacts);
    }

    public function bloodtypes(){
        $blood_types= BloodType::all();
        return responseJson(1, 'success', $blood_types);
    }

    public function settings(){
        $settings= Setting::all();
        return responseJson(1, 'success', $settings);
    }


    public function allOrders(){
        $orders= Order::with('client','city','BloodType')->paginate(10);
        return responseJson(1, 'success', $orders);
    }



    public function favoritePost(Request $request)
   {
       $validation = Validator::make($request->all(),[

           'client_id' => ['required', 'integer'],
           'post_id' => ['required', 'integer'],

       ]);

       if ($validation->fails()){
           return responseJson(0, 'Validation ERROR', $validation->messages());
       }

       $id = $request->client_id;
       $postId = $request->post_id;
       $user = Client::find($id);

       $post = $user->posts()->toggle($postId);

       if ($post['attached']){
           return responseJson(1, $post, ['favorite' => true]);
       } elseif($post['detached']) {
           return responseJson(1, $post, ['favorite' => false]);
       }

   }

   public function getFavoritePost()
   {

       $id = auth()->user()->id;

       $user = Client::find($id);

       $posts = $user->posts()->get();

       return responseJson(1, 'Favorites posts get successfully', ['posts' => $posts]);



   }

   public function orders(Request $request)
   {
       $validation = Validator::make($request->all(),[


            'name'              => ['required', 'min:3'],
            'age'               => ['required', 'integer'],
            'blood_type_id'     => ['required', 'integer'],
            'bags_number'       => ['required', 'integer'],
            'hospital_name'     => ['required', 'string'],
            'hospital_address'  => ['required', 'string'],
            'longitud'          => ['required'],
            'latitud'           => ['required'],
            'city_id'           => ['required', 'integer'],
            'client_id'         => ['required', 'integer'],
            'phone'             => ['required', 'min:11', 'max:14', 'regex:/^[0-9]{11,14}$/'],
            'description'       => ['required']

       ]);

       if ($validation->fails()){
           return responseJson(0, 'Validation ERROR', $validation->messages());
       }


       $order = Order::create($request->all());

       $clientsIds = $order->city->governorate->clients()->whereHas('bloodtypes', function ($que) use ($request){
           $que->where('blood_types.id', $request->blood_type_id);
       })->pluck('clients.id')->toArray();

    //    dd($clientsIds);

       if(count($clientsIds) > 0){
           $id = $request->blood_type_id;
           $bloodType = BloodType::find($id)->name;
           $notifications = $order->notifications()->create([
               'title' => 'حالة تحتاج للتبرع بالدم قريبة منك',
               'body' => ' يحتاج ' . $order->name . ' للتبرع بالدم لفصيلة ' . $bloodType,
               'order_id' => $order->id

           ]);

           $notifications->clients()->attach($clientsIds);

           $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', '')->pluck('token')->toArray();

           if(count($tokens) > 0){
               $title = $notifications->title;
               $body = $notifications->body;
               $data =[

                   'order_id' => $order->id
               ];

               $send = notifyByFireBase($title, $body, $tokens, $data);
               info("firebase result: " . $send);
               return responseJson(1, 'تم الإرسال بنجاح', $send);
           }
       }

   }

   public function createSettings(Request $request)
   {

        $validation = Validator::make($request->all(),[

            'governorate_id' => ['array', 'required'], //['array', 'required']
            'blood_type_id' => ['array', 'required'],

        ]);

        if ($validation->fails()){
            return responseJson(0, 'Validation ERROR', $validation->messages());
        }

        $client = auth('client')->user();

        $client->bloodtypes()->sync($request->blood_type_id);
        $client->governorates()->sync($request->governorate_id);

        return responseJson(1, 'تم التحديث بنجاح', [$client->bloodtypes()->get(), $client->governorates()->get()]);


   }

   public function getNotifications()
   {


        $client = auth('client')->user();

       $getNotificationsbloodtypes = $client->bloodtypes()->get();
       $getNotificationsgovernorates = $client->governorates()->get();

        return responseJson(1, 'Settings updated sucessfully', [$getNotificationsbloodtypes, $getNotificationsgovernorates]);


   }













}
