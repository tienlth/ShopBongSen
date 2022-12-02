<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Feedback;
use App\Models\Producttype;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = Problem::all();
        $producttypes = Producttype::all();

        return(view('contact', ['problems'=>$problems, 'producttypes'=>$producttypes]));
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
            'phone' => 'required|min:10|max:12',
            'email' => 'required|min:4|max:20',
            'content' => 'required|min:10',
        ]);

        $feedback = Feedback::create([
            'name'=>$request->all()['name'],
            'phone'=>$request->all()['phone'],
            'email'=>$request->all()['email'],
            'content'=>$request->all()['content'],
        ]);

        Problem::find($request->all()['problem'])->feedbacks()->save($feedback);
        return redirect(route('contact.index'))->with('message','Shop đã ghi nhận góp ý của bạn');

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
