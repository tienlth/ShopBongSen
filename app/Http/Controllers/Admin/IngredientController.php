<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
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
            $data = Ingredient::where('name', 'LIKE', "%{$search}%")->get();
            if(count($data)==0) redirect(route('dashboard-ingredients.index'))->with('warning', 'Không có kết quả trùng khớp');
        }else $data = Ingredient::all();

        return view('admin.dashboard-ware-ingredients', ['data'=>$data]);
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
        $file = $request->file('photo');
        if($file){
            $ingredient = Ingredient::create(['name'=>$name,'image'=>'']);
            $url = 'ingredient'.$ingredient->id.'.png';
            $ingredient->image = $url;
            $ingredient->save();

            $this->upload($file,'imgs/ingredients', $url);

            return redirect(route('dashboard-ingredients.index'))->withSuccess('Thêm nguyên liệu thành công');
        }
        else return redirect(route('dashboard-ingredients.index'))->with('error','Chưa chọn hình ảnh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ingredient::all();
        $data = json_decode(json_encode($data));
        $currentElement = Ingredient::find($id);
        return view('admin.dashboard-ware-ingredients', ['data'=>$data, 'currentElement'=>$currentElement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $ingredient = Ingredient::find($id);
        $url = 'ingredient'.$ingredient->id.'.png';
        $ingredient->name = $name;

        $file = $request->file('photo');
        if($file){
            $ingredient->image = $url;
            $this->upload($file,'imgs/ingredients', $url);
        }

        $ingredient->save();
        return redirect(route('dashboard-ingredients.index'))->withSuccess('Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlink(public_path('imgs\ingredients/').Ingredient::find($id)->image);
        Ingredient::find($id)->delete();
        return redirect(route('dashboard-ingredients.index'))->withSuccess('Xóa thành công');
    }

    public function destroyMulti(Request $request)
    {
        if(isset($request->all()['items'])){
            $items = $request->all()['items'];

            foreach($items as $id){
                unlink(public_path('imgs\ingredients/').Ingredient::find($id)->image);
                Ingredient::find($id)->delete();
            }
            $count = count($items);
            return redirect(route('dashboard-ingredients.index'))->withSuccess('Xóa '.$count.' mục thành công');
        }
        else return redirect()->back()->with('error','Danh sách trống');
    }
}
