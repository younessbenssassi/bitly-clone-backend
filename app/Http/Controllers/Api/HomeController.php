<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $type = $request->get('type');

        $popular = [];
        if(is_null($type) || $type === 'popular'){
            $popular = Category::orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $sport = [];
        if(is_null($type) || $type === 'sport'){
            $sport = Category::where('type_id',1)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();


        }

        $netflix = [];
        if(is_null($type) || $type === 'netflix'){
            $netflix = Category::where('type_id',2)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $movies = [];
        if(is_null($type) || $type === 'movies'){
            $movies = Category::where('type_id',3)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $news = [];
        if(is_null($type) || $type === 'news'){
            $news = Category::where('type_id',4)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $carton = [];
        if(is_null($type) || $type === 'carton'){
            $carton = Category::where('type_id',5)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $general = [];
        if(is_null($type)){
            $general = Category::whereNull('type_id')
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        return response()->json([
            'status' => true,
            'popular'=> $popular,
            'sport'=> $sport,
            'netflix'=> $netflix,
            'movies'=> $movies,
            'news'=> $news,
            'carton'=> $carton,
            'general'=> $general,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getCategory(Request $request,$slug): JsonResponse
    {
        $category = Category::where('slug',$slug)
            ->with('channels')
            ->first();


        if(is_null($category)){
            return $this->returnError('Category not found');
        }

        return response()->json([
            'status' => true,
            'category'=> $category,
        ]);
    }

    /**
     * @param Request $request
     * @param $slug
     * @return JsonResponse
     */
    public function getChannel(Request $request,$slug): JsonResponse
    {
        $channel = Channel::where('slug',$slug)
            ->with('category')
            ->first();

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }
        try {
            $account = Auth::guard('user-api')->user();
            if(!is_null($account)){
                $user = User::with('channels')->find($account->id);
                $userChannelsIds = $user->channels->pluck('id')->toArray();

                if (in_array($channel->id, $userChannelsIds)) {
                    $channel->in_my_list = true;
                }else{
                    $channel->in_my_list = false;
                }
            }

            return response()->json([
                'status' => true,
                'channel'=> $channel,
            ]);
        }
        catch (\Exception $e){
            return $this->returnError($e);
        }


    }

    public function myList(Request $request): JsonResponse
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        try {
            $user = User::with('channels')->find($account->id);
            return response()->json([
                'status' => true,
                'channels'=> $user->channels,
            ]);
        }
        catch (\Exception $e){
            return $this->returnError($e);
        }


    }
}
