<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Producttype;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cart = session('cart');
        if(!isset($cart)) $cart=[];

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
                    'customer'=>User::find(Auth::id())->customers,
                    'totalNum'=>$totalNum,
                    'totalPrice'=>$totalPrice,
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
