<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Producttype;
use App\Models\User;

class HomeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order = Order::create([
            'deliverytime'=>$request->all()['deliverytime'],
            'message'=>$request->all()['message'],
            'receiver_name'=>$request->all()['receiver_name'],
            'receiver_phone'=>$request->all()['receiver_phone'],
            'receiver_address'=>$request->all()['receiver_address'],
            'note'=>$request->all()['note'],
            'customer_id'=>$request->all()['customer_id'],
            'status_id'=>1,
        ]);

        foreach($request->all()['product_id'] as $i=>$prd){
            $order->products()->attach($prd, ['quantity'=> $request->all()['product_quantity'][$i]]);
            
            $product = Product::find($prd);
            $product->sold+=$request->all()['product_quantity'][$i];
            $product->save();
        }
        
        session(['cart'=>[]]);
        return redirect()->route('cart.index')->with('message','Bạn đã đặt hàng thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['cart'=>[]]);
        $order = Order::find($id);
        $products = $order->products;

        $cart=[];
        foreach($products as $prd){
            $cart=[...$cart,[
                'id'=>$prd->id,
                'quantity'=>$prd->pivot['quantity']
            ]];
        }

        $totalNum = 0;
        $totalPrice = 0;
        foreach($cart as $i=>$prd){
            $cart[$i]['info'] = Product::find($prd['id']);
            $totalNum+=$prd['quantity'];
            $cart[$i]['total']=((round($cart[$i]["info"]->price - $cart[$i]["info"]->price*$cart[$i]["info"]->sale/100))*$prd["quantity"]);
            $totalPrice+=$cart[$i]['total'];
        }

        session(['cart'=>$cart]);

        return view('cart', ['producttypes'=>Producttype::all(),
                    'customer'=>Customer::find($order->customer_id),
                    'totalNum'=>$totalNum,
                    'totalPrice'=>$totalPrice,
                    'ordered'=>true,
                    'order'=>$order
                    ]);
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
