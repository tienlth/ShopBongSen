<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use App\Models\User;

class AccountRedirectController extends Controller
{
    public function redirect(){
        $role = \Request::get('role');
        if($role=='staff') return redirect()->route('account-staff-info.index');
        else if($role=='user') return redirect()->route('account-user-info.index');
        else return redirect()->route('index')->with();
    }

    public function changepasswordRedirect(){
        return view('account.account-change-password', ['producttypes'=>Producttype::all()]);
    }

    public function changepassword(Request $request){
        $request->validate([
            'oldpassword' => ['required', 'min:8', 'max:16'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $thisUser = User::find(Auth::id());
        if(Hash::check($request->oldpassword,$thisUser->password)){
            $thisUser->password=Hash::make($request->password);
            $thisUser->save();
            return redirect()->back()->with('message','Đổi mật khẩu thành công');
        }
        else return redirect()->back()->with('message','Mật khẩu không đúng');
    }
}
