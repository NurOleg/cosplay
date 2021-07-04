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
                        <div class="cosplayer-about-item__img ibg"><img
                                src="{{ isset($executant->image->path) ? Storage::url($executant->image->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                alt="cosplayer.img"></div>
                        <div class="cosplayer-about-item__city cosplayer-city">{{ $executant->city->name }}</div>
                        <div class="cosplayer-about-item__name">{{ $executant->fullname }}</div>
                        <div class="cosplayer-about-item__person">Косплеер</div>
                    </div>
                    <div class="cosplayer-about-item__column">
                        <div class="cosplayer-about-item__about">
                            <div class="cosplayer-about-item__title">Об исполнителе</div>
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
                        class="
                        @if($garb->is_active == true)
                            active
                        @endif
                        {{--                        active --}}
                            cosplayer-shape-tab cosplayer-shape-tabs__tab"
                        href="#{{ $garb->code }}"><span
                            class="cosplayer-shape-tab__title">{{ $garb->hero->name_ru }}</span><span
                            class="cosplayer-shape-tab__subtitle">{{ $garb->concretization }}</span></a>
                @endforeach
            </div>
            @foreach($executant->garbs as $garb)
                <div class="cosplayer-shape-item
                @if($garb->is_active == true)
                    open
                @endif
                    " id="{{ $garb->code }}">
                    <div class="cosplayer-shape__row">
                        <div class="cosplayer-shape__column">
                            <div class="cosplayer-shape__slider cosplayer-shape-slider__wrapper">
                                <div class="cosplayer-shape-slider">
                                    @foreach($garb->images as $image)
                                        <div class="cosplayer-shape-slider__item ibg">
                                            <img src="{{Storage::url($image->path)}}"
                                                 alt="cosplay img"
                                                 aria-hidden="true">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="cosplayer-shape__column">
                            <div class="cosplayer-shape__about cosplayer-shape-about">
                                <div class="cosplayer-shape-about__title">Тематика: {{ $garb->thematic->name_ru }}</div>
                                <div class="cosplayer-shape-about__subtitle">
                                    Вселенная: {{ $garb->fandom->name_ru }}</div>
                                <div class="cosplayer-shape-about__body">
                                    <div class="cosplayer-shape-about__cosplay-title">О косплее
                                        "{{ $garb->hero->name_ru }}"
                                    </div>
                                    <div class="cosplayer-shape-about__text">
                                        <p>{{ $garb->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="cosplayer-services section">
        <div class="container">
            <div class="title"><h2 class="title__text">Услуги</h2></div>
            @foreach($executant->garbs as $garb)
                <div class="cosplayer-services__row open" data-name="#{{ $garb->code }}">
                    @foreach($garb->services as $service)
                        <div class="cosplayer-services__column">
                            <div class="cosplayer-services-item"><img class="cosplayer-services-item__icon"
                                                                      src="{{ asset('images/check.73f159ab.svg') }}"
                                                                      alt="check icon"
                                                                      aria-hidden="true"><span
                                    class="cosplayer-services-item__title">{{ $service->name }}</span></div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    @if(auth()->guard('customer')->check())
        <section class="cosplayer-feedback section">
            <div class="container">
                <div class="title"><h2 class="title__text">Связаться с {{ $executant->fullname }}</h2></div>
                <form class="cosplayer-feedback-form" action="{{ route('create_chat') }}" method="post">
                    @csrf
                    <input type="hidden" name="executant_id" value="{{ $executant->id }}">
                    <div class="cosplayer-feedback-form__header">
                        <input class="cosplayer-feedback-form__input" type="text"
                               name="message"
                               placeholder="Напишите свой запрос" minlength="1" pattern="[a-zA-Z0-9]+" required>
                        <span
                            class="cosplayer-feedback-form__hint">Доступно только зарегистрированным пользователям</span>
                    </div>
                    <div class="cosplayer-feedback-form__footer">
                        <button class="btn btn--red cosplayer-feedback-form__submit" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </section>
    @endif
    @push('script')
        <script src="{{ asset('js/cosplayer.js') }}"></script>
    @endpush
@endsection
