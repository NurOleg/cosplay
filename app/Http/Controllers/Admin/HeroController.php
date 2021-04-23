<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hero\StoreHeroRequest;
use App\Http\Requests\Admin\Hero\UpdateHeroRequest;
use App\Models\Hero;
use App\Services\Admin\HeroService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HeroController extends Controller
{
    /**
     * @var HeroService
     */
    private HeroService $heroService;

    /**
     * HeroController constructor.
     * @param HeroService $heroService
     */
    public function __construct(HeroService $heroService)
    {
        $this->heroService = $heroService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $heroes = $this->heroService->index();

        return view('admin.hero.index', ['heroes' => $heroes]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.hero.create');
    }

    /**
     * @param StoreHeroRequest $request
     * @return RedirectResponse
     */
    public function store(StoreHeroRequest $request): RedirectResponse
    {
        if ($hero = $this->heroService->store($request)) {
            return redirect()->route('hero_index')->with('success', 'Герой успешно создан!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать героя');
    }

    /**
     * @param Hero $hero
     * @return View
     */
    public function detail(Hero $hero): View
    {
        return view('admin.hero.detail', ['hero' => $hero]);
    }

    /**
     * @param UpdateHeroRequest $request
     * @param Hero $hero
     * @return RedirectResponse
     */
    public function update(UpdateHeroRequest $request, Hero $hero): RedirectResponse
    {
        if ($updatedHero = $this->heroService->update($request, $hero)) {
            return redirect()->route('hero_index')->with('success', 'Герой успешно обновлён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить героя.');
    }

    /**
     * @param Hero $hero
     * @return RedirectResponse
     */
    public function delete(Hero $hero): RedirectResponse
    {
        if ($this->heroService->delete($hero)) {
            return redirect()->route('hero_index')->with('success', 'Герой успешно удалён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить героя.');
    }
}
