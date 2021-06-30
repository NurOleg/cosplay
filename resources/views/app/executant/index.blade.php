@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')

    <section class="hero-form">
        <div class="container">
            <div class="hero-form__title title title--center"><img class="title__icon"
                                                                   src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                   alt="Лого" aria-hidden="true">
                <h2 class="title__text">ПЕРВАЯ БАЗА КОСПЛЕЕРОВ И КРАФТЕРОВ С САМЫМ УДОБНЫМ ПОИСКОМ</h2></div>
            @include('app.search_form', [$cities, $thematics])

            <section class="search-result">
                <div class="container">
                    <h2 class="title">
                        <div class="title__text">Результаты поиска</div>
                    </h2>

                    @if($executants->count() == 0)
                        <p>К сожеланию, по Вашим параметрам нет подоходящих косплееров</p>
                    @else

                        <div class="mCustomScrollbar search-result__row" id="search-result">
                            @foreach($executants as $executant)
                                <div class="search-result__column">
                                    <div class="cosplay-card-search search-result__item">
                                        <div class="cosplay-card-search__header">
                                            <div class="cosplay-card-search__status cosplay-card-search__status--pro">
                                                PRO
                                            </div>
                                            <a href="{{ route('executant_detail', ['executant' => $executant->id]) }}@if(!empty($tab))#{{$tab}}@endif">
                                                <img class="cosplay-card-search__img"
                                                     src="{{ isset($executant->image->path) ? Storage::url($executant->image->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                                     alt="cosplay photo">
                                            </a>
                                        </div>
                                        <div class="cosplay-card-search__body">
                                            <a class="cosplay-card-search__name"
                                               href="{{ route('executant_detail', ['executant' => $executant->id]) }}@if(!empty($tab))#{{$tab}}@endif">{{ $executant->fullname }}</a>
                                            <div class="cosplay-card-search__person">Косплеер</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </section>
@endsection
