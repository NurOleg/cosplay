<?php

namespace App\Http\Controllers\App\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Personal\Garb\StoreGarbRequest;
use App\Http\Requests\App\Personal\Garb\UpdateGarbRequest;
use App\Models\Garb;
use App\Models\Service;
use App\Services\App\Personal\GarbService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GarbController extends Controller
{
    /**
     * @var GarbService
     */
    private GarbService $garbService;

    /**
     * GarbController constructor.
     * @param GarbService $garbService
     */
    public function __construct(GarbService $garbService)
    {
        $this->garbService = $garbService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $garbs = $this->garbService->index();

        return view('app.personal.garb.index', ['garbs' => $garbs]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        $services = Service::all();

        return view('app.personal.garb.create', compact(['services']));
    }

    /**
     * @param StoreGarbRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGarbRequest $request): RedirectResponse
    {
        if ($garb = $this->garbService->store($request)) {
            return redirect()
                ->route('personal_garb_detail', ['garb' => $garb->id])
                ->with('success', 'Костюм успешно создан!');
        }

        return redirect()
            ->back()
            ->withErrors('Что-то пошло не так. Не удалось создать костюм.');
    }

    /**
     * @param Garb $garb
     * @return View
     */
    public function detail(Garb $garb): View
    {
        $garb->load(['fandom', 'thematic', 'hero', 'services']);

        $garb->service_ids = $garb->services->pluck('id')->toArray();
        $services = Service::all();

        return view('app.personal.garb.detail', compact(['garb', 'services']));
    }

    /**
     * @param UpdateGarbRequest $request
     * @param Garb $garb
     * @return RedirectResponse
     */
    public function update(UpdateGarbRequest $request, Garb $garb): RedirectResponse
    {
        if ($updatedGarb = $this->garbService->update($request, $garb)) {
            return redirect()
                ->route('personal_garb_detail', ['garb' => $updatedGarb])
                ->with('success', 'Костюм успешно обновлён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить костюм.');
    }

    /**
     * @param Garb $garb
     * @return RedirectResponse
     */
    public function delete(Garb $garb): RedirectResponse
    {
        if ($this->garbService->delete($garb)) {
            return redirect()->route('personal_garb_index')->with('success', 'Костюм успешно удалён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить костюм.');
    }
}
