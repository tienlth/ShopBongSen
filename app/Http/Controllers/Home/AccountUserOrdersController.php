<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producttype;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountUserOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Producttype::all();

        if(isset(\Request::query()['search'])){
            $orders = [User::find(Auth::id())->customers->orders->find(\Request::query()['search'])];
            if($orders==[null]) return redirect(url()->previous())->with('message','Không tìm thấy đơn hàng');
        }
        else $orders = User::find(Auth::id())->customers->orders->reverse();

        foreach($orders as $order){
            $order->total=0;
            foreach($order->products as $prd){
                $order->total+=round($prd->price - $prd->price*$prd->sale/100)*$prd->pivot['quantity'];
            }
        }
    
        return view('account.user.account-user-orders', [
            'producttypes'=>$producttypes,
            'orders'=>$orders,
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
