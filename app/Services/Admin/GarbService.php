<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Garb\StoreNewsRequest;
use App\Http\Requests\Admin\Garb\UpdateNewsRequest;
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
     * @param StoreNewsRequest $request
     * @return Garb
     */
    public function store(StoreNewsRequest $request): Garb
    {
        return Garb::create($request->validated());
    }

    /**
     * @param UpdateNewsRequest $request
     * @param Garb $garb
     * @return Garb
     */
    public function update(UpdateNewsRequest $request, Garb $garb): Garb
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
