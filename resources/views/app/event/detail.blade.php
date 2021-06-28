@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="eventmap-article">
        <div class="container">
            <div class="info-container">
                <div class="title"><h2 class="title__text">{{ $event->name }}</h2></div>
                <div class="eventmap-article__header eventmap-article-header row wrap">
                    <div class="eventmap-article__column">
                        <div class="eventmap-info"><img class="eventmap-info__icon"
                                                        src="{{ asset('images/pointer.0b286a1b.svg') }}" alt="pointer"
                                                        aria-hidden="true">
                            <div class="eventmap-info__title">г.Москва CosplayPromoCon</div>
                        </div>
                    </div>
                    <div class="eventmap-article__column">
                        <div class="eventmap-info"><img class="eventmap-info__icon"
                                                        src="{{ asset('images/clock.71798613.svg') }}" alt="pointer"
                                                        aria-hidden="true">
                            <div class="eventmap-info__title">29.08.2021</div>
                        </div>
                    </div>
                </div>
                <div class="eventmap-article__body">
                    <div class="eventmap-article__image ibg">
                        <img src="{{ Storage::url($event->image_src) }}" alt="{{ $event->name }}" aria-hidden="true">
                    </div>{!! $event->body !!}</div>
            </div>
        </div>
    </section>
    @if($event->images->count() > 0)
        <div class="eventmap-slider">
            <div class="container">
                <div class="info-container">
                    <div class="eventmap-slider__slider" id="eventmap-slider">
                        @foreach($event->images as $image)
                            <div class="eventmap-slider__slider-item">
                                <div class="eventmap-slider-slide ibg">
                                    <img src="{{ Storage::url($image->path) }}" alt="event image"
                                         aria-hidden="true"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(!empty(json_decode($event->programm, true)))
        <section class="eventmap-event">
            <div class="container">
                <div class="info-container">
                    <div class="title">
                        <div class="title__text">Программа мероприятия</div>
                    </div>
                    @foreach(json_decode($event->programm, true) as $programm)
                        <div class="eventmap-article__header eventmap-article-header row wrap">
                            <div class="eventmap-article__column">
                                <div class="eventmap-info"><img class="eventmap-info__icon"
                                                                src="{{ asset('images/clock.71798613.svg') }}"
                                                                alt="pointer" aria-hidden="true">
                                    <div class="eventmap-info__title">
                                        {{ \Carbon\Carbon::parse($programm['date'])->format('d.m.Y')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="eventmap-event__date eventmap-event-date__wrapper row wrap">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($programm['extra'] as $k => $extra)
                                @if($i === 0)
                                    <div class="eventmap-event__column">
                                        @endif
                                        <div class="eventmap-event-date">
                                            <div
                                                class="eventmap-event-date__time">{{ \Carbon\Carbon::parse($extra['time'])->format('H:i')}}</div>
                                            <div class="eventmap-event-date__name">{{ $extra['name'] }}</div>
                                        </div>
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                        @if($i === 3 || count($extra) === $i)
                                            @php
                                                $i = 0;
                                            @endphp
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="eventmap-map">
        <div class="container">
            <div class="info-container">
                <div class="title"><h2 class="title__text">Место проведения</h2></div>
                <div class="eventmap-article__header eventmap-article-header row wrap">
                    <div class="eventmap-article__column">
                        <div class="eventmap-info"><img class="eventmap-info__icon"
                                                        src="{{ asset('images/pointer.0b286a1b.svg') }}"
                                                        alt="pointer" aria-hidden="true">
                            <div class="eventmap-info__title">{{ $event->address }}</div>
                        </div>
                    </div>
                    <div class="eventmap-article__column">
                        <div class="eventmap-info">
                            <div class="eventmap-info__title">{{ $event->place_title }}</div>
                        </div>
                    </div>
                </div>
                <div class="eventmap-map__map ibg">
                    <div id="eventmap" data-x="55.76" data-y="37.64"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-contacts">
        <div class="container">
            <div class="align-center column row"><h2 class="pricing-contacts__title">Контакты</h2>
                <ul class="align-center column pricing-contacts-list row">
                    <li class="pricing-contacts-list__item"><a class="pricing-contacts-list__link"
                                                               href="tel:+1-123-456-7890">+1-123-456-7890</a></li>
                    <li class="pricing-contacts-list__item"><a class="pricing-contacts-list__link"
                                                               href="tel:+1-123-456-7890">+1-123-456-7890</a></li>
                    <li class="pricing-contacts-list__item"><a class="pricing-contacts-list__link"
                                                               href="mailto:hello@madeontilda.com">hello@madeontilda.com</a>
                    </li>
                </ul>
                <a class="pricing-contacts-adress" href="#">Манежная площадь, д.1. Москва</a>
                <ul class="center pricing-contacts-social row">
                    <li class="pricing-contacts-social__item"><a class="pricing-contacts-social__link" href="#">
                            <img class="pricing-contacts-social__icon"
                                 src="{{ asset('images/social-twitter.5757a209.svg') }}" alt="twiiter"></a>
                    </li>
                    <li class="pricing-contacts-social__item"><a class="pricing-contacts-social__link" href="#">
                            <img class="pricing-contacts-social__icon"
                                 src="{{ asset('images/scoail-facebook.6c0c36fd.svg') }}"
                                 alt="facebook"></a></li>
                    <li class="pricing-contacts-social__item"><a class="pricing-contacts-social__link" href="#">
                            <img class="pricing-contacts-social__icon"
                                 src="{{ asset('images/social-Instagram.0fe232e6.svg') }}"
                                 alt="Instagram"></a></li>
                </ul>
            </div>
        </div>
    </section>
    @push('script')
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script src="{{ asset('js/eventmap.f7a3ea31.js') }}"></script>
    @endpush
@endsection
