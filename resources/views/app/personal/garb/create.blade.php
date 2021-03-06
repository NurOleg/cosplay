@extends('layouts.app')
@section('content')
    <section class="customers-form">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="hero-form__title title title--center">
                <img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                     alt="Лого" aria-hidden="true">
                <h1 class="title__text">Изменить / Добавить костюм</h1></div>
            <form class="customers-form__form" action="{{ route('personal_garb_store') }}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="active" value="1">

                <div class="customers-form__images">
                    <div class="customers-form__image-field customers-form__image-field--main">
                        <div class="input-field__title"> Добавить фото</div>
                        <label class="customers-form__image ibg" for="img1">
                            <img src="{{ asset('images/no-photo.0b72cc78.jpg') }}"
                                 alt="photo"></label><input
                            class="customers-form__input" id="img1" type="file"
                            accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                    <div class="row wrap">
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo1">
                                <img src="{{ asset('images/no-photo.0b72cc78.jpg') }}"
                                     alt="photo"></label><input
                                class="customers-form__input" id="photo1" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo2">
                                <img src="{{ asset('images/no-photo.0b72cc78.jpg') }}"
                                     alt="photo"></label><input
                                class="customers-form__input" id="photo2" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo3">
                                <img src="{{ asset('images/no-photo.0b72cc78.jpg') }}"
                                     alt="photo"></label><input
                                class="customers-form__input" id="photo3" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                    </div>
                </div>
                <div class="customers-form__body row wrap">
                    <input id="fandom-id" type="hidden" name="fandom_id"
                           value=""><input id="hero-id" type="hidden"
                                           name="hero_id" value=""><input
                        id="thematic-id" type="hidden" name="thematic_id" value="">
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="name"> Название
                                    персонажа*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="hero"
                                                                           type="text" name="hero" list="hero-datalist"
                                                                           data-name="hero" data-associated="#heroEn"
                                                                           required
                                                                           data-leng="ru" autocomplete="off"
                                                                           data-secret="#hero-id">
                                <datalist id="hero-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nameEn"> Character
                                    name*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="heroEn"
                                                                           type="text" name="heroEn"
                                                                           required
                                                                           list="heroEn-datalist" data-name="hero"
                                                                           data-associated="#hero" data-leng="en"
                                                                           autocomplete="off" data-secret="#hero-id">
                                <datalist id="heroEn-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="character">
                                    Конкетизация персонажа</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="character"
                                                                           type="text" name="concretization"
                                                                           data-name="character"
                                                                           autocomplete="off"><span
                                    class="input-field__subtitle"> поле конкретизации персонажа отображается в фильтре поиска. Например: железный человек, <strong>Марк 1</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="characterEn">
                                    Character concretization</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="characterEn"
                                                                           type="text" name="concretization_eng"
                                                                           data-name="characterEn"
                                                                           autocomplete="off"><span
                                    class="input-field__subtitle">after specifying the character, it is displayed in the search filter. For example: Iron Man, <strong>Mark 1</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="subject">
                                    Тематика*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="thematic"
                                                                           type="text" name="thematic"
                                                                           list="thematic-datalist" data-name="thematic"
                                                                           data-associated="#thematicEn" data-leng="ru"
                                                                           required
                                                                           data-secret="#thematic-id"
                                                                           autocomplete="off">
                                <datalist id="thematic-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field" data-selection="">
                            <div class="input-field__header"><label class="input-field__title" for="subjectEn">
                                    Subject*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="thematicEn"
                                                                           type="text" name="thematicEn"
                                                                           required
                                                                           list="thematicEn-datalist"
                                                                           data-name="thematic"
                                                                           data-secret="#thematic-id"
                                                                           autocomplete="off">
                                <datalist id="thematicEn-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="subject">
                                    Фандом*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="fandom"
                                                                           type="text" name="fandom"
                                                                           required
                                                                           list="fandom-datalist" data-name="fandom"
                                                                           data-associated="#fandomEn" data-leng="ru"
                                                                           data-secret="#fandom-id"
                                                                           autocomplete="off">
                                <datalist id="fandom-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field" data-selection="">
                            <div class="input-field__header"><label class="input-field__title" for="fandomEn">
                                    Fandom*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="fandomEn"
                                                                           type="text" name="fandomEn"
                                                                           list="fandomEn-datalist"
                                                                           required
                                                                           data-name="fandom"
                                                                           data-secret="#fandom-id"
                                                                           autocomplete="off">
                                <datalist id="fandomEn-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers-form__textarea input-field">
                    <div class="input-field__header"><span class="input-field__title">О костюме</span></div>
                    <div class="input-field__input-wrapper">
                        <textarea
                            class="input-field__textarea setting-form__about-textarea" name="description"></textarea>
                    </div>
                </div>
                <div class="customers-form__variables setting-form-variables">
                    <div class="input-field__header"><span class="input-field__title">Я готов к:</span></div>
                    <div class="row wrap">
                        @foreach($services as $service)
                            <div class="setting-form-variables__column">
                                <div class="c-checkbox">
                                    <input class="c-checkbox__input" id="{{ $service->code }}" name="services[]"
                                           value="{{ $service->id }}"
                                           type="checkbox">
                                    <label class="c-checkbox__body"
                                           for="{{ $service->code }}">
                                        <div class="c-checkbox__checkbox"></div>
                                        <div class="c-checkbox__title">{{ $service->name }}</div>
                                    </label></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="customers-form__footer">
                    <button class="btn btn--md btn--red" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </section>
    @push('script')
        <script src="{{asset('js/add-customer.30af895f.js')}}"></script>
    @endpush
@endsection
