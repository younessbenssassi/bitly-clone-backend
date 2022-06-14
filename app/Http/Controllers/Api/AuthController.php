<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {

        try {
            /*$rules = [
                "email" => "required",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }*/

            //login

            $credentials = $request->only(['email', 'password']);

            $namespace = $request->header('namespace');
            $token = null;
            if($namespace === 'admin'){
                $token = Auth::guard('admin-api')->attempt($credentials);
            }else{
                $token = Auth::guard('user-api')->attempt($credentials);
            }
            if (!$token)
                return $this->returnError('بيانات الدخول غير صحيحة');


            if($namespace === 'admin'){
                $account = Auth::guard('admin-api')->user();
                $account->idAdmin = true;
            }else{
                $account = Auth::guard('user-api')->user();
                $account->idAdmin = false;
            }

            $account->api_token = $token;
            //return token
            return $this->returnData('account', $account);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }


    }

    public function logout(Request $request)
    {
        $token = $request -> header('auth-token');
        if($token){
            try {

                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            $this -> returnError('some thing went wrongs');
        }

    }
}
