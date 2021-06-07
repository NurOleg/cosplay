@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="events">
        <div class="container">
            <div class="title title--center"><img class="title__icon" src="{{asset('/images/logo.5af45d3e.svg')}}" alt="Лого"
                                                  aria-hidden="true">
                <div class="title__text">Мероприятия</div>
            </div>
            <form class="events-form" action="" method="get">
                <div class="events-form__row row wrap">
                    <div class="events-form__column">
                        <div class="events-form__field select-field">
                            <select class="select-field__select" id="city" name="city">
                                <option value="" selected="" disabled="">Город</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                            @if(request()->filled('city') && $city->id == request()->get('city'))
                                            selected="selected"
                                        @endif
                                    >{{ $city->name }}</option>
                                @endforeach
                            </select></div>
                    </div>
                    <div class="events-form__column">
                        <div class="events-form__field select-field">
                            <select class="select-field__select" id="year"
                                    name="year">
                                <option value="" selected="" disabled="">Год</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}"
                                            @if(request()->filled('year') && $year == request()->get('year'))
                                            selected="selected"
                                        @endif
                                    >{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="events-form__column">
                        <div class="events-form__field select-field"><select class="select-field__select" id="city"
                                                                             name="month">
                                <option value="" selected="" disabled="">Месяц</option>
                                @foreach($months as $monthIndex => $month)
                                    <option value="{{ $monthIndex }}"
                                            @if(request()->filled('month') && $monthIndex == request()->get('month'))
                                            selected="selected"
                                        @endif
                                    >{{ $month }}</option>
                                @endforeach
                            </select></div>
                    </div>
                </div>
                <div class="center events-form__footer row">
                    <button class="btn btn--md btn--red" type="submit">Найти</button>
                </div>
            </form>
            <div class="events-cards">
                <div class="events-cards__row row wrap">
                    @foreach($events as $event)
                        <div class="events-cards__column">
                            <div class="event-cosplay-card">
                                <div class="event-cosplay-card">
                                    <div class="event-cosplay-card__header ibg">
                                        <img class="event-cosplay-card__image"
                                             src="{{ Storage::url($event->image_src) }}"
                                             alt="{{ $event->name }}"
                                             aria-hidden="true">
                                    </div>
                                </div>
                                <div class="event-cosplay-card__body">
                                    <a class="event-cosplay-card__title"
                                       href="{{ route('public_event_detail', ['event' => $event->id]) }}">
                                        {{ $event->name }}
                                    </a>
                                    <ul class="event-cosplay-card-list">
                                        <li class="event-cosplay-card-list__item"><a
                                                class="event-cosplay-card-list__link"
                                                href="{{ route('public_event_detail', ['event' => $event->id]) }}"> <img
                                                    class="event-cosplay-card-list__img"
                                                    src="{{ asset('images/calendar.8bbfb300.svg') }}"
                                                    alt="calendar">
                                                <span
                                                    class="event-cosplay-card-list__content">
                                                    <span>{{ $event->date_interval }}</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="event-cosplay-card-list__item"><a
                                                class="event-cosplay-card-list__link"
                                                href="{{ route('public_event_detail', ['event' => $event->id]) }}"> <img
                                                    class="event-cosplay-card-list__img"
                                                    src="{{ asset('images/pointer.0b286a1b.svg') }}"
                                                    alt="pointer">
                                                <span class="event-cosplay-card-list__content">
                                                    <span>
                                                        {{ $event->place_title }}
                                                    </span>
                                                    <strong>
                                                        {{ $event->city->name }}
                                                    </strong>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
