<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class TurnoverController extends Controller
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

        $dataChart['testchart']=[];
        $labelChart['testchart']=[];
        foreach($data as $e){
            $e->customer_name = Customer::find($e->customer_id)->name;

            $details=[];
            $total = 0;
            foreach($e->products as $prd){
                $item=['quantity'=>$prd->pivot->quantity, 'price'=>$prd->price];
                $details=[...$details ,$item];
                $total+=$item['quantity']*$item['price'];
            }
            $e->total=$total;
            $dataChart['testchart']=[...$dataChart['testchart'],$total];
            
            $labelChart['testchart']=[...$labelChart['testchart'], '`'.$e->created_at.'`'];
        }
        
        if(count($data)==0) redirect(route('dashboard-turnovers.index'))->with('warning', 'Không có kết quả trùng khớp');
        
        $dataChart['testchart'] = '['.implode(', ', $dataChart['testchart']).']';
        $labelChart['testchart'] = '['.implode(', ', $labelChart['testchart']).']';

        return view('admin.dashboard-statistic-turnover', ['data'=>$data, 'dataChart'=>$dataChart, 'labelChart'=>$labelChart]);
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
