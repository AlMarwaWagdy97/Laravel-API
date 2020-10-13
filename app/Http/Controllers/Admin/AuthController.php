<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    use GeneralTrait;

    public function login(Request $request){
        try{
            $data=[
                'email' =>'required|exists:admins,email',
                'password' => 'required'
            ];

            ////////////////////////////validate //////////////////////////////////////////
            // $valiate = Validator::make(request()->all(), $data);
            // if($valiate->fails()){
            //     $code = $this->returnCodeAccordingToInput($valiate);
            //     return $this->returnValidationError($code, $valiate);
            // }
            // return Auth::guard('admin_api')->user();
    
            // ////////////////////////////login//////////////////////////////////////////////
            $credentials = $request->only(['email', 'password']);
            // $token= Auth::guard('admin_api')->attempt($credentials); 
            auth()->guard('admin_api')->attempt($credentials);
            dd(Auth::attempt(['email'=>$request('email'), 'password'=>request('password')]));
            // dd(config('auth.guards'));
            // if(!$token){
            //     return $this->returnError('E001', 'بينات الدخول غير صحيحه ');
            // }      
    
            //////////////////return Token/////////////////////////////////////////////
            // return $this->returnData('admin', $token);

        }catch(\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
        
    }
}
