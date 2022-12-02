<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Producttype;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product1s = Product::inRandomOrder()->limit(5)->get();
        $product2s = Product::inRandomOrder()->limit(5)->get();

        $producttypes = Producttype::all();

        $i = 0;
        $producttypeSold = [];
        foreach($producttypes as $j=>$prdt){
            $totalSold = 0;
            foreach($prdt->products as $prd){
                $totalSold += $prd->sold;
            }

            if($j %4 ==0) $i++;
            $producttypeSold[$i][$j] = ['name'=>$prdt->name, 'sold'=>$totalSold];
        }

        return view('introduction', ['product1s'=>$product1s,
                        'product2s'=>$product2s, 
                        'producttypes'=>$producttypes,
                        'producttypeSold'=>$producttypeSold
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
