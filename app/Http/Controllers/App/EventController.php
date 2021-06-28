<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Event\ListEventRequest;
use App\Models\City;
use App\Models\Event;
use App\Models\News;
use App\Services\App\EventService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @var EventService
     */
    private EventService $eventService;

    /**
     * EventController constructor.
     * @param EventService $eventService
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * @param ListEventRequest $request
     * @return View
     */
    public function index(ListEventRequest $request): View
    {
        $events = $this->eventService->index($request);

        $cities = City::all();

        $months = Event::MONTHS_FOR_FILTER;

        $years = range(2018, Carbon::now()->year + 1);

        return view('app.event.index', compact('events', 'cities', 'months', 'years'));

    }

    /**
     * @param Event $event
     * @return View
     */
    public function detail(Event $event): View
    {
        if ($event->active !== 1) {
            abort(404);
        }

        $coordinates = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $event->point);

        $event->longitude = $coordinates['lon'];
        $event->latitude = $coordinates['lat'];

        $event->load(['city', 'images']);

        return view('app.event.detail', ['event' => $event]);
    }
}
