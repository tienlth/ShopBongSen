<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Producttype;
use App\Models\User;
use App\Models\Staffs;

class AccountStaffInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = User::find(Auth::id())->staffs;
        return view('account.staff.account-staff-info',[
            'producttypes'=>Producttype::all(),
            'staff'=>$staff
        ]);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'hometown' => 'required|max:40',
            'address' => 'required|max:40',
        ]);        

        $staff = Staffs::find($id);
        $staff->phone=$request->all()['phone'];
        $staff->email=$request->all()['email'];
        $staff->hometown=$request->all()['hometown'];
        $staff->address=$request->all()['address'];
        $staff->birthday=$request->all()['birthday'];
        $staff->save();

        return redirect()->back()->with('message','Cập nhật thành công');
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
