<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
// use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function changePassword()
    {
        return view('users.reset-password');
    }

    public function changePasswordSave(Request $request)
    {
        $messages = [
            'old-password' => 'required',
            'password' => 'required|confirmed',
        ];
        $rules = [
            'old-password.required' => 'كلمة السر الحالية مطلوبة',
            'password.required' => 'كلمة السر مطلوبة',
        ];
        $this->validate($request,$messages,$rules);

        $user = Auth::user();

        if (Hash::check($request->input('old-password'), $user->password)) {
            // The passwords match...
            $user->password = bcrypt($request->input('password'));
            $user->save();
            flash()->success('تم تحديث كلمة المرور');
            return view('users.reset-password');
        }else{
            flash()->error('كلمة المرور غير صحيحة');
            return view('users.reset-password');
        }

    }

    public function index()
    {
        $records = User::paginate(20);
        return view('users.index',compact('records'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);
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


        $records = User::where('name', 'like', '%' . $q . '%')
                                ->orWhere('email', 'like', '%' . $q . '%')->get();
        if ($records->count()) {
            return view('users.index')->with([
                'records' =>  $records
            ]);
        } else {

            return redirect('users')->with([
                'status' => 'search failed ,, please try again'
            ]);
        }

    }
    // axios search
    public function searchajax($q) {
        if ($q) {
            $data = User::where('name', 'like' , '%'. $q .'%')->get();
        } else {
            $data = User::all();
        }

        return response()->json($data);
    }
}
