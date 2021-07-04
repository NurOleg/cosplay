@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="customers">
        <div class="container">
            <div class="hero-form__title title title--center">
                <img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                     alt="Лого" aria-hidden="true">
                <h1 class="title__text">Мои косюмы/образы</h1></div>
            <div class="center customers__header row">
                <a class="btn btn--red customers__add-customers"
                   href="{{ route('personal_garb_create') }}">Добавить костюм</a></div>
            <div class="customers__customers row wrap">
                @if(!$garbs->isEmpty())
                    @foreach($garbs as $garb)
                        <div class="customer-card customers__column"
                             data-id-customer="{{ $loop->iteration }}">
                            <div class="customer-card__header ibg">
                                <img class="customer-card__img"
                                     src="{{ isset($garb->images[0]) ? Storage::url($garb->images[0]->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                                                        alt="customer">
                                <div class="customer-card__events customer-card-events"><img
                                        class="customer-card-events__icon"
                                        src="{{ asset('images/dots.ba288d40.svg') }}"
                                        alt="menu">
                                    <div class="customer-card-events__overflow"></div>
                                    <div class="customer-card-events__list">
                                        <div class="customer-card-events__item">
                                            <a
                                                class="customer-card-events__event"
                                                href="{{ route('personal_garb_detail', ['garb' => $garb->id]) }}">Редактировать</a>
                                        </div>
                                        <div class="customer-card-events__item">
                                            <a href="{{ route('personal_garb_delete', ['garb' => $garb->id]) }}" class="customer-card-events__event customer-delete"
                                                    data-id-customer="{{ $loop->iteration }}">
                                                Удалить
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-card__body">
                                <div class="customer-card__title">{{ $garb->hero->name_ru }}</div>
                                <div class="customer-card__subtitle">{{ $garb->concretization }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
