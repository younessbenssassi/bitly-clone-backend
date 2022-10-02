<?php

namespace App\Http\Controllers\Api;

use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LinksController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $search = $request->get('search');
        $page = $request->get('page', 1);
        $offset = 0;
        if ($page > 1)
        {
            $offset = $page * 20;
        }
        $links = Link::where('user_id',$account->id)
            ->when(!is_null($search),function($q) use($search){
                return $q->where('title','like',"%{$search}%");
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit(20)
            ->get();

        return response()->json([
            'status' => true,
            'links'=> $links,
        ]);
    }

    /**
     * @param Request $request
     * @param $generated_link
     * @return JsonResponse
     */
    public function show(Request $request,$generated_link): JsonResponse
    {
        $link = Link::where('generated_link',$generated_link)->first();

        if(is_null($link)){
            return $this->returnError('Link not found');
        }

        $link->visitors++;
        $link->save();

        return $this->returnData('original_link', $link->original_link);
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required|integer',
            'title' => 'required|string',
            'original_link' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $link = null;

        try {
            DB::transaction(function ()use (&$link,&$request,&$account) {
                $link = new Link();
                $link->user_id = $account->id;
                $link->generated_link = $this->generateUniqueLink($request->type);
                $link->title = $request->title;
                $link->original_link = $request->original_link;
                $link->type = $request->type;
                $link->visitors = 0;
                $link->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnData('link', $link);
    }


    /**
     * @param Request $request
     * @param $generated_link
     * @return JsonResponse
     */
    public function update(Request $request,$generated_link): JsonResponse
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'generated_link' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $link = Link::where('generated_link',$generated_link)->first();
        if(is_null($link)){
            return $this->returnError('Link not found');
        }

        if(intval($link->user_id) !== $account->id){
            return $this->returnError('Not allowed');
        }

        if($generated_link !== $request->generated_link){
            $checkGeneratedLink = Link::where('generated_link',$request->generated_link)->first();
            if(!is_null($checkGeneratedLink)){
                return $this->returnError('Custom link already used');
            }
        }


        try {
            DB::transaction(function ()use (&$link, &$request) {
                $link->title = $request->title;
                $link->generated_link = $request->generated_link;
                $link->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnData('link', $link);
    }


    /**
     * @param Request $request
     * @param $generated_link
     * @return JsonResponse|array
     */
    public function destroy(Request $request,$generated_link): JsonResponse|array
    {
        $account = Auth::guard('user-api')->user();
        if(is_null($account)){
            return $this->returnError('Account not found');
        }

        $link = Link::where('generated_link',$generated_link)->first();
        if(is_null($link)){
            return $this->returnError('Link not found');
        }

        if(intval($link->user_id) !== $account->id){
            return $this->returnError('Not allowed');
        }

        try {
            DB::transaction(function ()use (&$link) {
                $link->delete();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        return $this->returnSuccessMessage('Account deleted successfully');
    }


    /**
     * @return string
     */
    public function generateUniqueLink(int $type): string
    {
        //type = 0 to short link , 1 to expand link
        $strLength = $type === 0 ? 7 : 40;
        //Generate link slug, we are generating links with small length so the possibility to get same slug is little bit higher
        while (true) {
            $generated_link = Str::random($strLength);
            $linkCheck = Link::where('generated_link',$generated_link)->first();
            if(is_null($linkCheck))
                break;
        }
        return $generated_link;
    }
}
