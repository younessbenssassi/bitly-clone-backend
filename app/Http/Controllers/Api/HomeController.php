<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $type = $request->get('type');

        $popular = [];
        if(!is_null($type) || $type === 'popular'){
            $popular = Category::orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $sport = [];
        if(!is_null($type) || $type === 'sport'){
            $sport = Category::where('type',1)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $netflix = [];
        if(!is_null($type) || $type === 'netflix'){
            $netflix = Category::where('type',2)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $movies = [];
        if(!is_null($type) || $type === 'movies'){
            $movies = Category::where('type',3)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $news = [];
        if(!is_null($type) || $type === 'news'){
            $news = Category::where('type',4)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $carton = [];
        if(!is_null($type) || $type === 'carton'){
            $carton = Category::where('type',5)
                ->orderBy('visitors', 'DESC')
                ->limit(6)
                ->get();
        }

        $general = [];
        if(!is_null($type)){
            $general = Category::whereNull('type')
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
}
