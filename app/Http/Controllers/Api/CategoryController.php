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
               return $q->where('name_en','like',"%{$search}%")
                   ->orWhere('name_ar','like',"%{$search}%");
            })
            ->orderBy('id', 'DESC')
            ->offset($offset)
            ->limit(20)
            ->get();


        return $this->returnData('categories', $categories);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function show(Request $request,$id): JsonResponse
    {
        $category = Category::with('channels')->find($id);
        $category->visitors = $category->visitors + 1;
        $category->save();

        if(is_null($category)){
            return $this->returnError('Category not found');
        }

        return $this->returnData('category', $category);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|string',
            'type_id' => 'required',
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
                $category->type_id = $request->type_id;
                $category->slug = $slug;
                $category->save();
                $category->load('channels');
                $category->type = Category::getType($category->type_id);
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }
        return $this->returnData('category', $category);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request,$id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorValidator($validator);
        }

        $category = Category::find($id);

        if(is_null($category)){
            return $this->returnError('Category not found');
        }

        $slug = Str::slug($request->name_en);
        $slugCheckCategory = Category::where('slug',$slug)->first();

        if(!is_null($slugCheckCategory) && intval($slugCheckCategory->id) !== intval($id)){
            return $this->returnError('Category already exist');
        }

        try {
            DB::transaction(function ()use (&$category , &$request,&$slug) {
                $category->name_en = $request->name_en;
                $category->name_ar = $request->name_ar;
                $category->image = $request->image;
                $category->type_id = $request->type_id;
                $category->slug = $slug;
                $category->save();
                $category->load('channels');
                $category->type = Category::getType($category->type_id);
            });

        }
        catch (\Exception $e){
            return $this->returnError($e);
        }

        $category->load('channels');
        return $this->returnData('category', $category);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse|array
     */
    public function destroy(Request $request,$id): JsonResponse|array
    {
        $category = Category::find($id);

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
