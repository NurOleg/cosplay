@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')

    <section class="cosplayer-about section">
        <div class="container">
            <div class="cosplayer-about-item">
                <div class="cosplayer-about-item__row">
                    <div class="cosplayer-about-item__column">
                        <div class="cosplayer-about-item__img ibg"><img src="{{ isset($executant->image->path) ? Storage::url($executant->image->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                                                        alt="cosplayer.img"></div>
                        <div class="cosplayer-about-item__city cosplayer-city">Москва</div>
                        <div class="cosplayer-about-item__name">{{ $executant->fullname }}</div>
                        <div class="cosplayer-about-item__person">Косплеер</div>
                    </div>
                    <div class="cosplayer-about-item__column">
                        <div class="cosplayer-about-item__about">
                            <div class="cosplayer-about-item__title">О косплеере</div>
                            <div class="cosplayer-about-item__text">
                                {{ $executant->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cosplayer-shape section">
        <div class="container">
            <div class="title"><h2 class="title__text">Образы</h2></div>
            <div class="cosplayer-shape__tabs cosplayer-shape-tabs">
                @foreach($executant->garbs as $garb)
                <a
                    class="active cosplayer-shape-tab cosplayer-shape-tabs__tab" href="#{{ $garb->concretization_eng }}"><span
                        class="cosplayer-shape-tab__title">{{ $garb->hero->name_ru }}</span><span
                        class="cosplayer-shape-tab__subtitle">{{ $garb->concretization }}</span></a>
                    @endforeach
            </div>
            <div class="cosplayer-shape-item open" id="spider-man">
                <div class="cosplayer-shape__row">
                    <div class="cosplayer-shape__column">
                        <div class="cosplayer-shape__slider cosplayer-shape-slider__wrapper">
                            <div class="cosplayer-shape-slider">
                                <div class="cosplayer-shape-slider__item ibg"><img src="/spider-men.0dae2722.jpg"
                                                                                   alt="cosplay img" aria-hidden="true">
                                </div>
                                <div class="cosplayer-shape-slider__item ibg"><img src="/spider-men.0dae2722.jpg"
                                                                                   alt="cosplay img" aria-hidden="true">
                                </div>
                                <div class="cosplayer-shape-slider__item ibg"><img src="/spider-men.0dae2722.jpg"
                                                                                   alt="cosplay img" aria-hidden="true">
                                </div>
                                <div class="cosplayer-shape-slider__item ibg"><img src="/spider-men.0dae2722.jpg"
                                                                                   alt="cosplay img" aria-hidden="true">
                                </div>
                                <div class="cosplayer-shape-slider__item ibg"><img src="/spider-men.0dae2722.jpg"
                                                                                   alt="cosplay img" aria-hidden="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cosplayer-shape__column">
                        <div class="cosplayer-shape__about cosplayer-shape-about">
                            <div class="cosplayer-shape-about__title">Тематика: супергерои</div>
                            <div class="cosplayer-shape-about__subtitle">Вселенная: Марвел</div>
                            <div class="cosplayer-shape-about__body">
                                <div class="cosplayer-shape-about__cosplay-title">О косплее "Человек-Паук"</div>
                                <div class="cosplayer-shape-about__text"><p>Короткие тексты размещают с одной целью –
                                        поприветствовать читателя и немного рассказать о себе. Собственно, именно так в
                                        идеале и должна выглядеть основная страница ресурса. Если бы не стремление
                                        поисковых систем высоко ранжировать запросы с главной страницы, думаю, 80%
                                        сайтов с радостью бы ограничивались скромным приветственным форматом.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cosplayer-services section">
        <div class="container">
            <div class="title"><h2 class="title__text">Услуги</h2></div>
            <div class="cosplayer-services__row">
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title">Участие в промоакциях</span></div>
                </div>
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title">Участие в совместных проектах/фотосессиях</span>
                    </div>
                </div>
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title"> Аренда костюма</span></div>
                </div>
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title">Продажа костюма</span></div>
                </div>
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title">Участие в съёмках фильмов/сериалов</span></div>
                </div>
                <div class="cosplayer-services__column">
                    <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                              src="/check.73f159ab.svg" alt="check icon"
                                                              aria-hidden="true"><span
                            class="cosplayer-services-item__title">Участие в рекламных проектах</span></div>
                </div>
            </div>
        </div>
    </section>
    <section class="cosplayer-feedback section">
        <div class="container">
            <div class="title"><h2 class="title__text">Связаться с Иваном Ивановым</h2></div>
            <form class="cosplayer-feedback-form" action="#">
                <div class="cosplayer-feedback-form__header"><input class="cosplayer-feedback-form__input" type="text"
                                                                    placeholder="Напишите свой запрос"><span
                        class="cosplayer-feedback-form__hint">Доступно только зарегистрированным пользователям</span>
                </div>
                <div class="cosplayer-feedback-form__footer">
                    <button class="btn btn--red cosplayer-feedback-form__submit" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </section>

@endsection
