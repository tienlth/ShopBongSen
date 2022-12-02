<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producttype;
use App\Models\Style;
use App\Models\Ingredient;
use App\Models\Evaluation;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageLimit = 10;
        $productLocate=null;

        if(isset(\Request::query()['search'])){
            $search = \Request::query()['search'];
            $products = Product::where('name', 'LIKE', "%".$search."%")->paginate($pageLimit)->appends(['search' => \Request::query()['search']]);
        }
        elseif(isset(\Request::query()['type-filter'])){
            $filter = Producttype::find(\Request::query()['type-filter']);
            $products = Product::where('producttype_id',\Request::query()['type-filter'])->paginate($pageLimit)->appends(['type-filter' => \Request::query()['type-filter']]);
            $productLocate   = $filter->name;
        }
        elseif(isset(\Request::query()['style-filter'])){
            $filter = style::find(\Request::query()['style-filter']);
            $products = Product::where('style_id',\Request::query()['style-filter'])->paginate($pageLimit)->appends(['style-filter' => \Request::query()['style-filter']]);
            $productLocate = $filter->name;
        }
        elseif(isset(\Request::query()['ingredient-filter'])){
            $filter = Ingredient::find(\Request::query()['ingredient-filter']);
            $products = $filter->products;
            $productLocate   = $filter->name;
        }
        else $products = Product::paginate($pageLimit);

        $producttypes = Producttype::all();
        $styles = Style::all();
        $ingredients = Ingredient::all();

        return view('products', ['products'=>$products, 'producttypes'=>$producttypes,'styles'=>$styles, 'ingredients'=>$ingredients,'productLocate'=>$productLocate]);
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
        $id = $request->all()['product-addcart-id'];
        $quantity = $request->all()['product-addcart-quantity'];

        $cart = session('cart');
        if(!isset($cart)) $cart=[];

        $test=true;
        foreach($cart as $i=>$cartItem){
            if($cart[$i]['id']==$id){
                $cart[$i]['quantity']+=$quantity;
                $test=false;
                break;
            }
        }
        if($test){
            $cart = [...$cart, ['id'=>$id, 
                    'quantity'=>$quantity]];
        }

        session(['cart'=>$cart]);

        return redirect(url()->previous())->with('message', 'Đã cập nhật 1 sản phẩm vào giỏ hàng');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producttypes = Producttype::all();
        $thisProduct = Product::find($id);
        $thisProduct->type = Producttype::find($thisProduct->producttype_id);
        $thisProduct->style = Style::find($thisProduct->style_id);

        $evaluations = $thisProduct->evaluations;
        foreach($evaluations as $e){
            $e->customer = Customer::find($e->customers_id);
            $e->imageofevaluations;
        }

        return view('product-detail', ['producttypes'=>$producttypes, 'thisProduct'=>$thisProduct, 'evaluations'=>json_decode(json_encode($evaluations))]);
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
