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

        $executantQuery->has('garbs');

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

        if ($request->filled('nick')) {
            $executantQuery
                ->where('nickname', $request->get('nick'))
                ->orWhere('nickname_eng', $request->get('nick'));
        }

        if ($request->filled('city')) {
            $executantQuery->whereCityId($request->get('city'));
        }

        if ($request->filled('fullName')) {
            $executantQuery->where('fullName', 'like', '%' . $request->get('fullName') . '%');
        }

        if ($request->filled('speciality')) {
            $executantQuery->whereHas('specialities', function ($builder) use ($request) {
                $builder
                    ->where('specialities.id', $request->get('speciality'));
            });
        }

        $executants = $executantQuery->with(['image', 'garbs.hero', 'garbs.images'])->get();

        $garbFilterData = session()->get('garb_filter_data');

        if (!empty($garbFilterData)) {
            // ?????????????? ???????????? ?????????????????? ?????????????? ???? ????????????
            $garbData = array_filter($garbFilterData);

            return $this->getShowhedGarbs($garbData, $executants);
        }

        return $executants;
    }

    /**
     * @param array $garbData
     * @param $executants
     * @return mixed
     */
    private function getShowhedGarbs(array $garbData, $executants)
    {
        foreach ($executants as $executant) {
            foreach ($executant->garbs as $garb) {
                $entires = 0;
                foreach ($garbData as $garbProperty => $propertyValue) {
                    if (mb_strtolower($garb->$garbProperty->name_ru) === mb_strtolower($propertyValue)
                        || mb_strtolower($garb->$garbProperty->name_eng) === mb_strtolower($propertyValue)) {
                        $entires++;

                        if ($entires === count($garbData)) {
                            $garb->show = true;
                        }
                    }
                }
            }
        }
        return $executants;
    }

    /**
     * @param Executant $executant
     */
    private function getActiveGarb(Executant $executant): void
    {
        $garbFilterData = session()->get('garb_filter_data');

        // ???????? ?? ???????????? ?????? ???????????????? ???? ?????????????????? ??????????????, ???????????? ???????????????? ???????????? ???????????? ?? ??????????????????????
        if (empty($garbFilterData)
            ||
            (empty($garbFilterData['hero']) && empty($garbFilterData['fandom']) && empty($garbFilterData['thematic']))
        ) {
            $executant->garbs[0]->is_active = true;
            return;
        }

        // ?????????????? ???????????? ?????????????????? ?????????????? ???? ????????????
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
            'garbs.services',
            'specialities',
            'city'
        ]);
        $this->getActiveGarb($executantData);

        $executantData->specialitiesRow = implode(', ', $executantData->specialities->pluck('name')->toArray());

        return $executantData;
    }
}
