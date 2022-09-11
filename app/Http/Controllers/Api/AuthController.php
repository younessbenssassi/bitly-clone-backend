<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
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

    public function login(Request $request): JsonResponse
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

            $guard = $request->header('guard');
            $credentials = $request->only(['email', 'password']);
            $token = auth($guard)->attempt($credentials);


            if (!$token)
                return $this->returnError('Email or password not correct');

            $account = auth($guard)->user();
            if($guard === 'user-api'){
                $account->last_login = Carbon::now();
                $account->save();
            }else
                $account->isAdmin = true;

            $account->access_token = $token;
            //return token
            return $this->returnData('account', $account);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }


    }

    public function logout(Request $request)
    {
        $guard = $request->header('guard');
        $account = Auth::guard($guard)->user();

        if(!is_null($account)){
            try {
                Auth::guard($guard)->logout();
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this->returnError('some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            return $this->returnError('some thing went wrongs');
        }

    }

    public function getAuthState(Request $request)
    {
        $guard = $request->header('guard');
        $account = Auth::guard($guard)->user();

        if(is_null($account)){
            return $this->returnError('some thing went wrongs');
        }

        try {
            $token = Auth::guard($guard)->refresh();
            if(is_null($token))
                return  $this->returnError('some thing went wrongs');

            $account->isAdmin = $guard === 'admin-api' ?  true : false;
            $account->access_token = $token;

        }catch (\Exception $e){
            return  $this->returnError('some thing went wrongs');
        }

        return $this->returnData('account', $account);

    }
}
