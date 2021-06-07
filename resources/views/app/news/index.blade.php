@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title title title--center">
                <img class="title__icon" src="{{asset('/images/logo.5af45d3e.svg')}}" alt="Лого"
                                                              aria-hidden="true">
                <div class="title__text">ПОЛЕЗНЫЙ БЛОГ ОТ КОСПЛЕЙ ПРОМО</div>
                <div class="title__subtext">Мы публикуем актуальную информацию из мира косплея, а также делимся
                    полезными советами. Регистрируйтесь на сайте и публикуйте свои статьи!
                </div>
            </div>
            <div class="blog__row">
                @foreach($news as $newsOne)
                <div class="blog__item">
                    <div class="blog-item">
                        <div class="blog-item__header"><img class="blog-item__img" src="{{ Storage::url($newsOne->preview_img_src) }}"
                                                            alt="blog image" aria-hidden="true"></div>
                        <div class="blog-item__body">
                            <div class="blog-item__title">
                                <a href="{{ route('public_news_detail', ['news' => $newsOne->slug]) }}">
                                    {{ $newsOne->name }}
                                </a>

                            </div>
                            <div class="blog-item__text">{{ $newsOne->preview_body }} <span>{{ $newsOne->created_at->format('d.m.Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $news->links('app.pagination') }}
        </div>
    </section>
@endsection
