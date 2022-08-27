<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $withCategories = $request->get('withCategories');
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

        $categories = [];
        if($withCategories){
            $categories = Category::all();
        }


        return response()->json([
            'status' => true,
            'channels'=> $channels,
            'categories'=> $categories
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function show(Request $request,$id): JsonResponse
    {
        $channel = Channel::with('category')->find($id);
        $channel->visitors = $channel->visitors + 1;
        $channel->save();

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }

        return $this->returnData('channel', $channel);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'nullable|string',
            'link_one_quality_one' => 'required|string',
            'link_one_quality_two' => 'required|string',
            'link_one_quality_three' => 'required|string',
            'link_two' => 'nullable|string',
            'link_three' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $slug = Str::slug($request->name);
        $channel = Channel::where('slug',$slug)->first();

        if(!is_null($channel)){
            return $this->returnError('Channel already exist');
        }

        $channel = null;

        try {
            DB::transaction(function ()use (&$channel , &$request,&$slug) {
                $channel = new Channel();
                $channel->name = $request->name;
                $channel->category_id = $request->category_id;

                $channel->link_one_quality_one = $request->link_one_quality_one;
                $channel->link_one_quality_two = $request->link_one_quality_two;
                $channel->link_one_quality_three = $request->link_one_quality_three;

                $channel->link_two_quality_one = $request->link_two_quality_one;
                $channel->link_two_quality_two = $request->link_two_quality_two;
                $channel->link_two_quality_three = $request->link_two_quality_three;

                $channel->link_three_quality_one = $request->link_three_quality_one;
                $channel->link_three_quality_two = $request->link_three_quality_two;
                $channel->link_three_quality_three = $request->link_three_quality_three;

                $channel->image = $request->image;
                $channel->slug = $slug;
                $channel->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        $channel->load('category');
        return $this->returnData('channel', $channel);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request,$id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'nullable|string',
            'link_one_quality_one' => 'required|string',
            'link_one_quality_two' => 'required|string',
            'link_one_quality_three' => 'required|string',
            'link_two' => 'nullable|string',
            'link_three' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $channel = Channel::find($id);

        if(is_null($channel)){
            return $this->returnError('Channel not found');
        }

        $slug = Str::slug($request->name);
        $slugCheckChannel = Channel::where('slug',$slug)->first();

        if(!is_null($slugCheckChannel) && intval($slugCheckChannel->id) !== intval($id)){
            return $this->returnError('Channel already exist');
        }

        try {
            DB::transaction(function ()use (&$channel , &$request, &$slug) {
                $channel->name = $request->name;
                $channel->category_id = $request->category_id;

                $channel->link_one_quality_one = $request->link_one_quality_one;
                $channel->link_one_quality_two = $request->link_one_quality_two;
                $channel->link_one_quality_three = $request->link_one_quality_three;

                $channel->link_two_quality_one = $request->link_two_quality_one;
                $channel->link_two_quality_two = $request->link_two_quality_two;
                $channel->link_two_quality_three = $request->link_two_quality_three;

                $channel->link_three_quality_one = $request->link_three_quality_one;
                $channel->link_three_quality_two = $request->link_three_quality_two;
                $channel->link_three_quality_three = $request->link_three_quality_three;

                $channel->image = $request->image;
                $channel->slug = $slug;
                $channel->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        $channel->load('category');
        return $this->returnData('channel', $channel);
    }


    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse|array
     */
    public function destroy(Request $request,$id): JsonResponse|array
    {
        $channel = Channel::find($id);

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
