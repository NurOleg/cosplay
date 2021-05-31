@extends('layouts.app')
@section('content')
<section class="signup-form">
    <div class="container">
        <div class="signin-container">
            <div class="hero-form__title title title--center"><img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                   alt="Лого" aria-hidden="true">
                <h2 class="title__text">Регистрация</h2></div>
        </div>
        <div class="sign-tabs__header tabs-header">
            <div class="active sign-tabs-btn tab-button" data-tab="#Executor">
                <div class="sign-tabs-btn__title">Исполнитель</div>
                <div class="sign-tabs-btn__text">Я косплеер, крафтер, швея, випмейкер, гример</div>
            </div>
            <div class="sign-tabs-btn tab-button" data-tab="#Customer">
                <div class="sign-tabs-btn__title">Заказчик</div>
                <div class="sign-tabs-btn__text">Я ивент агентство, ивент менеджер, организатор мероприятий
                </div>
            </div>
        </div>
        <div class="tabs-body">
            <div class="c-tab open signin-container" id="Executor">
                <form class="signin-form__form" action="{{ route('public_register') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="executant">
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="phone">
                                    Email или телефон</label></div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input" id="phone"
                                                                           type="text"
                                                                           name="email_or_phone">
                            </div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header">
                                <label class="input-field__title" for="phone">
                                    Ваш пол</label></div>
                            <div class="input-field__input-wrapper">
                                <select class="input-field__input" name="sex" id="sex">
                                    <option value="male">Мужской</option>
                                    <option value="female">Женский</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input"
                                                                           id="password" type="text"
                                                                           name="password"></div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль еще раз</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input"
                                                                           id="doublePassword" type="text"
                                                                           name="confirm_password"></div>
                        </div>
                    </div>
{{--                    <div class="input-field__header"><span class="input-field__title">Специализация</span></div>--}}
{{--                    <div class="row sign__types wrap">--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="cosplayer"--}}
{{--                                                           name="cosplayer" type="checkbox"><label--}}
{{--                                    class="c-checkbox__body" for="cosplayer">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">косплеер</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="makeupArtist"--}}
{{--                                                           name="makeupArtist" type="checkbox"><label--}}
{{--                                    class="c-checkbox__body" for="makeupArtist">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">гример</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="crafter" name="crafter"--}}
{{--                                                           type="checkbox"><label class="c-checkbox__body"--}}
{{--                                                                                  for="crafter">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">крафтер</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="plasticMakeupArtist"--}}
{{--                                                           name="plasticMakeupArtist" type="checkbox"><label--}}
{{--                                    class="c-checkbox__body" for="plasticMakeupArtist">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">пластический гример</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="tailor" name="tailor"--}}
{{--                                                           type="checkbox"><label class="c-checkbox__body"--}}
{{--                                                                                  for="tailor">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">швея / портной</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                        <div class="setting-form-variables__column">--}}
{{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="wickmayer"--}}
{{--                                                           name="wickmayer" type="checkbox"><label--}}
{{--                                    class="c-checkbox__body" for="wickmayer">--}}
{{--                                    <div class="c-checkbox__checkbox"></div>--}}
{{--                                    <div class="c-checkbox__title">викмейкер</div>--}}
{{--                                </label></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="sign__accepts">
                        <div class="sign-agree"><input class="sign-agree__input" id="agree__services"
                                                       type="checkbox" name="agree_services"><label
                                class="sign-agree__body" for="agree__services">
                                <div class="sign-agree__checkbox"><img class="sign-agree__checked"
                                                                       src="{{ asset('images/checkbox.c6ab5b0a.svg') }}" alt="checkbox">
                                </div>
                                <div class="sign-agree__text">Я согласен с <a href="#">условиями пользования
                                        сервисом</a></div>
                            </label></div>
                        <div class="sign-agree"><input class="sign-agree__input" id="agree__data"
                                                       type="checkbox" name="agree_data"><label
                                class="sign-agree__body" for="agree__data">
                                <div class="sign-agree__checkbox"><img class="sign-agree__checked"
                                                                       src="{{ asset('images/checkbox.c6ab5b0a.svg') }}" alt="checkbox">
                                </div>
                                <div class="sign-agree__text">Я согласен на <a href="#">обработку моих
                                        персональных данных</a></div>
                            </label></div>
                    </div>
{{--                    <div class="center row sign__captcha">--}}
{{--                        <div class="g-recaptcha" data-sitekey="6LegvdIaAAAAAGTtgXkJFam7nYFe4_q8iY87VPHd"></div>--}}
{{--                    </div>--}}
                    <div class="signin-form__footer">
                        <button class="btn btn--large btn--red">Зарегистрироваться</button>
                        <div class="signin-form__finish">Уже есть аккаунт? <a class="link link--red" href="{{ route('public_login_form') }}">Войти</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="c-tab signin-container" id="Customer">
                <form class="signin-form__form" action="{{ route('public_register') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="customer">
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="phone">
                                    Email или телефон</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                           type="text"
                                                                           name="email_or_phone"></div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input"
                                                                           id="password" type="text"
                                                                           name="password"></div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль еще раз</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input"
                                                                           id="doublePassword" type="text"
                                                                           name="confirm_password"></div>
                        </div>
                    </div>
                    <div class="sign__accepts">
                        <div class="sign-agree"><input class="sign-agree__input" id="agree__services2"
                                                       type="checkbox" name="agree_services"><label
                                class="sign-agree__body" for="agree__services2">
                                <div class="sign-agree__checkbox"><img class="sign-agree__checked"
                                                                       src="{{ asset('images/checkbox.c6ab5b0a.svg') }}" alt="checkbox">
                                </div>
                                <div class="sign-agree__text">Я согласен с <a href="#">условиями пользования
                                        сервисом</a></div>
                            </label></div>
                        <div class="sign-agree"><input class="sign-agree__input" id="agree__data2"
                                                       type="checkbox" name="agree_data"><label
                                class="sign-agree__body" for="agree__data2">
                                <div class="sign-agree__checkbox"><img class="sign-agree__checked"
                                                                       src="{{ asset('images/checkbox.c6ab5b0a.svg') }}" alt="checkbox">
                                </div>
                                <div class="sign-agree__text">Я согласен на Я согласен на <a href="#">обработку моих
                                        персональных данных</a></div>
                            </label></div>
                    </div>
{{--                    <div class="center row sign__captcha">--}}
{{--                        <div class="g-recaptcha" data-sitekey="6LegvdIaAAAAAGTtgXkJFam7nYFe4_q8iY87VPHd"></div>--}}
{{--                    </div>--}}
                    <div class="signin-form__footer">
                        <button class="btn btn--large btn--red">Зарегистрироваться</button>
                        <div class="signin-form__finish">Уже есть аккаунт? <a class="link link--red" href="{{ route('public_login_form') }}">Войти</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
