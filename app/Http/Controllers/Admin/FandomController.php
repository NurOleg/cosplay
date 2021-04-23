<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fandom\StoreFandomRequest;
use App\Http\Requests\Admin\Fandom\UpdateFandomRequest;
use App\Models\Fandom;
use App\Services\Admin\FandomService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FandomController extends Controller
{
    /**
     * @var FandomService
     */
    private FandomService $fandomService;

    /**
     * fandomController constructor.
     * @param FandomService $fandomService
     */
    public function __construct(FandomService $fandomService)
    {
        $this->fandomService = $fandomService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $fandoms = $this->fandomService->index();

        return view('admin.fandom.index', ['fandoms' => $fandoms]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.fandom.create');
    }

    /**
     * @param StoreFandomRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFandomRequest $request): RedirectResponse
    {
        if ($fandom = $this->fandomService->store($request)) {
            return redirect()->route('fandom_index')->with('success', 'Фандом успешно создан!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать фандом');
    }

    /**
     * @param Fandom $fandom
     * @return View
     */
    public function detail(Fandom $fandom): View
    {
        return view('admin.fandom.detail', ['fandom' => $fandom]);
    }

    /**
     * @param UpdateFandomRequest $request
     * @param Fandom $fandom
     * @return RedirectResponse
     */
    public function update(UpdateFandomRequest $request, Fandom $fandom): RedirectResponse
    {
        if ($updatedFandom = $this->fandomService->update($request, $fandom)) {
            return redirect()->route('fandom_index')->with('success', 'Фандом успешно обновлён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить фандом.');
    }

    /**
     * @param Fandom $fandom
     * @return RedirectResponse
     */
    public function delete(Fandom $fandom): RedirectResponse
    {
        if ($this->fandomService->delete($fandom)) {
            return redirect()->route('fandom_index')->with('success', 'Фандом успешно удалён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить фандом.');
    }
}
