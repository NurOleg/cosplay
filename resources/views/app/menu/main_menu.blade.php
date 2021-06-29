<header class="c-header">
    <div class="container">
        <buttton class="c-header-btn" id="menu-open-btn"><span> </span><span> </span><span> </span></buttton>
        <ul class="c-header-list" id="header-menu">
            <li class="c-header-list__item">
                <a class="c-header-list__link" href="{{ route('executant_index') }}"> Поиск</a>
            </li>
            <li class="c-header-list__item">
                <a class="c-header-list__link" href="{{ route('public_login_form') }}"> Aвторизация/Регистрация</a>
            </li>
            <li class="c-header-list__item">
                <a class="c-header-list__link" href="{{ route('public_news_index') }}"> Новости</a>
            </li>
            <li class="c-header-list__item">
                <a class="c-header-list__link" href="{{ route('public_event_index') }}"> Мероприятия</a>
            </li>
            <li class="c-header-list__item">
                <a class="c-header-list__link" href="#"> Контакты</a>
            </li>
            <li class="c-header-list__item">
                <div class="c-header-list__link" href="#"> Кто мы?</div>
                <div class="c-header-list-dropdawn"><a class="c-header-list-dropdawn__item" href="#">Фестивалям</a>
                    <a
                        class="c-header-list-dropdawn__item" href="#">О проекте</a><a
                        class="c-header-list-dropdawn__item" href="#">Исполнителям</a><a
                        class="c-header-list-dropdawn__item" href="#">Заказчикам</a></div>
            </li>
        </ul>
    </div>
</header>
