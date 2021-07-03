@extends('layouts.app')
@section('content')
    <section class="info-header">
        <div class="container">
            <div class="info-container">
                <div class="title title--center info-header__title"><img class="title__icon"
                                                                         src="{{ asset('images/logo.5af45d3e.svg') }}" alt="Лого"
                                                                         aria-hidden="true">
                    <h1 class="title__text">Организация косплей-шоу "под ключ"</h1></div>
                <article class="info-header__about"><p class="info-header__text">Сервис cosplaypromo оказывает
                        услуги организатором мероприятий. Мы можем предоставить и организовать выступление различных
                        косплееров на вашем мероприятии. Мы сами подберем подходящих персонажей, организуем работу, и
                        возьмем на себя все юридические и бухгалтерские сложности. Работа осуществляется по договору, а
                        значит вы можете быть уверенными в качестве оказываемых услуг.</p></article>
            </div>
        </div>
    </section>
    <section class="info-plus">
        <div class="container">
            <div class="info-plus__row row">
                <div class="info-plus__column">
                    <div class="info-plus-item">
                        <div class="info-plus-item__header ibg"><img src="{{ asset('images/plus1.e380fd4b.jpg') }}" alt="plus1"
                                                                     aria-hidden="true"></div>
                        <div class="info-plus-item__body">
                            <div class="info-plus-item__title"><img src="{{ asset('images/fatser.38f512cf.svg') }}" alt="faster"
                                                                    aria-hidden="true"><span>Быстро</span></div>
                            <p class="info-plus-item__text">Минимальный срок организации косплееров и обеспечение их
                                приезда на мероприятие - 24 часа с момента подписания договора</p></div>
                    </div>
                </div>
                <div class="info-plus__column">
                    <div class="info-plus-item">
                        <div class="info-plus-item__header ibg"><img src="{{ asset('images/plus2.7de653cc.jpg') }}" alt="plus1"
                                                                     aria-hidden="true"></div>
                        <div class="info-plus-item__body">
                            <div class="info-plus-item__title"><img src="{{ asset('images/star.d9442114.svg') }}" alt="faster"
                                                                    aria-hidden="true"><span>Надежно</span></div>
                            <p class="info-plus-item__text">Все косплееры приедут на ваше мероприятие точно вовремя,
                                в согласованных костюмах и атрибутики, и будут общаться с аудиторией согласно
                                регламенту мероприятия</p></div>
                    </div>
                </div>
                <div class="info-plus__column">
                    <div class="info-plus-item">
                        <div class="info-plus-item__header ibg"><img src="{{ asset('images/plus3.52c80934.jpg') }}" alt="plus1"
                                                                     aria-hidden="true"></div>
                        <div class="info-plus-item__body">
                            <div class="info-plus-item__title"><img src="{{ asset('images/chat.b0d5bf09.svg') }}" alt="faster"
                                                                    aria-hidden="true"><span>Просто</span></div>
                            <p class="info-plus-item__text">Чтобы воспользоваться услугами CosplayPromo достаточно
                                оставить заявку внизу страницы. Наш менеджер свяжется с Вами в ближайшее время для
                                уточнения деталей</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="info-comment">
        <div class="container">
            <div class="info-article">
                <div class="info-article__info">
                    <div class="info-article__image ibg"><img src="{{ asset('images/men2.9213b60e.jpg') }}" alt="creater photo"></div>
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
    <section class="info-feedback">
        <div class="container">
            <div class="info-feedback__wrapper">
                <form class="info-feedback-form" action="#">
                    <div class="input-field info-feedback-form__field">
                        <div class="input-field__header"><label class="input-field__title" for="email">
                                Email</label></div>
                        <div class="input-field__input-wrapper"><input class="input-field__input" id="email"
                                                                       type="email" name="email"></div>
                    </div>
                    <div class="input-field info-feedback-form__field">
                        <div class="input-field__header"><label class="input-field__title" for="phone">
                                Телефон</label></div>
                        <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                       type="phone" name="phone"></div>
                    </div>
                    <div class="input-field info-feedback-form__textarea">
                        <div class="input-field__header"><span class="input-field__title">Расскажите о своем мероприятии</span>
                        </div>
                        <div class="input-field__input-wrapper"><textarea
                                class="input-field__textarea setting-form__about-textarea" name="about"> </textarea>
                        </div>
                    </div>
                    <div class="row center">
                        <button class="btn btn--red btn--large" type="submit">Отправить</button>
                    </div>
                </form>
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
                            <button class="tab__close-btn"><img class="tab__close" src="{{ asset('images/tab-button.437c1083.svg')}}"
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
                            <button class="tab__close-btn"><img class="tab__close" src="{{ asset('images/tab-button.437c1083.svg')}}"
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
