<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Thematic\StoreThematicRequest;
use App\Http\Requests\Admin\Thematic\UpdateThematicRequest;
use App\Models\Thematic;
use App\Services\Admin\ThematicService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ThematicController extends Controller
{
    /**
     * @var ThematicService
     */
    private ThematicService $thematicService;

    /**
     * ThematicController constructor.
     * @param ThematicService $thematicService
     */
    public function __construct(ThematicService $thematicService)
    {
        $this->thematicService = $thematicService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $thematics = $this->thematicService->index();

        return view('admin.thematic.index', ['thematics' => $thematics]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.thematic.create');
    }

    /**
     * @param StoreThematicRequest $request
     * @return RedirectResponse
     */
    public function store(StoreThematicRequest $request): RedirectResponse
    {
        if ($thematic = $this->thematicService->store($request)) {
            return redirect()->route('thematic_index')->with('success', 'Тематика успешно создана!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать тематику.');
    }

    /**
     * @param Thematic $thematic
     * @return View
     */
    public function detail(Thematic $thematic): View
    {
        return view('admin.thematic.detail', ['thematic' => $thematic]);
    }

    /**
     * @param UpdateThematicRequest $request
     * @param Thematic $thematic
     * @return RedirectResponse
     */
    public function update(UpdateThematicRequest $request, Thematic $thematic): RedirectResponse
    {
        if ($updatedThematic = $this->thematicService->update($request, $thematic)) {
            return redirect()->route('thematic_index')->with('success', 'Тематика успешно обновлена!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить тематику.');
    }

    /**
     * @param Thematic $thematic
     * @return RedirectResponse
     */
    public function delete(Thematic $thematic): RedirectResponse
    {
        if ($this->thematicService->delete($thematic)) {
            return redirect()->route('thematic_index')->with('success', 'Тематика успешно удалена!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить тематику.');
    }
}
