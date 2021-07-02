<?php

namespace App\Services\App;

use App\Http\Requests\App\Executant\ListExecutantRequest;
use App\Models\Executant;
use App\Models\Garb;
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
            $executantQuery->whereCityId($request->get('city'));
        }

        if ($request->filled('name')) {
            $executantQuery->whereName($request->get('name'));
        }

        if ($request->filled('speciality')) {
            $executantQuery->whereHas('specialities', function ($builder) use ($request) {
                $builder
                    ->where('specialities.id', $request->get('speciality'));
            });
        }

        return $executantQuery->with(['image', 'garbs.hero'])->get();
    }

    /**
     * @param Executant $executant
     */
    private function getActiveGarb(Executant $executant): void
    {
        $garbFilterData = session()->get('garb_filter_data');

        // Если в сессии нет фильтров по свойствам костюма, делаем активным первый костюм у исполнителя
        if (empty($garbFilterData)
            ||
            (empty($garbFilterData['hero']) && empty($garbFilterData['fandom']) && empty($garbFilterData['thematic']))
        ) {
            $executant->garbs[0]->is_active = true;
            return;
        }

        // убираем пустые свойствам костюма из сессии
        $garbData = array_filter($garbFilterData);

        foreach ($executant->garbs as $garb) {
            $entires = 0;
            foreach ($garbData as $garbProperty => $propertyValue) {
                if ($garb->$garbProperty->name_ru === $propertyValue || $garb->$garbProperty->name_eng === $propertyValue) {
                    $entires++;

                    if ($entires === count($garbData)) {
                        $garb->is_active = true;
                        return;
                    }
                }
            }
        }
    }

    /**
     * @param Executant $executant
     * @return Executant
     */
    public function detail(Executant $executant): Executant
    {
        $executantData = $executant->load([
            'garbs',
            'garbs.images',
            'garbs.fandom',
            'garbs.thematic',
            'garbs.hero',
            'specialities',
            'city',
            'services'
        ]);
        $this->getActiveGarb($executantData);

        return $executantData;
    }
}
