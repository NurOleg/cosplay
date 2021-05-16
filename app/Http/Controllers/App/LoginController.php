<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Login\LoginRequest;
use App\Http\Requests\App\Login\RegisterRequest;
use App\Services\App\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    private LoginService $loginService;

    /**
     * LoginController constructor.
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
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
}
