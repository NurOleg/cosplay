@extends('layouts.app')
@section('content')
    <section class="customers-form">
        <div class="container">
            <div class="hero-form__title title title--center">
                <img class="title__icon" src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                   alt="Лого" aria-hidden="true">
                <h1 class="title__text">Изменить / Добавить костюм</h1></div>
            <form class="customers-form__form" action="{{ route('personal_garb_store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="fandom_id" value="1">
                <input type="hidden" name="hero_id" value="8">
                <input type="hidden" name="thematic_id" value="8">
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
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="name"> Название
                                    персонажа</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="name"
                                                                           type="text" name="name"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nameEn"> Character
                                    name</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="nameEn"
                                                                           type="text" name="nameEn"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="character">
                                    Конкетизация персонажа</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="character"
                                                                           type="text" name="concretization"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="characterEn">
                                    Character concretization</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="characterEn"
                                                                           type="text" name="concretization_eng"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="subject">
                                    Тематика</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="subject"
                                                                           type="text" name="subject"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="subjectEn">
                                    Subject</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="subjectEn"
                                                                           type="text" name="subjectEn"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title"
                                                                    for="world">Вселенная</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="world"
                                                                           type="text" name="world"></div>
                        </div>
                    </div>
                    <div class="customers-form__column">
                        <div class="input-field">
                            <div class="input-field__header">
                                <label class="input-field__title" for="worldEn">
                                    World</label></div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input"
                                       id="worldEn"
                                       type="text"
                                       name="worldEn">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customers-form__textarea input-field">
                    <div class="input-field__header"><span class="input-field__title">О костюме</span></div>
                    <div class="input-field__input-wrapper">
                        <textarea
                            class="input-field__textarea setting-form__about-textarea" name="description"> </textarea></div>
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
@endsection