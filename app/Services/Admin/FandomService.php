<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Fandom\StoreFandomRequest;
use App\Http\Requests\Admin\Fandom\UpdateFandomRequest;
use App\Models\Fandom;
use Illuminate\Database\Eloquent\Collection;

final class FandomService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Fandom::all();
    }

    /**
     * @param StoreFandomRequest $request
     * @return Fandom
     */
    public function store(StoreFandomRequest $request): Fandom
    {
        $active = $request->get('active') === 'on' ? 1 : 0;
        return Fandom::create(array_merge($request->validated(), ['active' => $active]));
    }

    /**
     * @param UpdateFandomRequest $request
     * @param Fandom $fandom
     * @return Fandom
     */
    public function update(UpdateFandomRequest $request, Fandom $fandom): Fandom
    {
        $active = $request->get('active') === 'on' ? 1 : 0;

        $fandom->update(array_merge($request->validated(), ['active' => $active]));

        return $fandom;
    }

    /**
     * @param Fandom $fandom
     * @return bool
     */
    public function delete(Fandom $fandom): bool
    {
        return $fandom->delete();
    }
}
