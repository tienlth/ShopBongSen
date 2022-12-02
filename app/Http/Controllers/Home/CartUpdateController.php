<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartUpdateController extends Controller
{
    public function update(Request $request){

        $cart = session('cart');
        foreach($cart as $i=>$prd){
            $cart[$i]['id'] = $request->all()['product_id'][$i];
            $cart[$i]['quantity'] = $request->all()['product_quantity'][$i];
        }
        
        session(['cart'=>$cart]);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request, $id){
        $cart = session('cart');
        foreach($cart as $i=>$prd){
            if($cart[$i]['id']==$id) unset($cart[$i]);
        }

        session(['cart'=>$cart]);
        return redirect()->route('cart.index');
    }
}
