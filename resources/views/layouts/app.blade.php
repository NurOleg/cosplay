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

    @if(auth()->guard('executant')->user() != null)
        @include('app.menu.executant_menu')
    @elseif(auth()->guard('customer')->user() != null)
        @include('app.menu.customer_menu')
    @endif

    <div class="content">

        @yield('content')

    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__row">
                <div class="footer__item"><a href="#"> <img class="footer__logo"
                                                            src="{{ asset('images/logo.5af45d3e.svg') }}" alt="logo"
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
                            <li class="footer-item__item"><a class="footer-item__link" target="_blank"
                                                             href="{{ asset('docs/cosplay_oferta.pdf') }}">Публичная
                                    оферта</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__item">
                    <div class="footer-item">
                        <div class="footer-item__title">КОНТАКТЫ И ДОКУМЕНТЫ</div>
                        <ul class="footer-item__list">
                            <li class="footer-item__item"><a class="footer-item__link" href="#">ИП Айрапетян Григорий Левонович</a>
                            </li>
                            <li class="footer-item__item"><a class="footer-item__link"
                                                             href="https://docs.google.com/document/d/11KTr474CrDW_CTSA1wnqGgKDvTq-IYuUxneyE1MGfzc/edit?usp=sharing">Договор
                                    оказания услуг (Оферта)</a></li>
                            <li class="footer-item__item"><a class="footer-item__link"
                                                             href="https://docs.google.com/document/d/1H0dkKNY3Ch0RT9DuYxNTxMg7TcipBx4tY3Y4l5V0gvo/edit?usp=sharing">Публичная
                                    оферта о заключении соглашения</a></li>
                            <li class="footer-item__item"><a class="footer-item__link"
                                                             href="https://docs.google.com/document/d/1ImUUbUmtveQKtgQAY35gsRNvCid9qyNs-vuja2itLmY/edit?usp=sharing">Политика
                                    в отношении обработки персональных данных cosplay.promo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('js/script.5a81296d.js') }}"></script>
    <script src="{{ asset('js/customers.21fc3e2b.js') }}"></script>
    @stack('script')
</div>
</body>
</html>
