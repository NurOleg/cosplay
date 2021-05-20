<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Models\Executant;
use App\Models\Fandom;
use App\Models\Hero;
use App\Models\Thematic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('app.main');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request): JsonResponse
    {
        $result = [];

        if ($request->get('fandom', null)) {
            $result = Fandom::where('name_ru', 'like', '%'. $request->get('fandom') .'%')
                ->orWhere('name_eng', 'like', '%'. $request->get('fandom') .'%')
                ->get();
        }

        if ($request->get('hero', null)) {
            $result = Hero::where('name_ru', 'like', '%'. $request->get('hero') .'%')
                ->orWhere('name_eng', 'like', '%'. $request->get('hero') .'%')
                ->get();
        }

        if ($request->get('thematic', null)) {
            $result = Thematic::where('name_ru', 'like', '%'. $request->get('thematic') .'%')
                ->orWhere('name_eng', 'like', '%'. $request->get('thematic') .'%')
                ->get();
        }

        return response()->json($result);
    }
}
