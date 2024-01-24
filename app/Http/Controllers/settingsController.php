<?php

namespace App\Http\Controllers;

use App\Helper\myHelper as HelperMyHelper;
use App\Http\Controllers\Controller;
use App\Models\settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App;
use Session;


class settingsController extends Controller
{

    public function test(){

    }
    public function settings(){
        $settings = settings::where('id',1)->first();
        return view('dashboard.settings')->with(compact('settings'));
    }

    public function saveBasics(request $req){

        $req->validate([
            'proName' => 'required',
        ],
        [
            'proName.required' => 'Please fill out this field'
        ]);

        $settings = settings::where('id',1)->first();
        $count = settings::where('id',1)->count();
        if($count > 0){
            $settings->proName = $req->proName;
            $settings->phone = $req->phone;
            $settings->mobile = $req->mobile;
            $settings->addr_line_one = $req->addr_line_one;
            $settings->addr_line_two = $req->addr_line_two;
            $settings->addr_line_three = $req->addr_line_three;
            $settings->save();
        }
        else{
            $save = new settings();
            $save->proName = $req->proName;
            $save->phone = $req->phone;
            $save->mobile = $req->mobile;
            $save->addr_line_one = $req->addr_line_one;
            $save->addr_line_two = $req->addr_line_two;
            $save->addr_line_three = $req->addr_line_three;
            $save->save();
        }
      
        return redirect()->back()->with('msg', 'Settings Saved');
    }

    public function saveUserName(request $req){
        $req->validate(
            [
                'userName' => 'required|unique:users,userName,'.auth()->user()->id,
                'email' => 'required|unique:users,email,'.auth()->user()->id
            ],
            [
                'userName.required' => 'Please enter a user name',
                'email.required' => 'Please enter a email address',
                'userName.unique' => 'This User Name is already taken',
                'email.unique' => 'This email is already taken'
            ]
        );

        $user = User::where('id',auth()->user()->id)->first();
        $user->username = $req->userName;
        $user->email = $req->email;
        $user->save();

        
       return redirect('/logout')->with('msg', "User Name / Email Updated");
    }

    public function savePassword(request $req){
        $req->validate(
            [
                'password' => 'required',
                'newPassword' => 'required|min:6',
                'confirmPassword' => 'required_with:newPassword|same:newPassword'
            ],
            [
                'password.required' => 'Please enter your Current Password',
                'newPassword.required' => 'Please enter new password',
                'newPassword.min' => 'Password must be at least 6 characters long',
                'confirmPassword.same' => 'New Password and confirm password must be the same',
            ]
        );


        $user = User::where('id', auth()->user()->id)->first();
        if(Hash::check($req->password, $user->password))
        {
            $user->password = hash::make($req->newPassword);
            $user->save();
           
            return redirect()->back()->with('msg', 'Password changed');
                }
        else{
            return redirect()->back()->with('error', "Wrong current password");
        }

    }
}
