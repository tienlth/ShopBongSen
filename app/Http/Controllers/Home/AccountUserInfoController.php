<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producttype;
use App\Models\User;


class AccountUserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = User::find(Auth::id())->customers;
        
        return view('account.user.account-user-info', [
                    'producttypes'=>Producttype::all(),
                    'customer'=>$customer
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
        $request->validate([
            'name' => 'required|min:8|max:20',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'address' => 'required|min:10|max:40',
        ]);

        $customer = User::find(Auth::id())->customers;
        $customer->name = $request->all()['name'];
        $customer->phone = $request->all()['phone'];
        $customer->email = $request->all()['email'];
        $customer->address = $request->all()['address'];
        $customer->birthday = $request->all()['birthday'];
        $customer->gender = $request->all()['gender']=='on'?1:0;
        $customer->save();

        return redirect()->route('account-user-info.index')->with('message','Cập nhật thành công');
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
        //
    }
}
