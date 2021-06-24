<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Event\StoreEventRequest;
use App\Http\Requests\Admin\Event\UpdateEventRequest;
use App\Models\City;
use App\Models\Event;
use App\Services\Admin\EventService;
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
     * @return View
     */
    public function index(): View
    {
        $events = $this->eventService->index();

        return view('admin.event.index', ['events' => $events]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        $cities = City::all();

        return view('admin.event.create', compact('cities'));
    }

    /**
     * @param StoreEventRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {
        //dd($request->all());
        if ($event = $this->eventService->store($request)) {
            return redirect()->route('event_index')->with('success', 'Мероприятие успешно создано!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать мероприятие.');
    }

    /**
     * @param Event $event
     * @return View
     */
    public function detail(Event $event): View
    {
        $event->load(['city', 'images']);
        $cities = City::all();

        return view('admin.event.detail', compact(['event', 'cities']));
    }

    /**
     * @param UpdateEventRequest $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        if ($this->eventService->update($request, $event)) {
            return redirect()->route('event_index')->with('success', 'Мероприятие успешно обновлено!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить мероприятие.');
    }

    /**
     * @param Event $event
     * @return RedirectResponse
     */
    public function delete(Event $event): RedirectResponse
    {
        if ($this->eventService->delete($event)) {
            return redirect()->route('event_index')->with('success', 'Мероприятие успешно удалено!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить мероприятие.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeImage(Request $request): JsonResponse
    {
        $result = ['location' => $this->newsService->storeImage($request)];
        return response()->json($result);
    }
}
