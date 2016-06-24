<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\User;
use Auth;
use Hash;


class UserController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function user(){
    	return View('user.user');
    }

    public function profile(){
    	return View('user.profile');
    }

    public function updateProfile(Request $request){
    	$rules = ['image' => 'required|image|max:1024*1024*1',];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->route('users.edit.profile')->withErrors($validator);
        } else {
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('profiles', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)->update(['profileImage' => 'profiles/'.$name]);
            return redirect()->route('users.panel')->with('status', 'Your profile picture has been changed successfully!');
        }
    }

    public function password(){
        return View('user.password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword'    =>  'required',
            'password'      =>  'required|confirmed|min:6|max:18',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect()->route('users.edit.password')->withErrors($validator);
        } else {
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)->update(['password' => bcrypt($request->password)]);
                return redirect()->route('users.panel')->with('status', 'Your password has been changed successfully!');
            } else {
                return redirect()->route('users.edit.password')->with('status', 'Please make sure you have entered the information correctly');
            }
        }
    }
}
