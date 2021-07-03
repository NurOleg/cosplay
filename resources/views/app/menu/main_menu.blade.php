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
                <a class="c-header-list__link" href="{{ route('contacts') }}"> Контакты</a>
            </li>
            <li class="c-header-list__item">
                <div class="c-header-list__link" href="{{ route('about') }}"> Кто мы?</div>
                <div class="c-header-list-dropdawn">
                    <a class="c-header-list-dropdawn__item" href="{{ route('organisation_info') }}">Фестивалям</a>
                    <a
                        class="c-header-list-dropdawn__item" href="{{ route('about') }}">О проекте</a><a
                        class="c-header-list-dropdawn__item" href="{{ route('cosplayer_info') }}">Исполнителям</a><a
                        class="c-header-list-dropdawn__item" href="{{ route('customers_info') }}">Заказчикам</a></div>
            </li>
        </ul>
    </div>
</header>
