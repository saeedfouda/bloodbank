<?php

namespace App\Http\Controllers;
use App\Model\Client;
use App\DataTables\ClientDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * trademarksDatatable
     * @return \Illuminate\Http\Response
     */
    public function index(ClientDatatable $trade)
    {
        return $trade->render('clients.index' , ['title' => 'clients']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create',['title'=>'create clients']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),
            [
            'name'   =>'required',
            ],[],[
                'name'       =>'name',
            ]);


        Client::create($data);
        session()->flash('success','record_added');
        return redirect(url('clients'));
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
        $clients =Client::find($id);
        $title = 'edit';
        return view('clients.edit' ,compact('clients', 'title'));
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
        $data = $this->validate(request(),
        [
            'name'   =>'required',
            ],[],[
                'name'       =>'name',
            ]);


                Client::where('id',$id)->update($data);
                session()->flash('success','update_record');
                return redirect(url('clients'));


        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $trademarks =  Client::find($id);
         Storage::delete($trademarks->logo);
         $trademarks->delete();
            session()->flash('success',trans('admin.delete_record'));
            return redirect(aurl('trademarks'));
    }

    public function multi_delete()
        {
            if(is_array(request('item')))
            {
                foreach(request('item') as $id) {
                    $trademarks =  Client::find($id);
                    Storage::delete($trademarks->logo);
                    $trademarks->delete();
                }
            }else{
                    $trademarks =  Client::find(request('item'));
                    Storage::delete($trademarks->logo);
                    $trademarks->delete();
            }
            session()->flash('success',trans('admin.delete_record'));
                return redirect(aurl('admin'));
        }
}
