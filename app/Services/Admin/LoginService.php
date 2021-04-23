<?php


namespace App\Services\Admin;


use App\Http\Requests\Admin\Login\LoginRequest;
//use App\Http\Requests\Admin\Login\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class LoginService
{
    //public function register(RegisterRequest $request)
    //{
    //    $data = $request->all();
    //    $data['password'] = bcrypt($request->get('password'));
//
    //    $user = User::create($data);
//
    //    $request->session()->regenerate();
//
    //    Auth::login($user);
//
    //    return redirect()->intended(route(''));
    //}

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('fandom_index'));
        }

        return back()->withErrors([
            'email' => 'Вы ещё не зарегестрированы либо ввели неправильный пароль.',
        ]);
    }
}
