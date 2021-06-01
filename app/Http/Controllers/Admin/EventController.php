<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Event\StoreEventRequest;
use App\Http\Requests\Admin\Event\UpdateEventRequest;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\City;
use App\Models\Event;
use App\Models\News;
use App\Services\Admin\EventService;
use App\Services\Admin\NewsService;
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
            return redirect()->route('event_index')->with('success', 'Новость успешно создана!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать новость.');
    }

    /**
     * @param Event $event
     * @return View
     */
    public function detail(Event $event): View
    {
        return view('admin.event.detail', ['event' => $event]);
    }

    /**
     * @param UpdateEventRequest $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        if ($updatedGarb = $this->eventService->update($request, $event)) {
            return redirect()->route('event_index')->with('success', 'Новость успешно обновлена!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить новость.');
    }

    /**
     * @param Event $event
     * @return RedirectResponse
     */
    public function delete(Event $event): RedirectResponse
    {
        if ($this->eventService->delete($event)) {
            return redirect()->route('event_index')->with('success', 'Новость успешно удалена!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить новость.');
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
