<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Http\Requests\App\Executant\ListExecutantRequest;
use App\Models\Executant;
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
        $executants = $this->executantService->index($request);
        $tab = $this->executantService->getActiveTab($request->get('hero', ''), $executants);

        return view('app.executant.index', compact(['executants', 'tab']));
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