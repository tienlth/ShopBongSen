<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staffs;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
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
            $data = Staffs::where('name', 'LIKE', "%{$search}%")->get();
            if(count($data)==0) redirect(route('dashboard-staffs.index'))->with('warning', 'Không có kết quả trùng khớp');
        }else $data = Staffs::all();

        $data = json_decode(json_encode($data));
        return view('admin.dashboard-staffs', ['data'=>$data]);
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
            'name' => 'required|min:8|max:20',
            'address' => 'required|max:40',
            'birthday' => 'required',
            'hometown' => 'required|max:40',
            'gender' => 'required',
            'phone' => 'required|digits:10',
            'email' => 'required|email'
        ]); 

        $Staff = new Staffs;

        $url = 'staffs'.$Staff->id.'.png';
        $file = $request->file('photo');
        if($file){
            $Staff->avatar = $url;
            $this->upload($file,'imgs/staffs/avts', $url);

            $Staff->name = $request->all()['name'];
            $Staff->birthday = $request->all()['birthday'];
            $Staff->hometown = $request->all()['hometown'];
            $Staff->address = $request->all()['address'];
            $Staff->gender = isset($request->all()['gender'])?1:0;
            $Staff->phone = $request->all()['phone'];
            $Staff->email = $request->all()['email'];
            
            $Staff->save();

            $user = User::create(['username'=>'staffaccount'.$Staff->id,'password'=>Hash::make('staffaccount'.$Staff->id)]);
            $user->staffs()->save($Staff);
            return redirect()->route('dashboard-staffs.index')->withSuccess('Thêm nhân viên thành công');
        }
        else return redirect()->route('dashboard-staffs.index')->withError('Chưa chọn hình ảnh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staffs::all();
        $data = json_decode(json_encode($data));
        $currentElement = Staffs::find($id);
        return view('admin.dashboard-staffs', ['data'=>$data, 'currentElement'=>$currentElement]);
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
            'name' => 'required|min:8|max:20',
            'address' => 'required|max:40',
            'birthday' => 'required',
            'hometown' => 'required|max:40',
            'gender' => 'required',
            'phone' => 'required|digits:10',
            'email' => 'required|email'
        ]); 

        $Staff = Staffs::find($id);
        $url = 'staff'.$Staff->id.'.png';
        $Staff->name = $request->all()['name'];
        $Staff->address = $request->all()['address'];
        $Staff->birthday = $request->all()['birthday'];
        $Staff->hometown = $request->all()['hometown'];
        $Staff->address = $request->all()['address'];
        $Staff->gender = isset($request->all()['gender'])?1:0;
        $Staff->phone = $request->all()['phone'];
        $Staff->email = $request->all()['email'];

        $file = $request->file('photo');
        if($file){
            $Staff->avatar = $url;
            $this->upload($file,'imgs/staffs/avts', $url);
        }

        $Staff->save();
        return redirect(route('dashboard-staffs.index'))->withSuccess('Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlink(public_path('imgs\staffs\avts/').Staffs::find($id)->avatar);
        Staffs::find($id)->delete();
        return redirect(route('dashboard-staffs.index'))->withSuccess('Xóa thành công');
    }

    public function destroyMulti(Request $request)
    {
        if(isset($request->all()['items'])){
            $items = $request->all()['items'];

            foreach($items as $id){
                unlink(public_path('imgs\staffs\avts/').Staffs::find($id)->avatar);
                Staffs::find($id)->delete();
            }
            $count = count($items);
            return redirect(route('dashboard-staffs.index'))->withSuccess('Xóa '.$count.' mục thành công');
        }
        else return redirect()->back()->with('error','Danh sách trống');
    }
}
