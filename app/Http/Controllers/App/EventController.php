<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Event\ListEventRequest;
use App\Models\Event;
use App\Models\News;
use App\Services\App\EventService;
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

        return view('app.event.index', compact('events'));

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

        $event->load(['city', 'images']);

        return view('app.event.detail', ['event' => $event]);
    }
}
