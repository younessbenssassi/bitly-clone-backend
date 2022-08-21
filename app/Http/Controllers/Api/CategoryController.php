<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $page = $request->get('page', 1);
        $offset = 0;
        if ($page > 1)
            $offset = $page * 20;

        $categories = Category::with('channels')
            ->when(!is_null($search),function($q) use($search){
               return $q->where('name','like',"%{$search}%");
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit(20)
            ->get();


        return $this->returnData('categories', $categories);
    }

    public function show(Request $request,$hash): JsonResponse
    {
        $category = Category::with('channels')->where('hash',$hash)->first();

        if(is_null($category)){
            return $this->returnError('Category not found');
        }

        return $this->returnData('category', $category);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $slug = Str::slug($request->name_en);
        $category = Category::where('slug',$slug)->first();

        if(!is_null($category)){
            return $this->returnError('Category already exist');
        }

        $category = null;

        try {
            DB::transaction(function ()use (&$category, &$request, &$slug) {
                $category = new Category();
                $category->name_en = $request->name_en;
                $category->name_ar = $request->name_ar;
                $category->image = $request->image;
                $category->slug = $slug;
                $category->type = 1;
                $category->save();
                $category->load('channels');
                $category->type = Category::getType($category->type);
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnData('category', $category);
    }

    public function update(Request $request,$hash): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $category = Category::where('hash',$hash)->first();

        if(is_null($category)){
            return $this->returnError('Category not found');
        }

        try {
            DB::transaction(function ()use (&$category , &$request) {
                $category->name = $request->name;
                $category->description = $request->description;
                $category->save();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        $category->load('channels');
        return $this->returnData('category', $category);
    }

    public function destroy(Request $request,$hash)
    {
        $category = Category::where('hash',$hash)->first();

        if(is_null($category)){
            return $this->returnError('Category not found');
        }
        try {
            DB::transaction(function ()use (&$category , &$request) {
                $category->delete();
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        return $this->returnSuccessMessage('Category deleted successfully');
    }
}
