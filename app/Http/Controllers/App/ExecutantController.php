<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Http\Requests\App\Executant\ListExecutantRequest;
use App\Models\City;
use App\Models\Executant;
use App\Models\Speciality;
use App\Models\Thematic;
use App\Services\App\ExecutantService;
use Illuminate\Contracts\View\View;

class ExecutantController extends Controller
{
    /**
     * @var ExecutantService
     */
    private ExecutantService $executantService;

    public function __construct(ExecutantService $executantService)
    {
        $this->executantService = $executantService;
    }

    /**
     * @param ListExecutantRequest $request
     * @return View
     */
    public function index(ListExecutantRequest $request)
    {
        $garbFilterData = [
            'hero'     => $request->get('hero', null),
            'fandom'   => $request->get('fandom', null),
            'thematic' => $request->get('thematic', null),
        ];

        session()->put('garb_filter_data', $garbFilterData);

        $executants = $this->executantService->index($request);

        //$tab = $this->executantService->getActiveTab($request->get('hero', null), $executants);

        $cities = City::all();
        $thematics = Thematic::where('active', 1)->whereNotNull('name_ru')->get();
        $specialities = Speciality::all();
        $showGarbs = !empty(array_filter($garbFilterData));

        return view('app.executant.index', compact(['executants', 'cities', 'thematics', 'specialities', 'showGarbs']));
    }

    /**
     * @param Executant $executant
     * @return View
     */
    public function detail(Executant $executant)
    {
        $executant = $this->executantService->detail($executant);

        return view('app.executant.detail', compact('executant'));
    }
}
