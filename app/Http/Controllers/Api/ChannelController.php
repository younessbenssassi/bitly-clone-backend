<?php

namespace App\Http\Controllers\Api;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    //
    public function index(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $page = $request->get('page', 1);
        $offset = 0;
        if ($page > 1)
        {
            $offset = $page * 20;
        }
        $channels = Channel::with('category')
            ->when(!is_null($search),function($q) use($search){
                return $q->where('name','like',"%{$search}%");
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit(20)
            ->get();

        if(is_null($channels)){
            return $this->returnError('Channels not found');
        }
        return $this->returnData('channels', $channels);
    }

    public function store(Request $request): JsonResponse
    {
        /*$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'text',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }*/

        $channel = null;

        try {
            DB::transaction(function ()use (&$channel , &$request) {
                $channel = new Channel();
                $channel->name = $request->name;
                $channel->category_id = $request->category_id;
                $channel->src = $request->src;
                $channel->description = $request->description;
                $channel->hash = Str::random(40);
                $channel->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        $channel->load('category');
        return $this->returnData('channel', $channel);
    }

    public function show(Request $request,$hash): JsonResponse
    {
        $channel = Channel::with('category')->where('hash',$hash)->first();

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }

        return $this->returnData('channel', $channel);
    }

    public function update(Request $request,$hash): JsonResponse
    {
        /*$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'text',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }*/

        $channel = Channel::where('hash',$hash)->first();

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }

        try {
            DB::transaction(function ()use (&$channel , &$request) {
                $channel->name = $request->name;
                $channel->description = $request->description;
                $channel->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        $channel->load('category');
        return $this->returnData('channel', $channel);
    }


    public function destroy(Request $request,$hash)
    {
        $channel = Channel::where('hash',$hash)->first();

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }
        try {
            DB::transaction(function ()use (&$channel , &$request) {
                $channel->delete();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        return $this->returnSuccessMessage('Channel deleted successfully');
    }
}
