<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
// use RealRashid\SweetAlert\Facades\Alert;
use DB;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $records = Client::with('bloodType')->with('cities')->get();
        // $records = Client::orderBy('id', 'DESC')->paginate(5) ;


        return view('clients.index',compact('records'));
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
        $client = Client::findOrFail($id);

        if($client->active == 1){

            $client->active = 0;
        } else {
            $client->active = 1;
        }

        $client->save();
        flash()->success('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" >تم التحديث بنجاح</p>');

        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $record = Client::findOrFail($id);
        $record->delete();
        flash()->error('<p class="text-center" style="font-size:20px; font-weight:900;font-family:Arial" >تم الحذف بنجاح</p>');
        // Alert::error('Error Title', 'تم الحذف بنجاح');

        return back();
    }


    public function search( Request $request) {
        $request->validate([
            'q' => 'required'
        ]);

        $q = $request->q;


        $records = Client::where('name', 'like', '%' . $q . '%')
                                ->orWhere('email', 'like', '%' . $q . '%')
                                    ->orWhere('phone', 'like', '%' . $q . '%')->get();
        if ($records->count()) {
            return view('clients.index')->with([
                'records' =>  $records
            ]);
        } else {

            return redirect('clients')->with([
                'status' => 'search failed ,, please try again'
            ]);
        }

    }
    // axios search
    public function searchajax($q) {
        if ($q) {
            $data = Client::where('name', 'like' , '%'. $q .'%')->get();
        } else {
            $data = Client::all();
        }

        return response()->json($data);
    }





    // function action(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   $output = '';
    //   $query = $request->get('query');
    //   if($query != '')
    //   {
    //    $data = DB::table('tbl_customer')
    //      ->where('name', 'like', '%'.$query.'%')
    //      ->orWhere('email', 'like', '%'.$query.'%')
    //      ->orWhere('phone', 'like', '%'.$query.'%')
    //      ->orderBy('client_id', 'desc')
    //      ->get();

    //   }
    //   else
    //   {
    //    $data = DB::table('tbl_customer')
    //      ->orderBy('client_id', 'desc')
    //      ->get();
    //   }
    //   $total_row = $data->count();
    //   if($total_row > 0)
    //   {
    //    foreach($data as $row)
    //    {
    //     $output .= '
    //     <tr>
    //      <td>'.$row->name.'</td>
    //      <td>'.$row->email.'</td>
    //      <td>'.$row->phone.'</td>

    //     </tr>
    //     ';
    //    }
    //   }
    //   else
    //   {
    //    $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //   }
    //   $data = array(
    //    'table_data'  => $output,
    //    'total_data'  => $total_row
    //   );

    //   echo json_encode($data);
    //  }
    // }

}
