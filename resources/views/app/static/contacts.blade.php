@extends('layouts.app')
@section('content')
    <section class="feedback-form">
        <div class="container">
            <div class="title title--center hero-form__title"><img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                   alt="Лого" aria-hidden="true">
                <h2 class="title__text">Контакты</h2></div>
            <form class="feedback-form" action="#">
                <div class="feedback-form__row row">
                    <div class="feedback-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="name"> Ваше
                                    имя</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="name"
                                                                           type="text" name="name"></div>
                        </div>
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="email">
                                    Почта</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="email"
                                                                           type="mail" name="email"></div>
                        </div>
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="phone">
                                    Телефон</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                           type="phone" name="phone"></div>
                        </div>
                    </div>
                    <div class="feedback-form__column">
                        <div class="input-field feedback-form__textarea">
                            <div class="input-field__header"><span class="input-field__title">Ваше сообщение</span>
                            </div>
                            <div class="input-field__input-wrapper"><textarea
                                    class="input-field__textarea setting-form__about-textarea"
                                    name="about"> </textarea></div>
                        </div>
                    </div>
                </div>
                <div class="row center">
                    <button class="btn btn--red feedback-form__submit" type="submit">Связаться</button>
                </div>
            </form>
        </div>
    </section>
    <div class="banking-details">
        <div class="container">
            <div class="banking-details__row row wrap">
                <div class="banking-details__column">
                    <div class="banking-details-about">
                        <div class="banking-details-about__title">COSPLAY-PROMO портал по поиску косплееров и
                            косплеймейкеров
                        </div>
                        <p class="banking-details-about__text">По вопросам сотрудничества: <a
                                class="banking-details-about__link" href="mailto:соор@соsplay.promo">соор@соsplay.promo </a>
                        </p>
                        <p class="banking-details-about__text">По вопросам работы сервиса: <a
                                class="banking-details-about__link" href="mailto:admin@соsplay.рrоmо">admin@соsplay.рrоmо </a>
                        </p>
                        <p class="banking-details-about__text">По всем остальным вопросам: <a
                                class="banking-details-about__link" href="mailto:help@соsplay.promo">help@соsplay.promo </a>
                            (или воспользуйтесь формой обратной связи)</p></div>
                </div>
                <div class="banking-details__column">
                    <div class="banking-details-about">
                        <div class="banking-details-about__title">наши реквизиты:</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
