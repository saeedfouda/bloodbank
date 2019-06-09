<?php

namespace App\Http\Controllers;
use Alert;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use Validator;
use Illuminate\Support\Str;

class PostsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $records = Post::OrderBy('created_at', 'desc')->get();
       return view('posts.index', compact('records'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $categories = Category::pluck('name', 'id')->toArray();
       return view('posts.create',compact('categories'));
   }
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {

       $rules = [
        'title'      => 'required',
        'body'       => 'required',
        'image'        =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id'=>'required|exists:categories,id',
    ];

    $this->validate($request,$rules);

    $post = Post::create($request->all());

    if ($request->hasFile('image')){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $newName = Str::random(15) . '' . time() . '' . $name;
        $file->move(public_path('images/posts/'), $newName);
        $post->image = $newName;
        $post->save();
    }
    flash()->success('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" >تم اضافة المقال  بنــجـــــــاح</p>');

     return redirect(url('posts'));
}


   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $post = Post::with('category')->where('id', $id)->first();
        $categories = Category::all();

        return view('posts.show', compact(['post', 'categories']));

    }
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $post = Post::findOrFail($id);
       $categories = Category::all();
       return view('posts.edit', compact(['post', 'categories']));
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {

    $rules = [
        'title'      => 'required',
        'body'       => 'required',
        'image'        =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id'=>'required|exists:categories,id',
    ];



    $this->validate($request,$rules);

    $post = Post::findOrFail($id);


    $post->update($request->all());

    if ($request->hasFile('image')){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $newName = Str::random(15) . '' . time() . '' . $name;
        $file->move(public_path('images/posts/'), $newName);
        $post->image = $newName;
        $post->save();
    }




    flash()->success('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" > تـــــــم التحــديــــــــث بنــجـــــــاح</p>');
    return redirect(url('posts'));
}
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $record = Post::findOrFail($id);
       $record->delete();
       flash()->error('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" >تم الحذف بنجاح</p>');
       return back();
   }

   public function search( Request $request) {
    $request->validate([
        'q' => 'required'
    ]);

    $q = $request->q;


    $records = Post::where('title', 'like', '%' . $q . '%')->get();
                                // ->orWhere('body', 'like', '%' . $q . '%')
    if ($records->count()) {
        return view('posts.index')->with([
            'records' =>  $records
        ]);
    } else {

        return redirect('posts')->with([
            'status' => 'search failed ,, please try again'
        ]);
    }

}
// axios search
public function searchajax($q) {
    if ($q) {
        $data = Post::where('title', 'like' , '%'. $q .'%')->get();
    } else {
        $data = Post::all();
    }

    return response()->json($data);
}

}

