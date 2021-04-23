<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Garb\StoreGarbRequest;
use App\Http\Requests\Admin\Garb\UpdateGarbRequest;
use App\Models\Garb;
use Illuminate\Database\Eloquent\Collection;

final class GarbService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Garb::with('user')->get();
    }

    /**
     * @param StoreGarbRequest $request
     * @return Garb
     */
    public function store(StoreGarbRequest $request): Garb
    {
        return Garb::create($request->validated());
    }

    /**
     * @param UpdateGarbRequest $request
     * @param Garb $garb
     * @return Garb
     */
    public function update(UpdateGarbRequest $request, Garb $garb): Garb
    {
        $garb->update($request->validated());

        return $garb;
    }

    /**
     * @param Garb $garb
     * @return bool
     */
    public function delete(Garb $garb): bool
    {
        return $garb->delete();
    }
}
