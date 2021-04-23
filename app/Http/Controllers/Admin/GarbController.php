<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Garb\StoreGarbRequest;
use App\Http\Requests\Admin\Garb\UpdateGarbRequest;
use App\Models\Garb;
use App\Services\Admin\GarbService;
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

        return view('admin.garb.index', ['garbs' => $garbs]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.garb.create');
    }

    /**
     * @param StoreGarbRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGarbRequest $request): RedirectResponse
    {
        if ($Garb = $this->garbService->store($request)) {
            return redirect()->route('garb_index')->with('success', 'Костюм успешно создан!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать костюм.');
    }

    /**
     * @param Garb $garb
     * @return View
     */
    public function detail(Garb $garb): View
    {
        return view('admin.garb.detail', ['garb' => $garb]);
    }

    /**
     * @param UpdateGarbRequest $request
     * @param Garb $garb
     * @return RedirectResponse
     */
    public function update(UpdateGarbRequest $request, Garb $garb): RedirectResponse
    {
        if ($updatedGarb = $this->garbService->update($request, $garb)) {
            return redirect()->route('garb_index')->with('success', 'Костюм успешно обновлён!');
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
            return redirect()->route('garb_index')->with('success', 'Костюм успешно удалён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить костюм.');
    }
}
