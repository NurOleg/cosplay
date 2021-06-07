@extends('layouts.app')
@section('content')
    <section class="hero-form section-line">
        <div class="container">
            <div class="hero-form__title title title--center"><img class="title__icon"
                                                                   src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                   alt="Лого" aria-hidden="true">
                <h2 class="title__text">ПЕРВАЯ БАЗА КОСПЛЕЕРОВ И КРАФТЕРОВ С САМЫМ УДОБНЫМ ПОИСКОМ</h2></div>

            @include('app.search_form')

        </div>
    </section>
    <section class="pro-account section-line">
        <div class="container">
            <h2 class="pro-account__title title title--center">
                <div class="title__text">ПРО-АККАУНТЫ</div>
            </h2>
            <div class="pro-account__slider" id="pro-accounts-slider">
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
                <div class="pro-account__slide">
                    <div class="pro-account__item">
                        <div class="pro-cosplay-card">
                            <div class="pro-cosplay-card__header"><a href="#"><img
                                        class="pro-cosplay-card__header-img"
                                        src="{{ asset('images/main-cosplay.4c35c863.jpg') }}"
                                        alt="Caspley img" aria-hidden="true"></a></div>
                            <div class="pro-cosplay-card__body"><a class="pro-cosplay-card__social"
                                                                   href="https://www.instagram.com/p/CMl0WgZsvTn/"
                                                                   target="__blank">@name_cos </a><h5
                                    class="pro-cosplay-card__title">Анна Иванова</h5>
                                <p class="pro-cosplay-card__text">Победитель в номинации лучший киберпанк на
                                    игромире 2020</p><a class="btn btn--red pro-cosplay-card__link" href="#">
                                    Смотреть профиль</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-work section-line">
        <div class="container">
            <h2 class="how-work__title title title--center">
                <div class="title__text">КАК РАБОТАЕТ КОСПЛЕЙ-ПРОМО</div>
                <div class="title__subtext">Косплей промо - это уникальная площадка, которая обьединяет в себе всех
                    активных косплееров. Мы помогаем находить единомышленников, способствуем развитию культуры
                    косплея, и организовываем эффективную коммуникацию.
                </div>
            </h2>
            <div class="how-work__row">
                <div class="how-work__item">
                    <div class="how-item">
                        <div class="how-item__title">Вы косплеер?</div>
                        <div class="how-item__text">Текст описание Текст описание Текст описание Текст описание
                        </div>
                        <a class="how-item__link" href="#">Подробнее &rarr;</a></div>
                </div>
                <div class="how-work__item">
                    <div class="how-item">
                        <div class="how-item__title">Вы крафтер,швея, гример, вигмейкер?</div>
                        <div class="how-item__text">Текст описание Текст описание Текст описание Текст описание
                        </div>
                        <a class="how-item__link" href="#">Подробнее &rarr;</a></div>
                </div>
                <div class="how-work__item">
                    <div class="how-item">
                        <div class="how-item__title">Вы заказчик?</div>
                        <div class="how-item__text">Текст описание Текст описание Текст описание Текст описание
                        </div>
                        <a class="how-item__link" href="#">Подробнее &rarr;</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-line timeline">
        <div class="container">
            <div class="timeline__title title title--center">
                <div class="title__text">ТАЙМЛАЙН МЕРОПРИЯТИЙ</div>
            </div>
            <div class="timeline__row-wrapper">
                <div class="timeline__row">
                    @foreach($events as $event)
                        <div class="timeline__item">
                            <div class="timeline-item">
                                <div class="timeline-item__date">{{ $event->date_interval }}</div>
                                <div class="timeline-item__header">
                                    <img class="timeline-item__img"
                                         src="{{ Storage::url($event->image_src) }}"
                                         alt="timeline image" aria-hidden="true">
                                </div>
                                <div class="timeline-item__body">
                                    <div class="timeline-item__title">{{ $event->name }}</div>
                                    <div class="timeline-item__text">
                                        {{ $event->preview_body }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="timeline__footer">
                <a class="btn btn--red timeline__btn" href="{{ route('public_event_index') }}">Смореть все
                    мероприятия</a>
            </div>
        </div>
    </section>
    <section class="articles">
        <div class="container">
            <h2 class="articles__title title">
                <div class="title__text">СТАТЬИ</div>
            </h2>
            <div class="articles__row">
                <div class="articles__item">
                    <div class="articles-item">
                        <div class="articles-item__body"><a class="articles-item__title" href="#"> Как начинающему
                                косплееру попасть на крупный фестиваль</a><a class="articles-item__text" href="#">Текст
                                описание Текст описание Текст описание</a></div>
                        <div class="articles-item__bg"><img class="articles-item__img" src="/articles.26004d81.jpg"
                                                            alt="Картинка статьи" aria-hidden="true"></div>
                    </div>
                </div>
                <div class="articles__item">
                    <div class="articles-item">
                        <div class="articles-item__body"><a class="articles-item__title" href="#"> Как начинающему
                                косплееру попасть на крупный фестиваль</a><a class="articles-item__text" href="#">Текст
                                описание Текст описание Текст описание</a></div>
                        <div class="articles-item__bg"><img class="articles-item__img" src="/articles.26004d81.jpg"
                                                            alt="Картинка статьи" aria-hidden="true"></div>
                    </div>
                </div>
                <div class="articles__item">
                    <div class="articles-item">
                        <div class="articles-item__body"><a class="articles-item__title" href="#"> Как начинающему
                                косплееру попасть на крупный фестиваль</a><a class="articles-item__text" href="#">Текст
                                описание Текст описание Текст описание</a></div>
                        <div class="articles-item__bg"><img class="articles-item__img" src="/articles.26004d81.jpg"
                                                            alt="Картинка статьи" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
            <div class="articles__footer"><a class="articles__link btn btn--red" href="#"> Читать все статьи</a>
            </div>
        </div>
    </section>
@endsection
