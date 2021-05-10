<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\Admin\NewsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    /**
     * @var NewsService
     */
    private NewsService $newsService;

    /**
     * NewsController constructor.
     * @param NewsService $newsService
     */
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $news = $this->newsService->index();

        return view('admin.news.index', ['news' => $news]);

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.news.create');
    }

    /**
     * @param StoreNewsRequest $request
     * @return RedirectResponse
     */
    public function store(StoreNewsRequest $request): RedirectResponse
    {
        //dd($request->all());
        if ($news = $this->newsService->store($request)) {
            return redirect()->route('news_index')->with('success', 'Новость успешно создана!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать новость.');
    }

    /**
     * @param News $news
     * @return View
     */
    public function detail(News $news): View
    {
        return view('admin.news.detail', ['news' => $news]);
    }

    /**
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        if ($updatedGarb = $this->newsService->update($request, $news)) {
            return redirect()->route('news_index')->with('success', 'Новость успешно обновлена!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить новость.');
    }

    /**
     * @param News $news
     * @return RedirectResponse
     */
    public function delete(News $news): RedirectResponse
    {
        if ($this->newsService->delete($news)) {
            return redirect()->route('news_index')->with('success', 'Новость успешно удалена!');
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
