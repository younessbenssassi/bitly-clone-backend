<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

//use Validator;
//use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api', ['except' => ['login']]);
    }

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
            if($namespace === 'admin'){
                $token = auth('admin-api')->attempt($credentials);
            }else{
                $token = auth('admin-api')->attempt($credentials);
            }

            if (!$token)
                return $this->returnError('Emil or password not correct');

            if($namespace === 'admin'){
                $account = auth('admin-api')->user();
                $account->isAdmin = true;
            }else{
                $account =auth('user-api')->user();
                $account->isAdmin = false;
            }

            $account->access_token = $token;
            //return token
            return $this->returnData('account', $account);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }


    }

    public function logout(Request $request)
    {
        //$token = $request->header('access_token');
        $namespace = $request->header('namespace');
        if($namespace === 'admin')
            $account = Auth::guard('admin-api')->user();
        else
            $account =Auth::guard('user-api')->user();

        if(!is_null($namespace) && !is_null($account)){
            try {

                if($namespace === 'admin')
                    Auth::guard('admin-api')->logout();
                else
                    Auth::guard('user-api')->logout();

            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            $this -> returnError('some thing went wrongs');
        }

    }

    public function me(Request $request): \Illuminate\Http\JsonResponse
    {
        $namespace = $request->header('namespace');
        if($namespace === 'admin')
            $account = Auth::guard('admin-api')->user();
        else
            $account =Auth::guard('user-api')->user();

        return $this->returnData('account', $account);
    }
    public function refresh(Request $request)
    {
        $token = auth()->refresh();
        //return $this->respondWithToken(auth()->refresh());
    }
}
