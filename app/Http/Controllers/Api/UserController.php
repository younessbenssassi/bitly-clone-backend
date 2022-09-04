<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'repeatPassword' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $user = User::where('email',$request->email)->first();

        if(!is_null($user)){
            return $this->returnError('Email already used in other account');
        }

        $user = null;

        try {
            DB::transaction(function ()use (&$user, &$request, &$slug) {
                $user = new User();
                $user->hash = Str::random(30);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = password_hash($request->password,PASSWORD_DEFAULT);
                $user->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnSuccessMessage('Account created successfully');
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {

        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'oldPassword' => 'nullable|string',
            "newPassword" =>  Rule::requiredIf(function () use (&$request) {
                return !is_null($request->newPassword);
            }),
            "repeatPassword" =>  Rule::requiredIf(function () use (&$request) {
                return !is_null($request->repeatPassword);
            }),
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $user = User::where('email',$request->email)->first();

        if(!is_null($user) && $user->email !== $account->email){
            return $this->returnError('Email already used in other account');
        }

        if($request->oldPassword){
            if(!password_verify($request->oldPassword, $account->password )){
                return $this->returnError('Old password not correct');
            }
            if($request->newPassword !== $request->repeatPassword){
                return $this->returnError('Password not matching');
            }
        }


        try {
            DB::transaction(function ()use (&$account, &$request, &$slug) {
                $account->name = $request->name;
                $account->email = $request->email;

                if($request->newPassword){
                    $account->password = password_hash($request->newPassword,PASSWORD_DEFAULT);
                }

                $account->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnSuccessMessage('Account updated successfully');
    }


    /**
     * @param Request $request
     * @param $hash
     * @return JsonResponse|array
     */
    public function destroy(Request $request): JsonResponse|array
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }
        try {
            DB::transaction(function ()use (&$account , &$request) {
                Auth::guard('user-api')->logout();
                $account->delete();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        return $this->returnSuccessMessage('Account deleted successfully');
    }

    public function updateUserChannelsToggle(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "channel_id" => "required|exists:channels,id",
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $user = User::with('channels')->find($account->id);
        $userChannelsIds = $user->channels->pluck('id')->toArray();

        try {
            DB::transaction(function ()use (&$userChannelsIds, &$request,&$user) {

                $key = array_search($request->channel_id, $userChannelsIds);
                if ($key !== false) {
                    unset($userChannelsIds[$key]);
                }else{
                    $userChannelsIds[] = $request->channel_id;
                }
                $user->channels()->sync($userChannelsIds);

            });

            return $this->sendSuccessResponse([
                'status' => true,
            ]);
        }
        catch (\Exception $e){
            return $this->sendErrorResponse($e);
        }
    }
}
