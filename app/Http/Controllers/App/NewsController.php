<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
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
        $news = News::whereActive(1)->paginate(16);

        return view('app.news.index', ['news' => $news]);

    }

    /**
     * @param News $news
     * @return View
     */
    public function detail(News $news): View
    {
        if ($news->active !== 1) {
            abort(404);
        }

        return view('app.news.detail', ['news' => $news]);
    }
}
