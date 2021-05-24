<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Hero\StoreHeroRequest;
use App\Http\Requests\Admin\Hero\UpdateHeroRequest;
use App\Models\Hero;
use Illuminate\Database\Eloquent\Collection;

final class HeroService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Hero::orderBy('is_new', 'desc')->get();
    }

    /**
     * @param StoreHeroRequest $request
     * @return Hero
     */
    public function store(StoreHeroRequest $request): Hero
    {
        $active = $request->get('active') === 'on' ? 1 : 0;

        return Hero::create(array_merge($request->validated(), ['active' => $active]));
    }

    /**
     * @param UpdateHeroRequest $request
     * @param Hero $hero
     * @return Hero
     */
    public function update(UpdateHeroRequest $request, Hero $hero): Hero
    {
        $active = $request->get('active') === 'on' ? 1 : 0;

        $hero->update(array_merge($request->validated(), ['active' => $active]));

        return $hero;
    }

    /**
     * @param Hero $hero
     * @return bool
     */
    public function delete(Hero $hero): bool
    {
        return $hero->delete();
    }
}
