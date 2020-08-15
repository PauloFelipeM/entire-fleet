<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;
use App\Rules\CurrentPassword;

class UserController extends Controller
{
   public function profile(){              
       return view('users.profile');
   }

   public function update_my_profile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();
        return Redirect::to('profile')->withMessage(__('user.edit_profile_success'));
   }

   public function update_my_password(Request $request){
        $rules = [
            "old_password" => ['required', new CurrentPassword],
            'password' => 'required|string|min:4|confirmed|different:old_password',
            'password_confirmation' => 'required',
        ];
        $this->validate($request, $rules);

        $user = User::find(Auth::user()->id);
        $user->password = $request->password;
        $user->save();
        return Redirect::to('profile')->withMessage(__('user.change_password_success'));
   }
}