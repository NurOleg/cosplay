@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="events">
        <div class="container">
            <div class="title title--center"><img class="title__icon" src="/logo.5af45d3e.svg" alt="Лого"
                                                  aria-hidden="true">
                <div class="title__text">Мероприятия</div>
            </div>
            <form class="events-form" action="#">
                <div class="events-form__row row wrap">
                    <div class="events-form__column">
                        <div class="events-form__field select-field">
                            <select class="select-field__select" id="city" name="city">
                                <option value="" selected="" disabled="">Город</option>
                                <option value="Sochi">Сочи</option>
                                <option value="var2">Вар2</option>
                                <option value="var3">Вар3</option>
                            </select></div>
                    </div>
                    <div class="events-form__column">
                        <div class="events-form__field select-field">
                            <select class="select-field__select" id="city"
                                    name="city">
                                <option value="" selected="" disabled="">Год</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                            </select></div>
                    </div>
                    <div class="events-form__column">
                        <div class="events-form__field select-field"><select class="select-field__select" id="city"
                                                                             name="city">
                                <option value="" selected="" disabled="">Месяц</option>
                                <option value="Sochi">Декабрь</option>
                                <option value="January">Январь</option>
                                <option value="February">Февраль</option>
                                <option value="March">Март</option>
                                <option value="April">Апрель</option>
                                <option value="May">Май</option>
                                <option value="June">Июнь</option>
                                <option value="July">Июль</option>
                                <option value="August">Август</option>
                                <option value="September">Сентябрь</option>
                                <option value="October">Октябрь</option>
                                <option value="November">Ноябрь</option>
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
                                    <a class="event-cosplay-card__title" href="{{ route('public_event_detail', ['event' => $event->id]) }}">
                                        {{ $event->name }}
                                    </a>
                                    <ul class="event-cosplay-card-list">
                                        <li class="event-cosplay-card-list__item"><a
                                                class="event-cosplay-card-list__link"
                                                href="{{ route('public_event_detail', ['event' => $event->id]) }}"> <img
                                                    class="event-cosplay-card-list__img" src="{{ asset('images/calendar.8bbfb300.svg') }}"
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
                                                    class="event-cosplay-card-list__img" src="{{ asset('images/pointer.0b286a1b.svg') }}"
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
