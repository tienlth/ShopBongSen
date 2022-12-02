<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Producttype;
use App\Models\Order;
use App\Models\User;

class AccountStaffTurnOverController extends Controller
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
            $orders = [Order::find(\Request::query()['search'])];
            if($orders==[null]) return redirect(url()->previous())->with('message','Không tìm thấy đơn hàng');
        }
        elseif(isset(\Request::query()['from']) && isset(\Request::query()['to'])){
            $orders= Order::whereBetween('created_at',[\Request::query()['from'], \Request::query()['to']])->get();
        }
        else $orders = Order::orderBy('id', 'desc')->get();

        $totalValue=0;
        foreach($orders as $order){
            $order->customer = Customer::find($order->customer_id);
            $order->total=0;
            foreach($order->products as $prd){
                $order->total+=round($prd->price-$prd->price*$prd->sale/100)*$prd->pivot['quantity'];
            }
            $totalValue+=$order->total;
        }



        return view('account.staff.account-staff-turnover',[
            'producttypes'=>$producttypes,
            'orders'=>$orders,
            'totalValue'=>$totalValue   
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
