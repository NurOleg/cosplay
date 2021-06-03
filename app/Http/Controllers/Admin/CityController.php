<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\CityRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $cities = City::all();

        return view('admin.city.index', compact('cities'));

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.city.create');
    }

    /**
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request): RedirectResponse
    {
        //dd($request->all());
        if (City::create($request->all())) {
            return redirect()->route('city_index')->with('success', 'Город успешно создан!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось создать город.');
    }

    /**
     * @param City $city
     * @return View
     */
    public function detail(City $city): View
    {
        return view('admin.city.detail', compact('city'));
    }

    /**
     * @param CityRequest $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(CityRequest $request, City $city): RedirectResponse
    {
        if ($city->update($request->all())) {
            return redirect()->route('city_index')->with('success', 'Город успешно обновлен!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить город.');
    }

    /**
     * @param City $city
     * @return RedirectResponse
     */
    public function delete(City $city): RedirectResponse
    {
        if ($city->delete()) {
            return redirect()->route('news_index')->with('success', 'Город успешно удален!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось удалить город.');
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
