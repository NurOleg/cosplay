<?php


namespace App\Services\App;


use App\Http\Requests\App\Login\LoginRequest;
use App\Http\Requests\App\Login\RegisterRequest;
use App\Models\Customer;
use App\Models\Executant;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class LoginService
{
    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $model = 'App\\Models\\' . ucfirst($request->get('type'));

        if ($request->get('password') !== $request->get('confirm_password')) {
            return back()->withErrors([
                'password' => 'Введенные пароли не совпадают.',
            ]);
        }

        if ($model::wherePhone($request->get('email_or_phone'))
            ->orWhere('email', $request->get('email_or_phone'))->exists()) {
            return back()->withErrors([
                'email_or_phone' => 'Пользователь с данным телефоном или email уже существует.',
            ]);
        }

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        if (is_numeric($data['email_or_phone'])) {
            $data['phone'] = $data['email_or_phone'];
        } else {
            $data['email'] = $data['email_or_phone'];
        }

        $user = $model::create($data);

        if ($user instanceof Executant) {
            $user->competences()->attach(1);
        }

        $request->session()->regenerate();

        auth()->guard($request->get('type'))->login($user);

        return redirect()->intended(route('personal_settings'));
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $phoneOrEmail = $request->get('email_or_phone');
        $password = $request->get('password');

        $customer = Customer::where('phone', $phoneOrEmail)
            ->orWhere('email', $phoneOrEmail)->first();

        $executant = Executant::where('phone', $phoneOrEmail)
            ->orWhere('email', $phoneOrEmail)->first();

        if ($customer === null && $executant === null) {
            return back()->withErrors([
                'email' => 'Вы ещё не зарегестрированы либо ввели неправильный email/телефон.',
            ]);
        }

        if (($customer && !Hash::check($password, $customer->password))
        || ($executant && !Hash::check($password, $executant->password))) {
            return back()->withErrors([
                'email' => 'Вы ещё не зарегестрированы либо ввели неправильный пароль.',
            ]);
        }

        $request->session()->regenerate();

        if ($customer !== null) {
            Log::info('customer logout:');
            Log::info(auth()->guard('customer')->logoutOtherDevices($password));
            auth()->guard('customer')->login($customer);
        } elseif ($executant !== null) {
            Log::info('executant logout:');
            Log::info(json_encode(auth()->guard('executant')->logoutOtherDevices($password)));
            auth()->guard('executant')->login($executant);
        } else {
            return back()->withErrors([
                'email' => 'Что-то пошло не так.',
            ]);
        }

        return redirect()->intended(route('personal_settings'));
    }
}
