<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Users extends Controller
{

    public function login(){
        $data = [
            'email'=>'required|email',
            'password'=>'required',
        ];
        $valiate = Validator::make(request()->all(), $data);
        if($valiate->fails()){
            return response(['status'=>'false', 'message'=> 'Please enter password']);
        }
        else {
            if(Auth::attempt(['email'=>request('email'), 'password'=>request('password')])){
                $user = auth()->user();
                $user->api_token = Str::random(60);
                // $user->save();
                return response(['status'=> true, 'user'=>$user, 'token'=> $user->api_token]);
            }
            else {
            return response(['status'=>'false', 'message'=> 'The Email or password Incorrect']);
            }
        }
        // return response()->json(request()->all());
    }
}
