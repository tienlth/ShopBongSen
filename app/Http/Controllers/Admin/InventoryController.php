<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instock;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(\Request::query()){
            $search = \Request::query()['search'];
            $instocks = Instock::with('ingredients')->whereHas('ingredients', function($q) use($search){
                $q->where('name', 'LIKE', "%".$search."%");
            })->get();
                
            if(count($instocks)==0) redirect(route('dashboard-inventories.index'))->with('warning', 'Không có kết quả trùng khớp');
        }
        else $instocks = Instock::with('ingredients')->get();

        $data = json_decode(json_encode($instocks));
        return view('admin.dashboard-ware-inventory', ['data'=>$data]);
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
        $data = Instock::with('ingredients')->get();
        
        $currentElement = (Instock::with('ingredients')->find($id));
        $currentElement = json_decode(json_encode($currentElement), true);
        extract($currentElement);
        $currentElement=['quantity'=>$quantity,...$ingredients];

        return view('admin.dashboard-ware-inventory', ['data'=>$data, 'currentElement'=>$currentElement]);
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
        $request->validate([
            'quantity' => 'required',
        ]);    
        
        $quantity = $request->all()['quantity'];
        $instock = Instock::find($id);
        $instock->quantity=$quantity;
        $instock->save();
        return redirect(route('dashboard-inventories.index'))->withSuccess('Cập nhật thành công');
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
