@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <section class="customers-form">
        <div class="container">
            <div class="hero-form__title title title--center">
                <img class="title__icon" src="{{ asset('images//logo.5af45d3e.svg') }}"
                     alt="Лого" aria-hidden="true">
                <h1 class="title__text">Изменить костюм</h1></div>
            <form class="customers-form__form" action="{{ route('personal_garb_update', ['garb' => $garb->id]) }}"
                  method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="fandom_id" value="{{ $garb->fandom_id }}">
                <input type="hidden" name="hero_id" value="{{ $garb->hero_id }}">
                <input type="hidden" name="thematic_id" value="{{ $garb->thematic_id }}">
                <input type="hidden" name="active" value="1">
                <input type="hidden" name="changed_files" id="changed_files" value="">

                <div class="customers-form__images">
                    <div class="customers-form__image-field customers-form__image-field--main">
                        <div class="input-field__title"> Добавить фото</div>
                        <label class="customers-form__image ibg" for="img1">
                            <img
                                src="{{ isset($garb->images[0]) ? Storage::url($garb->images[0]->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                alt="photo"></label><input
                            class="customers-form__input" id="img1" type="file"
                            accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                    <div class="row wrap">
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo2">
                                <img
                                    src="{{ isset($garb->images[1]) ? Storage::url($garb->images[1]->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                    alt="photo"></label><input
                                class="customers-form__input" id="photo2" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo3">
                                <img
                                    src="{{ isset($garb->images[2]) ? Storage::url($garb->images[2]->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                    alt="photo"></label><input
                                class="customers-form__input" id="photo3" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                        <div class="customers-form__image-field customers-form__image-field--min"><label
                                class="customers-form__image ibg" for="photo4">
                                <img
                                    src="{{ isset($garb->images[3]) ? Storage::url($garb->images[3]->path) : asset('images/no-photo.0b72cc78.jpg') }}"
                                    alt="photo"></label><input
                                class="customers-form__input" id="photo4" type="file"
                                accept="image/x-png,image/gif,image/jpeg" name="photo[]"></div>
                    </div>
                </div>
                <div class="customers-form__body row wrap">
                    <input id="fandom-id" type="hidden" name="fandom_id"
                           value="{{ $garb->fandom->id }}"><input id="hero-id" type="hidden"
                                           name="hero_id" value="{{ $garb->hero->id }}"><input
                        id="thematic-id" type="hidden" name="thematic_id" value="{{ $garb->thematic->id }}">
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="name"> Название
                                    персонажа</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="hero"
                                                                           type="text" name="hero" list="hero-datalist"
                                                                           data-name="hero" data-associated="#heroEn"
                                                                           data-leng="ru" autocomplete="off"
                                                                           value="{{ $garb->hero->name_ru }}"
                                                                           data-secret="#hero-id">
                                <datalist id="hero-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nameEn"> Character
                                    name</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="heroEn"
                                                                           type="text" name="hero_eng"
                                                                           list="heroEn-datalist" data-name="hero"
                                                                           data-associated="#hero" data-leng="en"
                                                                           value="{{ $garb->hero->name_eng }}"
                                                                           autocomplete="off" data-secret="#hero-id">
                                <datalist id="heroEn-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="concretization">
                                    Конкетизация</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="concretization"
                                                                           type="text" name="concretization"
                                                                           data-name="character"
                                                                           value="{{ $garb->concretization }}"
                                                                           autocomplete="off"><span
                                    class="input-field__subtitle"> поле конкретизации персонажа отображается в фильтре поиска. Например: железный человек, <strong>Марк 1</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="concterization_eng">
                                    Сoncretization</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="concterization_eng"
                                                                           type="text" name="concterization_eng"
                                                                           data-name="characterEn"
                                                                           value="{{ $garb->concterization_eng }}"
                                                                           autocomplete="off"><span
                                    class="input-field__subtitle">after specifying the character, it is displayed in the search filter. For example: Iron Man, <strong>Mark 1</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="subject">
                                    Тематика</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="thematic"
                                                                           type="text" name="thematic"
                                                                           list="thematic-datalist" data-name="thematic"
                                                                           data-associated="#thematicEn" data-leng="ru"
                                                                           data-secret="#thematic-id"
                                                                           value="{{ $garb->thematic->name_ru }}"
                                                                           autocomplete="off">
                                <datalist id="thematic-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field" data-selection="">
                            <div class="input-field__header"><label class="input-field__title" for="thematicEn">
                                    Subject</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="thematicEn"
                                                                           type="text" name="thematic_eng"
                                                                           list="thematicEn-datalist"
                                                                           data-name="thematic"
                                                                           data-secret="#thematic-id"
                                                                           value="{{ $garb->thematic->name_eng }}"
                                                                           autocomplete="off">
                                <datalist id="thematicEn-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field" data-selection="">
                            <div class="input-field__header"><label class="input-field__title"
                                                                    for="fandom">Вселенная</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="fandom"
                                                                           type="text" name="fandom"
                                                                           list="fandom-datalist" data-name="fandom"
                                                                           value="{{ $garb->fandom->name_ru }}"
                                                                           autocomplete="off">
                                <datalist id="fandom-datalist"></datalist>
                            </div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field" data-selection="">
                            <div class="input-field__header"><label class="input-field__title" for="fandomEn">
                                    World</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="fandomEn"
                                                                           type="text" name="fandom_eng"
                                                                           list="fandomEn-datalist" data-name="fandomEn"
                                                                           value="{{ $garb->fandom->name_eng }}"
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
                            class="input-field__textarea setting-form__about-textarea" name="description">
                            {{ $garb->description }}
                        </textarea></div>
                </div>
                {{--                <div class="customers-form__variables setting-form-variables">--}}
                {{--                    <div class="input-field__header"><span class="input-field__title">Я готов к:</span></div>--}}
                {{--                    <div class="row wrap">--}}
                {{--                        <div class="setting-form-variables__column">--}}
                {{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="cosplayer" name="cosplayer"--}}
                {{--                                                           type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                  for="cosplayer">--}}
                {{--                                    <div class="c-checkbox__checkbox"></div>--}}
                {{--                                    <div class="c-checkbox__title">участие в промоакциях</div>--}}
                {{--                                </label></div>--}}
                {{--                        </div>--}}
                {{--                        <div class="setting-form-variables__column">--}}
                {{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="makeupArtist"--}}
                {{--                                                           name="makeupArtist" type="checkbox"><label--}}
                {{--                                    class="c-checkbox__body" for="makeupArtist">--}}
                {{--                                    <div class="c-checkbox__checkbox"></div>--}}
                {{--                                    <div class="c-checkbox__title">участие в совместных проектах / фотосессиях</div>--}}
                {{--                                </label></div>--}}
                {{--                        </div>--}}
                {{--                        <div class="setting-form-variables__column">--}}
                {{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="crafter" name="crafter"--}}
                {{--                                                           type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                  for="crafter">--}}
                {{--                                    <div class="c-checkbox__checkbox"></div>--}}
                {{--                                    <div class="c-checkbox__title">продажа костюма</div>--}}
                {{--                                </label></div>--}}
                {{--                        </div>--}}
                {{--                        <div class="setting-form-variables__column">--}}
                {{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="plasticMakeupArtist"--}}
                {{--                                                           name="plasticMakeupArtist" type="checkbox"><label--}}
                {{--                                    class="c-checkbox__body" for="plasticMakeupArtist">--}}
                {{--                                    <div class="c-checkbox__checkbox"></div>--}}
                {{--                                    <div class="c-checkbox__title">участие в рекламных проектах</div>--}}
                {{--                                </label></div>--}}
                {{--                        </div>--}}
                {{--                        <div class="setting-form-variables__column">--}}
                {{--                            <div class="c-checkbox"><input class="c-checkbox__input" id="tailor" name="tailor"--}}
                {{--                                                           type="checkbox"><label class="c-checkbox__body" for="tailor">--}}
                {{--                                    <div class="c-checkbox__checkbox"></div>--}}
                {{--                                    <div class="c-checkbox__title">участие в съёмках фильмов/сериалов</div>--}}
                {{--                                </label></div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="customers-form__footer">
                    <button class="btn btn--md btn--red" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </section>
    @push('script')
        <script>
            $(document).ready(function () {
                $('body').on('change', '.customers-form__input', function () {
                    $('#changed_files').val($('#changed_files').val() + ',' + $(this).attr('id').replace(/[^-+\d]/g, ""));
                });
            });
        </script>
        <script src="{{asset('js/add-customer.30af895f.js')}}"></script>
    @endpush
@endsection
