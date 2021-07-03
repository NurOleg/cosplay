@extends('layouts.app')
@section('content')
    <section class="info-header">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-header__title"><img class="title__icon"
                                                                         src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                         alt="Лого"
                                                                         aria-hidden="true">
                    <h1 class="title__text">Информация для заказчиков</h1></div>
                <article class="info-header__about"><p class="info-header__text">Рады приветствовать вас на сайте
                        cosplay promo! Мы первый агрегатор косплееров в России и СНГ. Благодаря нашему сервису вы легко
                        сможете найти нужных персонажей для участия в мероприятиях и промоакциях. Многие косплееры
                        оказывают услуги информационного сопровождения через свои соц.сети, а еще занимаются
                        изготовлением специализированных предметов и предоставляют свои костюмы на прокат.</p></article>
            </div>
        </div>
    </section>
    <section class="info-howUse">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-howUse__title"><h2 class="title__text">Как пользоваться
                        сервисом?</h2></div>
                <div class="info-howUse-steps">
                    <ul class="info-howUse-steps__list">
                        <li class="info-howUse-steps__item">
                            <div class="info-howUse-steps-item">
                                <div class="info-howUse-steps-item__title">Выберите косплеера</div>
                                <div class="info-howUse-steps-item__text">Удобный поиск по 8 ключевым критериям
                                    поможет быстро найти подходящих косплееров
                                </div>
                            </div>
                        </li>
                        <li class="info-howUse-steps__item">
                            <div class="info-howUse-steps-item">
                                <div class="info-howUse-steps-item__title">Задайте поиск по параметрам</div>
                                <div class="info-howUse-steps-item__text">Сервис автоматически генерирует выдачу и
                                    вы сможете посмотреть информацию о косплеере и его костюмах
                                </div>
                            </div>
                        </li>
                        <li class="info-howUse-steps__item">
                            <div class="info-howUse-steps-item">
                                <div class="info-howUse-steps-item__title">Напишите ему</div>
                                <div class="info-howUse-steps-item__text">Абсолютно любой пользователь может
                                    написать косплееру в чат
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="info-pro">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-pro__title"><h2 class="title__text">PRO-аккаунт</h2>
                    <div class="title__subtext">Если вы ищите косплееров и персонажей на постоянной основе, то мы
                        предлагаем использовать вам функционал PRO-аккаунта.
                    </div>
                </div>
                <div class="info-pro-tabs info-pro__tabs">
                    <div class="tab">
                        <div class="tab__header"><strong class="tab__title">Что дает PRO-аккаунт
                                CosplayPromo?</strong>
                            <button class="tab__close-btn"><img class="tab__close"
                                                                src="{{ asset('images/tab-button.437c1083.svg') }}"
                                                                alt="close tab"></button>
                        </div>
                        <div class="tab__body">
                            <ul class="advantage-list">
                                <li class="advantage-list__item">- Неограниченное кол-во переписок и сообщений в
                                    чате CosplayPromo
                                </li>
                                <li class="advantage-list__item">- Вы будете видеть ссылки на социальные сети
                                    косплееров
                                </li>
                                <li class="advantage-list__item">- У вас появится карточка организации где вы
                                    сможете разместить информацию о себе
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab__header"><strong class="tab__title">Сколько стоит PRO-Аккаунт
                                CosplayPromo?</strong>
                            <button class="tab__close-btn"><img class="tab__close"
                                                                src="{{ asset('images/tab-button.437c1083.svg') }}"
                                                                alt="close tab"></button>
                        </div>
                        <div class="tab__body">
                            <ul class="advantage-list">
                                <li class="advantage-list__item">490 руб. / месяц - при оплате помесячно</li>
                                <li class="advantage-list__item">390 руб. / месяц - при оплате за 6 месяцев = 2 340
                                    руб.
                                </li>
                                <li class="advantage-list__item">290 руб. / месяц - при оплате за 12 месяцев = 3 480
                                    руб.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row center"><a class="info-pro__buy btn btn--red btn--large" href="#">Перейти к
                        оплате</a></div>
            </div>
        </div>
    </section>
@endsection
