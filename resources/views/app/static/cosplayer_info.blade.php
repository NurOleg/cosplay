@extends('layouts.app')
@section('content')
    <section class="info-header">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-header__title"><img class="title__icon"
                                                                         src="{{ asset('images/logo.5af45d3e.svg') }}" alt="Лого"
                                                                         aria-hidden="true">
                    <h1 class="title__text">Информация для косплееров</h1></div>
                <article class="info-header__about"><p class="info-header__text">Рады приветствовать вас на сайте
                        cosplay promo! Мы первый агрегатор косплееров в России и СНГ. Благодаря нашему сервису вы легко
                        сможете найти заказчиков на свои услуги, расширите свое профессиональное окружение, и сможете
                        представить свои косплеи в удобном формате. Сервис cosplaypromo является партнером и участником
                        всероссийских и международных фестивалей косплея.</p></article>
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
                                <div class="info-howUse-steps-item__title">Зарегистрируйтесь</div>
                                <div class="info-howUse-steps-item__text">Пройдите простую форму регистрации чтобы
                                    получить доступ в личный кабинет
                                </div>
                            </div>
                        </li>
                        <li class="info-howUse-steps__item">
                            <div class="info-howUse-steps-item">
                                <div class="info-howUse-steps-item__title">Добавьте косплеи и услуги</div>
                                <div class="info-howUse-steps-item__text">Заполните свой профиль. Расскажите о себе
                                    и своих косплеях, А еще добавьте информацию о своих услугах
                                </div>
                            </div>
                        </li>
                        <li class="info-howUse-steps__item">
                            <div class="info-howUse-steps-item">
                                <div class="info-howUse-steps-item__title">Общайтесь!</div>
                                <div class="info-howUse-steps-item__text">Общайтесь с другими косплеерами и
                                    организаторами мероприятий!
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="info-comment">
        <div class="container">
            <div class="info-article">
                <div class="info-article__info">
                    <div class="info-article__image ibg"><img src="{{asset('images/men2.9213b60e.jpg')}}" alt="creater photo"></div>
                    <div class="info-article__name">Григорий Айрапетян</div>
                    <a class="info-article__link" href="https://www.instagram.com/alfakote/">@alfakote</a></div>
                <div class="info-article__body"><h2 class="info-article__title">Зачем мы создали этот ресурс?</h2>
                    <p class="info-article__text">Короткие тексты размещают с одной целью – поприветствовать
                        читателя и немного рассказать о себе. Собственно, именно так в идеале и должна выглядеть
                        основная страница ресурса. Если бы не стремление поисковых систем высоко ранжировать запросы
                        с главной страницы, думаю, 80% сайтов с радостью бы ограничивались скромным приветственным
                        форматом. </p>
                    <p class="info-article__text">Реалии же таковы, что короткие тексты обычно встречаются на
                        трастовых и уважаемых сайтах, которые прекрасно чувствуют себя в выдаче. Наверное, в число
                        «счастливчиков» можно добавить еще ресурсы, привлекающие трафик с рекламы – им тоже вполне
                        комфортно без больших текстов на главных страницах.</p></div>
            </div>
        </div>
    </section>
    <section class="info-pro">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-pro__title"><h2 class="title__text">PRO-аккаунт</h2>
                    <div class="title__subtext">Если вы профессионально занимаетесь косплеем, и хотите зарабатывать
                        на этом деньги, то мы предлагаем использовать вам функционал PRO-аккаунта.
                    </div>
                </div>
                <div class="info-pro-tabs info-pro__tabs">
                    <div class="tab">
                        <div class="tab__header"><strong class="tab__title">Что дает PRO-аккаунт
                                CosplayPromo?</strong>
                            <button class="tab__close-btn"><img class="tab__close" src="{{ asset('images/tab-button.437c1083.svg') }}"
                                                                alt="close tab"></button>
                        </div>
                        <div class="tab__body">
                            <ul class="advantage-list"></ul>
                            <li class="advantage-list__item"> - Неограниченное кол-во переписок и сообщений в чате
                                CosplayPromo
                            </li>
                            <li class="advantage-list__item"> - Вы будете видеть ссылки на социальные сети
                                косплееров
                            </li>
                            <li class="advantage-list__item"> - Вы будете отображаться в приоритетном поиске</li>
                            <li class="advantage-list__item"> - Владельцы PRO всегда будут в приоритете при
                                пригшлашении на фестивали и мероприятия
                            </li>
                            <li class="advantage-list__item"> - Владельцы PRO будут в приоритете для администрации
                                CosplayPromo при выборе косплееров на различные коммерческие мероприятия от команды
                                CosplayPromo
                            </li>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab__header"><strong class="tab__title">Сколько стоит PRO-Аккаунт
                                CosplayPromo?</strong>
                            <button class="tab__close-btn"><img class="tab__close" src="{{ asset('images/tab-button.437c1083.svg') }}"
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
                    <div class="tab">
                        <div class="tab__header"><strong class="tab__title">Как быстро можно окупить месячную
                                подписку про аккаунта</strong>
                            <button class="tab__close-btn"><img class="tab__close" src="{{ asset('images/tab-button.437c1083.svg') }}"
                                                                alt="close tab"></button>
                        </div>
                        <div class="tab__body">
                            <ul class="advantage-list">
                                <li class="advantage-list__item">Средняя цена 1 часа работы косплеера в образе на
                                    промо акциях - 500-1000 руб. То есть подписка окупается за 1 час работы
                                    косплеера.
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
