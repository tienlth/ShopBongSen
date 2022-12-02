<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Imageofevaluation;
use App\Models\User;
use App\Models\Product;

class EvaluationController extends Controller
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
        $evaluation = Evaluation::create([
            'customers_id'=>User::find(Auth::id())->customers->id,
            'product_id'=>$request->All()['products_id'],
            'color_evaluation'=>$request->All()['color_evaluation'],
            'style_evaluation'=>$request->All()['style_evaluation'],
            'dimension_evaluation'=>$request->All()['dimension_evaluation'],
            'content'=>$request->All()['content'],
            'quality'=>$request->All()['quality']
        ]);

        $files = $request->file('photo');
        if($files){
            foreach($files as $file){
                $imageofevaluation = Imageofevaluation::create();
                $url = 'imageofevaluation'.$imageofevaluation->id.'.png';
                $imageofevaluation->url = $url;
                $imageofevaluation->evaluation_id = $evaluation->id;
                $imageofevaluation->save();

                $this->upload($file,'imgs/imageofevaluations', $url);
            }
        }

        $thisProduct = Product::find($request->All()['products_id']);
        $total = 0;
        foreach($thisProduct->evaluations as $e){
            $total += $e->quality;
        }
        $thisProduct->quality = round($total/count($thisProduct->evaluations));
        $thisProduct->save();
        

        return redirect(url()->previous())->with('message','Đánh giá thành công');
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
