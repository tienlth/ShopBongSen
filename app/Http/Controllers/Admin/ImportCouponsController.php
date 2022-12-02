<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\View\Components\footer;
use Illuminate\Http\Request;
use App\Models\ImportCoupon;
use App\Models\Supplier;
use App\Models\Ingredient;

class ImportCouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(isset(\Request::query()['search'])){
            $search = \Request::query()['search'];
            $import = Supplier::with(['importcoupons'])->where('name', 'LIKE', "%".$search."%")->get();
                
            if(count($import)==0) redirect(route('dashboard-imports.index'))->with('warning', 'Không có kết quả trùng khớp');
        }
        else if(isset(\Request::query()['from']) && isset(\Request::query()['to'])){
            $import= Supplier::with(['importcoupons'])->get();
            foreach($import as $item){
                foreach($item->importcoupons as $imp)
                if($imp->time<\Request::query()['from'] || $imp->time>\Request::query()['to']) $imp->id=-1;
            }


            if(count($import)==0) redirect(route('dashboard-imports.index'))->with('warning', 'Không có kết quả trùng khớp');
        }
        else $import = Supplier::with(['importcoupons'])->get();
        $data = json_decode(json_encode($import));
    
        $suppliers = Supplier::all();
        $ingredients = Ingredient::all();

        return view('admin.dashboard-ware-import', ['data'=>$data, 'suppliers'=>$suppliers, 'ingredients'=>$ingredients]);
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
        $request->validate([
            'quantity' => 'required',
        ]); 

        $importcoupon = ImportCoupon::create(['supplier_id'=>$request->all()['supplier'],
                                'time'=>$request->all()['date']]);

        foreach($request->all()['imports'][0] as $i => $ingredient){
            $number = $request->all()['imports'][1][$i];
            $price = $request->all()['imports'][2][$i];
            $importcoupon->ingredients()->attach($ingredient, 
            ['quantity'=>$number, 'price'=>$price]);
        }

        return redirect(route('dashboard-imports.index'))->withSuccess('Thêm phiếu nhập hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Supplier::with('importcoupons')->get();
        $supplierName = Supplier::find(ImportCoupon::find($id)->supplier_id)->name;
        $currentElement = ImportCoupon::find($id);
        $ingredients = $currentElement->ingredients;

        $details=[];
        foreach($ingredients as $ingr){
            $item=['name'=>$ingr->name, 'quantity'=>$ingr->pivot->quantity, 'price'=>$ingr->pivot->price];
            $details=[...$details ,$item];
        }
        return view('admin.dashboard-ware-import', ['data'=>$data, 'supplierName'=>$supplierName,'currentElement'=>$currentElement, 'details'=>$details]);
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
