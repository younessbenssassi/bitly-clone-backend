<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Validator;

//use Validator;
//use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api', ['except' => ['login']]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->sendErrorValidator($validator);
            }

            //login

            $credentials = $request->only(['email', 'password']);
            $token = auth('user-api')->attempt($credentials);


            if (!$token)
                return $this->returnError('Email or password not correct');

            $account = auth('user-api')->user();

            $account->access_token = $token;
            //return token
            return $this->returnData('account', $account);

        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }


    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $account = Auth::guard('user-api')->user();

        if(!is_null($account)){
            try {
                Auth::guard('user-api')->logout();
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this->returnError('some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            return $this->returnError('some thing went wrongs');
        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAuthState(Request $request): JsonResponse
    {
        $account = Auth::guard('user-api')->user();

        if(is_null($account)){
            return $this->returnError('some thing went wrongs');
        }

        try {
            $token = Auth::guard('user-api')->refresh();
            if(is_null($token))
                return  $this->returnError('some thing went wrongs');

            $account->access_token = $token;

        }catch (\Exception $e){
            return  $this->returnError('some thing went wrongs');
        }

        return $this->returnData('account', $account);

    }
}
