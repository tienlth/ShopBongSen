<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(\Request::query()['from']) && isset(\Request::query()['to'])){
            $data= Order::whereBetween('created_at',[\Request::query()['from'], \Request::query()['to']])->get();
        }
        else $data = Order::all();

        foreach($data as $e){
            $e->customer_name = Customer::find($e->customer_id)->name;
        }

        if(count($data)==0) redirect(route('dashboard-orders.index'))->with('warning', 'Không có kết quả trùng khớp');

        return view('admin.dashboard-statistic-orders', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'a';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Order::all();
        foreach($data as $e){
            $e->customer_name = Customer::find($e->customer_id)->name;
        }

        $currentElement = Order::find($id);
        $currentElement->customer_name = Customer::find($currentElement->customer_id)->name;

        $details=[];
        $total = 0;
        foreach($currentElement->products as $prd){
            $item=['name'=>$prd->name, 'quantity'=>$prd->pivot->quantity, 'price'=>$prd->price];
            $details=[...$details ,$item];
            $total+=$item['quantity']*$item['price'];
        }

        return view('admin.dashboard-statistic-orders', ['data'=>$data, 'currentElement'=>$currentElement, 'details'=>$details, 'total'=>$total]);
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
        $order = Order::find($id);
        $order->status_id=$request->all()['status'];
        $order->save();
        return redirect(route('dashboard-orders.index'))->withSuccess('Cập nhật thành công');
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
