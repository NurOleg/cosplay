<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Event;
use App\Models\Executant;
use App\Models\Fandom;
use App\Models\Hero;
use App\Models\News;
use App\Models\Speciality;
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
        $events = Event::where('active', 1)->take(4)->get();
        $news = News::where('active', 1)->orderBy('created_at', 'desc')->take(3)->get();
        $genders = ['male' => 'Мужской', 'female' => 'Женский'];
        $cities = City::all();
        $thematics = Thematic::where('active', 1)->whereNotNull('name_ru')->get();
        $specialities = Speciality::all();

        return view('app.main', compact(['events', 'news', 'genders', 'cities', 'thematics', 'specialities']));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request): JsonResponse
    {
        $result = [];

        if ($request->get('fandom', null)) {
            $result = Fandom::where('name_ru', 'like', '%' . $request->get('fandom') . '%')
                ->orWhere('name_eng', 'like', '%' . $request->get('fandom') . '%')
                ->get();
        }

        if ($request->get('hero', null)) {
            $result = Hero::where('name_ru', 'like', '%' . $request->get('hero') . '%')
                ->orWhere('name_eng', 'like', '%' . $request->get('hero') . '%')
                ->get();
        }

        if ($request->get('thematic', null)) {
            $result = Thematic::where('name_ru', 'like', '%' . $request->get('thematic') . '%')
                ->orWhere('name_eng', 'like', '%' . $request->get('thematic') . '%')
                ->get();
        }

        if ($request->get('fullName', null)) {
            $result = Executant::has('garbs')
                ->where('fullName', 'like', '%' . $request->get('fullName') . '%')
                ->get();

            foreach ($result as $executant) {
                $executant->name_ru = $executant->fullName;
            }

            return $result;
        }

        return response()->json($result);
    }
}
