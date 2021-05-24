<?php

namespace App\Services\App;

use App\Http\Requests\App\Executant\ListExecutantRequest;
use App\Models\Executant;
use Illuminate\Support\Collection;

final class ExecutantService
{
    /**
     * @param ListExecutantRequest $request
     * @return Collection
     */
    public function index(ListExecutantRequest $request): Collection
    {
        $executantQuery = Executant::query();

        if ($request->filled('hero')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('hero', function ($b) use ($request) {
                    $b
                        ->where('name_ru', $request->get('hero'))
                        ->orWhere('name_eng', $request->get('hero'));
                });
            });
        }

        if ($request->filled('fandom')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('fandom', function ($b) use ($request) {
                    $b
                        ->where('name_ru', $request->get('fandom'))
                        ->orWhere('name_eng', $request->get('fandom'));
                });
            });
        }

        if ($request->filled('thematic')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('thematic', function ($b) use ($request) {
                    $b
                        ->where('name_ru', $request->get('thematic'))
                        ->orWhere('name_eng', $request->get('thematic'));
                });
            });
        }

        if ($request->filled('concretization')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder
                        ->where('concretization', $request->get('concretization'))
                        ->orWhere('concretization_eng', $request->get('concretization'));
            });
        }

        if ($request->filled('sex')) {
            $executantQuery->whereSex($request->get('sex'));
        }

        if ($request->filled('nickname')) {
            $executantQuery->whereNickname($request->get('nickname'));
        }

        if ($request->filled('city')) {
            $executantQuery->whereCity($request->get('city'));
        }

        if ($request->filled('name')) {
            $executantQuery->whereName($request->get('name'));
        }

        return $executantQuery->with('image')->get();
    }
}
