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

        if ($request->has('hero')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('hero', function ($b) use ($request) {
                    $b->whereCode($request->get('hero'));
                });
            });
        }

        if ($request->has('fandom')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('fandom', function ($b) use ($request) {
                    $b->whereCode($request->get('fandom'));
                });
            });
        }

        if ($request->has('thematic')) {
            $executantQuery->whereHas('garbs', function ($builder) use ($request) {
                $builder->whereHas('thematic', function ($b) use ($request) {
                    $b->whereCode($request->get('thematic'));
                });
            });
        }

        if ($request->has('sex')) {
            $executantQuery->whereSex($request->get('sex'));
        }

        if ($request->has('nickname')) {
            $executantQuery->whereNickname($request->get('nickname'));
        }

        if ($request->has('city')) {
            $executantQuery->whereCity($request->get('city'));
        }

        if ($request->has('name')) {
            $executantQuery->whereName($request->get('name'));
        }

        return $executantQuery->with('image')->get();
    }
}
