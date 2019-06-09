<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Setting $model

     * @return \Illuminate\Http\Response
     */
    public function index(Setting $model)
    {
        if ($model->all()->count() > 0) {
            $model = Setting::find(1);
        }
        return view('settings.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'facebook_url'  => 'url',
            'twitter_url'   => 'url',
            'instagram_url' => 'url',
            'google_url'    => 'url',
            'youtube_url'    => 'url',
            // 'icon'        =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',



        ]);
        // $setting = Setting::create($request->all());


        // if ($request->hasFile('icon')){
        //     $file = $request->file('icon');
        //     $name = $file->getClientOriginalName();
        //     $newName = Str::random(15) . '' . time() . '' . $name;
        //     $file->move(public_path('images/setting/'), $newName);
        //     $setting->icon = $newName;
        //     $setting->save();
        // }

        if (Setting::all()->count() > 0) {
            Setting::find(1)->update($request->all());
        } else {
            Setting::create($request->all());
        }
        flash()->success('تم الحفظ بنجاح');
        return redirect(url('settings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
