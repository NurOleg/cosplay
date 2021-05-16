@extends('layouts.app')
@section('content')
    <section class="signin-form">
        <div class="container">
            <div class="signin-container">
                <div class="hero-form__title title title--center"><img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                       alt="Лого" aria-hidden="true">
                    <h2 class="title__text">Вход</h2></div>
                <form action="{{ route('public_login') }}" method="post">
                    @csrf
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="phone"> Email
                                    или номер телефона</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                           type="text" name="email_or_phone">
                            </div>
                        </div>
                    </div>
                    <div class="signin-form__field">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="password"
                                                                           type="password" name="password"></div>
                            <a class="signin-form__forget" href="#">Забыли пароль?</a></div>
                    </div>
                    <div class="signin-form__footer">
                        <button class="btn btn--large btn--red">Войти</button>
                        <div class="signin-form__finish">Впервые у нас ? <a class="link link--red" href="{{ route('public_register_form') }}">Зарегистрироваться</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
