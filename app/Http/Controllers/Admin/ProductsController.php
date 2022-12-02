<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producttype;
use App\Models\Style;
use App\Models\Ingredient;

class ProductsController extends Controller
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
            $prd = Product::where('name', 'LIKE', "%".$search."%")->get();
                
        }
        elseif(isset(\Request::query()['type-filter'])){
            $prd = Producttype::find(\Request::query()['type-filter'])->products;
        }
        elseif(isset(\Request::query()['style-filter'])){
            $prd = style::find(\Request::query()['style-filter'])->products;
        }
        elseif(isset(\Request::query()['ingredient-filter'])){
            $prd = Ingredient::find(\Request::query()['ingredient-filter'])->products;
        }
        else $prd = Product::all();

        if(count($prd)==0) redirect(route('dashboard-products.index'))->with('warning', 'Không có kết quả trùng khớp');
        
        $data = json_decode(json_encode($prd));

        $ingredients = Ingredient::all();
        $producttypes = Producttype::all();
        $Styles = Style::all();
    
        return view('admin.dashboard-products', ['data'=>$data,'ingredients'=>$ingredients, 'producttypes'=>$producttypes, 'styles'=>$Styles]);
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
        $file = $request->file('photo');
        if($file){
            $product = Product::create([
                'name'=> $request->all()['name'],
                'sale'=> $request->all()['sale'],
                'price'=> $request->all()['price'],
                'height'=> $request->all()['height'],
                'width'=> $request->all()['width'],
                'color'=> $request->all()['color'],
                'expiry'=> $request->all()['expiry'],
                'meaning'=> $request->all()['meaning'],
                'taking_care_guide'=> $request->all()['taking_care_guide'],
                'producttype_id'=> $request->all()['type'],
                'style_id'=> $request->all()['style'],
                'designed_by_customer'=> false

            ]);

            $url = 'ingredient'.$product->id.'.png';
            $product->main_image = $url;
            $product->save();

            $this->upload($file,'imgs/products', $url);

            foreach($request->all()['ingredients'][0] as $i=>$ingredient){
                $number = $request->all()['ingredients'][1][$i];
                $product->ingredients()->attach($ingredient, 
                    ['quantity'=>$number]);
            }

            return redirect(route('dashboard-products.index'))->withSuccess('Thêm sản phẩm thành công');
        }
        else return redirect(route('dashboard-products.index'))->with('error','Chưa chọn hình ảnh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(isset(\Request::query()['type-filter'])){
            $data = Producttype::find(\Request::query()['type-filter'])->products;
        }
        elseif(isset(\Request::query()['style-filter'])){
            $data = Style::find(\Request::query()['style-filter'])->products;
        }
        else $data = Product::all();

        $currentElement = Product::find($id);
        $ingredients = $currentElement->ingredients;

        $details=[];
        foreach($ingredients as $ingr){
            $item=['name'=>$ingr->name, 'quantity'=>$ingr->pivot->quantity];
            $details=[...$details ,$item];
        }

        $currentElement->producttype=Producttype::find($currentElement->producttype_id)->name;
        $currentElement->style=Style::find($currentElement->style_id)->name;

        $producttypes = Producttype::all();
        $Styles = Style::all();
        $ingredients = Ingredient::all();

        return view('admin.dashboard-products', ['data'=>$data, 
                    'currentElement'=>$currentElement, 
                    'details'=>$details, 
                    'producttypes'=>$producttypes,
                    'styles'=>$Styles, 'ingredients'=>$ingredients]);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlink(public_path('imgs\products/').Product::find($id)->main_image);
        Product::find($id)->delete();
        return redirect(route('dashboard-products.index'))->withSuccess('Xóa thành công');
    }

    public function destroyMulti(Request $request)
    {
        if(isset($request->all()['items'])){
            $items = $request->all()['items'];

            foreach($items as $id){
                unlink(public_path('imgs\products/').Product::find($id)->main_image);
                Product::find($id)->delete();
            }
            $count = count($items);
            return redirect(route('dashboard-products.index'))->withSuccess('Xóa '.$count.' mục thành công');
        }
        else return redirect()->back()->with('error','Danh sách trống');
    }
}
