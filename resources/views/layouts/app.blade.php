<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.aa07570a.css') }}">
    <title>Главная</title>
</head>
<body>
<div class="wrapper">
    <header class="header" id="header-menu">
        <div class="header__overlay" data-close="true"></div>
        <div class="header-menu-mobile">
            <div class="header-menu-mobile">
                <button class="header-menu-mobile__btn menu-open-btn"><span> </span><span> </span><span> </span>
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
                <li class="header-menu__item"><a class="header-menu__link" href="#"><span
                            class="header-menu__icon"> <img src="{{ asset('images/news.0daaa46d.svg') }}" alt="News"></span><span
                            class="header-menu__text">Новости</span></a></li>
                <li class="header-menu__item"><a class="header-menu__link" href="#"><span
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
            </ul>
        </div>
    </header>

    <div class="content">

        @yield('content')

    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__row">
                <div class="footer__item"><a href="#"> <img class="footer__logo" src="{{ asset('images/logo.5af45d3e.svg') }}" alt="logo"
                                                            aria-hidden="true"></a>
                    <ul class="footer-social">
                        <li class="footer-social__item"><a class="footer-social__link" href="#"><img
                                    src="{{ asset('images/social-youtube.4436d954.svg') }}" alt="youtube"></a></li>
                        <li class="footer-social__item"><a class="footer-social__link" href="#"><img
                                    src="{{ asset('images/social-twitter.5757a209.svg') }}" alt="twitter"></a></li>
                        <li class="footer-social__item"><a class="footer-social__link" href="#"><img
                                    src="{{ asset('images/scoail-facebook.6c0c36fd.svg') }}" alt="facebook"></a></li>
                        <li class="footer-social__item"><a class="footer-social__link" href="#"><img
                                    src="{{ asset('images/social-vk.e1dadef2.svg') }}" alt="vk"></a></li>
                        <li class="footer-social__item"><a class="footer-social__link" href="#"><img
                                    src="{{ asset('images/social-instagram.0fe232e6.svg') }}" alt="instagram"></a></li>
                    </ul>
                    <div class="footer__copirate">2021 Cosplay Promo</div>
                </div>
                <div class="footer__item">
                    <div class="footer-item">
                        <div class="footer-item__title">Косплееры</div>
                        <ul class="footer-item__list">
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Лучшие косплееры</a>
                            </li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Ближайшие
                                    мероприятия</a></li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Блог</a></li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Регистрация
                                    участника</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__item">
                    <div class="footer-item">
                        <div class="footer-item__title">ПОМОЩЬ</div>
                        <ul class="footer-item__list">
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Информация о сервиск</a>
                            </li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Политика
                                    конфиденциальности</a></li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Условия
                                    использования</a></li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">Служба поддержки</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__item">
                    <div class="footer-item">
                        <div class="footer-item__title">КОНТАКТЫ И РЕКВИЗИТЫ</div>
                        <ul class="footer-item__list">
                            <li class="footer-item__item"><a class="footer-item__link" href="#">ООО “Человек-паук”</a>
                            </li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">БИНН: 79 99 99 9 9
                                    99</a></li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">+7 045 544 33 22Блог</a>
                            </li>
                            <li class="footer-item__item"><a class="footer-item__link" href="#">info@cosplay.promo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('js/script.5a81296d.js') }}"></script>
</div>
</body>
</html>
