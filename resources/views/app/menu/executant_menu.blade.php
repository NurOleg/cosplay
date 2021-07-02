<header class="header exe" id="header-menu">
    <div class="header__overlay" data-close="true"></div>
    <div class="header-menu-mobile">
        <div class="header-menu-mobile">
            <button class="header-menu-mobile__btn menu-open-btn" id='menu-open-btn'><span> </span><span> </span><span> </span>
            </button>
        </div>
    </div>
    <div class="header__container">
        <div class="header-header"><a href="/"> <img src="{{ asset('images/logo.5af45d3e.svg') }}" alt="Logo"><span
                    class="header-header__text">COSPLAY PROMO</span></a></div>
        <ul class="header-menu">
            <li class="header-menu__item header-menu__item--close">
                <div class="header-menu__link" href="#" data-close="true"><span class="header-menu__icon"> <img
                            src="{{ asset('images/close.40ea361d.svg') }}" alt="Close menu"></span><span class="header-menu__text">Свернуть меню </span>
                </div>
            </li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('public_news_index') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/news.0daaa46d.svg') }}" alt="News"></span><span
                        class="header-menu__text">Новости</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('public_event_index') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/timetable.2788910c.svg') }}" alt="timetable"></span><span
                        class="header-menu__text">Мероприятия </span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="#"><span
                        class="header-menu__icon"> <img src="{{ asset('images/catalog.f2920177.svg') }}" alt="Catalog"></span><span
                        class="header-menu__text">Каталог</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="#"><span
                        class="header-menu__icon"> <img src="{{ asset('images/festival.d724a2e1.svg') }}" alt="festival"></span><span
                        class="header-menu__text">Для фестивалей</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="#"><span
                        class="header-menu__icon"> <img src="{{ asset('images/contacts.ecfb84b5.svg') }}" alt="contactsu"></span><span
                        class="header-menu__text">Контакты</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('personal_garb_index') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/customers2.svg') }}" alt="contactsu"></span><span
                        class="header-menu__text">Мои костюмы</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('personal_settings') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/settings2.svg') }}" alt="contactsu"></span><span
                        class="header-menu__text">Настройки</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('chat_index') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/settings.svg') }}" alt="contactsu"></span><span
                        class="header-menu__text">Чаты</span></a></li>
            <li class="header-menu__item"><a class="header-menu__link" href="{{ route('logout') }}"><span
                        class="header-menu__icon"> <img src="{{ asset('images/logout.svg') }}" alt="contactsu"></span><span
                        class="header-menu__text">Выйти</span></a></li>
        </ul>
    </div>
</header>
