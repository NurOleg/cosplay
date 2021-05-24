<?php

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;
use App\Http\Requests\App\Executant\ListExecutantRequest;
use App\Services\App\ExecutantService;
use Illuminate\Support\Facades\View;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(ListExecutantRequest $request)
    {
        $executants = $this->executantService->index($request);

        return view('app.executant.index', compact('executants'));
    }

    public function detail()
    {

    }
}
