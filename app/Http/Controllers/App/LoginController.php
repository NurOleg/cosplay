<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Login\LoginRequest;
use App\Http\Requests\App\Login\LogoutRequest;
use App\Http\Requests\App\Login\RegisterRequest;
use App\Models\Executant;
use App\Services\App\LoginService;
use App\Services\App\PersonalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    private LoginService $loginService;

    /**
     * @var PersonalService
     */
    private PersonalService $personalService;

    /**
     * LoginController constructor.
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService, PersonalService $personalService)
    {
        $this->loginService = $loginService;
        $this->personalService = $personalService;
    }

    /**
     * @return View
     */
    public function loginForm(): View
    {
        return view('app.login.login');
    }

    /**
     * @return View
     */
    public function registerForm(): View
    {
        return view('app.login.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        return $this->loginService->register($request);
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->loginService->login($request);
    }

    /**
     * @param LogoutRequest $request
     * @return RedirectResponse
     */
    public function logout(LogoutRequest $request): RedirectResponse
    {
        $user = $this->personalService->getAuthenticatedUser();

        $guard = $user instanceof Executant ? 'executant' : 'customer';

        auth()->guard($guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('main'));
    }
}
