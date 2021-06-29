<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Personal\UserSettingsRequest;
use App\Models\Executant;
use App\Services\App\PersonalService;
use Illuminate\Contracts\View\View;

class PersonalController extends Controller
{
    /**
     * @var PersonalService
     */
    private PersonalService $personalService;

    /**
     * PersonalController constructor.
     * @param PersonalService $personalService
     */
    public function __construct(PersonalService $personalService)
    {
        $this->personalService = $personalService;
    }

    /**
     * @return View
     */
    public function settingsForm(): View
    {
        $user = $this->personalService->getAuthenticatedUser();

        if ($user === null) {
            abort(403);
        }

        $user->type = $user instanceof Executant ? 'executant' : 'customer';
        $user->load(['city']);

        return view('app.personal.settings_' . $user->type, ['user' => $user]);
    }


    public function update(UserSettingsRequest $request)
    {
        if ($this->personalService->updateUser($request)) {
            return redirect()->route('personal_settings')->with('success', 'Профиль успешно обновлён!');
        }

        return redirect()->back()->withErrors('Что-то пошло не так. Не удалось обновить профиль.');
    }
}
