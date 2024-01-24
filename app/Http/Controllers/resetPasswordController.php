<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\restorePasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class resetPasswordController extends Controller
{
    public function verify($userName){
        $user = User::where('username', $userName)->first();
        if($user){
            $rand = rand(11111,99999);
            $user->remember_token = $rand;
            $user->save();

            $data = [
                'email' => $user->email,
                'token' => $rand,
            ];

            Mail::to($user->email)->send(new restorePasswordMail($data));

            return "sent";
        }
        else{
            return "failed";
        }
    }

    public function restore($email, $token)
    {
        $user = User::where('email', $email)->where('remember_token', $token)->first();
        if($user){
            return view('auth.restore', compact('user'));
        }
        else{
            return redirect('/')->with('error', "Invalid Link");
        }
    }

    public function store(request $req){
        $req->validate([
            'password' => "required"
        ]);
        $rand = rand();
        $user = User::where('email', $req->email)->first();
        $user->password = Hash::make($req->password);
        $user->remember_token = $rand;
        $user->save();
        return redirect('/')->with('msg', 'Password Changed');
    }
}
