<?php


namespace App\Services\App;


use App\Models\Event;
use App\Http\Requests\App\Event\ListEventRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class EventService
{
    /**
     * @param ListEventRequest $request
     * @return Collection
     */
    public function index(ListEventRequest $request): Collection
    {
        $query = Event::whereActive(1);

        if ($request->filled('city')) {
            $query->whereHas('city', function ($builder) use ($request) {
                $builder->whereId($request->get('city'));
            });
        }

        if ($request->filled('year')) {
            $query->whereYear('start', $request->get('year'));
        }

        if ($request->filled('month')) {
            $query->whereMonth('start', $request->get('month'));
        }

        $query->orderBy('created_at', 'desc');

        return $query->with('city')->get();
    }


}
