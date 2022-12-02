<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
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
            $data = Supplier::where('name', 'LIKE', "%{$search}%")->get();
            if(count($data)==0) redirect(route('dashboard-suppliers.index'))->with('warning', 'Không có kết quả trùng khớp');
        }else $data = Supplier::all();

        $data = json_decode(json_encode($data));
        return view('admin.dashboard-ware-suppliers', ['data'=>$data]);
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
        $name = $request->all()['name'];
        $address = $request->all()['address'];
        Supplier::create(['name'=>$name,'address'=>$address]);
        return redirect(route('dashboard-suppliers.index'))->withSuccess('Thêm nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Supplier::all();
        $currentElement = Supplier::find($id);
        return view('admin.dashboard-ware-suppliers', ['data'=>$data, 'currentElement'=>$currentElement]);
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
        $name = $request->all()['name'];
        $address = $request->all()['address'];
        $supplier = Supplier::find($id);
        $supplier->name=$name;
        $supplier->address=$address;
        $supplier->save();
        return redirect(route('dashboard-suppliers.index'))->withSuccess('Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect(route('dashboard-suppliers.index'))->withSuccess('Xóa thành công');
    }

    public function destroyMulti(Request $request)
    {
        if(isset($request->all()['items'])){
            $items = $request->all()['items'];

            foreach($items as $id){
                Supplier::find($id)->delete();
            }
            $count = count($items);
            return redirect(route('dashboard-suppliers.index'))->withSuccess('Xóa '.$count.' mục thành công');
        }
        else return redirect()->back()->with('error','Danh sách trống');
    }
}
