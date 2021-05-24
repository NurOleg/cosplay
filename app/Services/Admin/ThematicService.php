<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Thematic\StoreThematicRequest;
use App\Http\Requests\Admin\Thematic\UpdateThematicRequest;
use App\Models\Thematic;
use Illuminate\Database\Eloquent\Collection;

final class ThematicService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Thematic::orderBy('is_new', 'desc')->get();
    }

    /**
     * @param StoreThematicRequest $request
     * @return Thematic
     */
    public function store(StoreThematicRequest $request): Thematic
    {
        $active = $request->get('active') === 'on' ? 1 : 0;

        return Thematic::create(array_merge($request->validated(), ['active' => $active]));
    }

    /**
     * @param UpdateThematicRequest $request
     * @param Thematic $thematic
     * @return Thematic
     */
    public function update(UpdateThematicRequest $request, Thematic $thematic): Thematic
    {
        $active = $request->get('active') === 'on' ? 1 : 0;

        $thematic->update(array_merge($request->validated(), ['active' => $active]));

        return $thematic;
    }

    /**
     * @param Thematic $thematic
     * @return bool
     */
    public function delete(Thematic $thematic): bool
    {
        return $thematic->delete();
    }
}
