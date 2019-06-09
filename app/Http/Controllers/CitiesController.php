<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $records = City::paginate(20);
       return view('cities.index', compact('records'));
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('cities.create');
   }
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $rules = array(
           'title'=>'required',
            'governorate_id'=>'required|exists:categories,id',

           'body'=>'required',
       );
       $this->validate($request, $rules);
        City::Create($request->all());

       flash()->success("Saved successfully");
       return redirect(url('cities'));
   }
   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
   }
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $model = City::findOrFail($id);
       return view('cities.edit', compact('model'));
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
       $record = City::findOrFail($id);
       $record->update($request->all());
       flash()->success("Edited successfully");
       return redirect(url('cities'));
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $record = City::findOrFail($id);
       $record->delete();
       flash()->error('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" >تم الحذف بنجاح</p>');
       return back();
   }
}

