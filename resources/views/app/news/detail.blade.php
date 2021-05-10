@extends('layouts.app')
@php
use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="news">
        <div class="container">
            <div class="news__container">
                <h2 class="news-title">
                    <div class="news-title__title">{{ $news->name }}</div>
                </h2>
                <div class="news__header"><img class="news__img" src="{{ Storage::url($news->preview_img_src) }}"
                                               alt="{{ $news->name }}" aria-hidden="true"></div>
                <article class="news-article">
                    {!! $news->body !!}
                    <span class="news-article__date">{{ $news->created_at->format('d.m.Y') }}</span>
                </article>
{{--                <div class="news-articles__pages">--}}
{{--                    <ul class="number-pages__list">--}}
{{--                        <li class="number-pages__item"><a class="active number-pages__link" href="#">1 </a></li>--}}
{{--                        <li class="number-pages__item"><a class="number-pages__link" href="#">2</a></li>--}}
{{--                        <li class="number-pages__item"><a class="number-pages__link" href="#">3 </a></li>--}}
{{--                        <li class="number-pages__item"><a class="number-pages__link" href="#">4 </a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
