@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Storage;
@endphp
@section('content')
    <div class="settings-form">
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
            <div class="settings-form__title title title--center"><img class="title__icon"
                                                                       src="{{ asset('images/logo.5af45d3e.svg') }}"
                                                                       alt="Лого" aria-hidden="true">
                <div class="title__text">Настройки</div>
            </div>
            <form class="setting-form" action="{{ route('personal_settings_update') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $user->type }}" name="type">
                <div class="setting-form__img-wrapper">
                    <div class="setting-form__img setting-form-img"><input class="setting-form-img__input" type="file"
                                                                           name="image" accept="image/x-png,image/jpeg"
                                                                           id="setting-form-img"><label
                            class="setting-form-img__body" for="setting-form-img">
                            <div class="ibg setting-form-img__img-wrapper">
                                <img
                                    src="{{ $user->image && $user->image->count() > 0 ? Storage::url($user->image->path) : asset('images/photo.6edb12fe.jpg') }}"
                                    alt="your photo"
                                    aria-hidden="true"></div>
                            <div class="setting-form-img__title">
                                <img src="{{ asset('images/download.0e10ec77.svg') }}"
                                     alt="downnolad svg"
                                     aria-hidden="true">
                                <span>Загрузить </span>
                                <div class="tip" data-text="Максимальный размер изображения - 0.5 Mb">
                                    <img class="tip__icon" src="{{ asset('images/tip.1645b35d.svg') }}" alt="tip"></div>
                            </div>
                        </label></div>
                </div>
                <div class="row setting-form__row wrap">
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nameLastName">
                                    Фамилия и
                                    имя</label></div>
                            <div class="input-field__input-wrapper">
                                <input
                                    class="input-field__input"
                                    id="nameLastName"
                                    type="text"
                                    name="name"
                                    value="{{ $user->name }}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header">
                                <label class="input-field__title"
                                       for="nicknameRu">Организация</label>
                                <div class="tip" data-text="Ваша организация">
                                    <img class="tip__icon"
                                         src="{{ asset('images/tip.1645b35d.svg') }}"
                                         alt="tip"></div>
                            </div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input"
                                       id="nicknameRu"
                                       type="text"
                                       name="organization"
                                       value="{{ $user->organization }}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="password">
                                    Пароль*</label>
                                <div class="tip" data-text="заполнять в случае изменения пароля">
                                    <img class="tip__icon"
                                         src="{{ asset('images/tip.1645b35d.svg') }}"
                                         alt="tip"></div>
                            </div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input"
                                       id="password"
                                       type="password"
                                       name="password"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="doublePassword">
                                    Пароль
                                    еще раз*</label>
                                <div class="tip" data-text="заполнять в случае изменения пароля">
                                    <img class="tip__icon"
                                         src="{{ asset('images/tip.1645b35d.svg') }}"
                                         alt="tip"></div>
                            </div>
                        </div>
                        <div class="input-field__input-wrapper">
                            <input class="input-field__input"
                                   id="doublePassword"
                                   type="password" name="confirm_password"
                            >
                        </div>
                    </div>
                </div>
                <div class="setting-form__column">
                    <div class="input-field">
                        <div class="input-field__header"><label class="input-field__title" for="country">
                                Страна</label>
                        </div>
                        <div class="input-field__input-wrapper">
                            <input class="input-field__input"
                                   id="country"
                                   type="text"
                                   name="country"
                                   value="{{ $user->country }}"
                            >
                        </div>
                    </div>
                </div>
                {{--                    <div class="setting-form__column">--}}
                {{--                        <div class="input-field">--}}
                {{--                            <div class="input-field__header"><label class="input-field__title" for="nickname">--}}
                {{--                                    Пол</label>--}}
                {{--                            </div>--}}
                {{--                            <div class="input-field__input-wrapper"><select class="input-field__select" id="gender"--}}
                {{--                                                                            name="sex">--}}
                {{--                                    <option value="male">Мужчина</option>--}}
                {{--                                    <option value="female">Женчина</option>--}}
                {{--                                </select></div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <div class="setting-form__column">
                    <div class="input-field">
                        <div class="input-field__header"><label class="input-field__title" for="city"> Город</label>
                        </div>
                        <div class="input-field__input-wrapper">
                            <select class="input-field__select" id="city"
                                    name="city_id">
                                @foreach($cities as $city)
                                    <option
                                        @if($user->city_id == $city->id)
                                        selected
                                        @endif
                                        value="{{$city->id}}">{{$city->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-form__column">
                    <div class="input-field setting-form__input-field--double">
                        <div class="input-field__header"><label class="input-field__title" for="phone"> Номер
                                телефона</label></div>
                        <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                       type="tel"
                                                                       name="phone"
                                                                       value="{{ $user->phone }}"></div>
                    </div>
                    <div class="input-field">
                        <div class="input-field__header"><label class="input-field__title" for="email">
                                E-mail</label>
                        </div>
                        <div class="input-field__input-wrapper"><input class="input-field__input" id="email"
                                                                       type="email" name="email"
                                                                       value="{{ $user->email }}"></div>
                    </div>
                </div>
                {{--                    <div class="setting-form__column setting-form-variables">--}}
                {{--                        <div class="input-field__header"><span class="input-field__title">Специализация</span></div>--}}
                {{--                        <div class="row wrap">--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="cosplayer" name="cosplayer"--}}
                {{--                                                               type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                      for="cosplayer">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">косплеер</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="makeupArtist"--}}
                {{--                                                               name="makeupArtist" type="checkbox"><label--}}
                {{--                                        class="c-checkbox__body" for="makeupArtist">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">гример</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="crafter" name="crafter"--}}
                {{--                                                               type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                      for="crafter">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">крафтер</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="plasticMakeupArtist"--}}
                {{--                                                               name="plasticMakeupArtist" type="checkbox"><label--}}
                {{--                                        class="c-checkbox__body" for="plasticMakeupArtist">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">пластический гример</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="tailor" name="tailor"--}}
                {{--                                                               type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                      for="tailor">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">швея / портной</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-variables__column">--}}
                {{--                                <div class="c-checkbox"><input class="c-checkbox__input" id="wickmayer" name="wickmayer"--}}
                {{--                                                               type="checkbox"><label class="c-checkbox__body"--}}
                {{--                                                                                      for="wickmayer">--}}
                {{--                                        <div class="c-checkbox__checkbox"></div>--}}
                {{--                                        <div class="c-checkbox__title">викмейкер</div>--}}
                {{--                                    </label></div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="setting-form__column">--}}
                {{--                        <div class="input-field__header"><span--}}
                {{--                                class="input-field__title">Ссылки на социальные сети</span>--}}
                {{--                        </div>--}}
                {{--                        <div class="setting-form__social setting-form-social">--}}
                {{--                            <div class="setting-form-social__input social-input">--}}
                {{--                                <div class="social-input__icon"><img src="/youtube-social.5e1aefaa.svg" alt="youtube">--}}
                {{--                                </div>--}}
                {{--                                <div class="social-input__wrapper"><input class="social-input__input" name="youtube"--}}
                {{--                                                                          type="text" placeholder="Text"><span--}}
                {{--                                        class="social-input__text">Добавить</span></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-social__input social-input">--}}
                {{--                                <div class="social-input__icon"><img src="/social-vk.e1dadef2.svg" alt="vk"></div>--}}
                {{--                                <div class="social-input__wrapper"><input class="social-input__input" name="vk"--}}
                {{--                                                                          type="text"--}}
                {{--                                                                          placeholder="Text"><span--}}
                {{--                                        class="social-input__text">Добавить</span></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-social__input social-input">--}}
                {{--                                <div class="social-input__icon"><img src="/social-twitter.5757a209.svg" alt="twitter">--}}
                {{--                                </div>--}}
                {{--                                <div class="social-input__wrapper"><input class="social-input__input" name="twitter"--}}
                {{--                                                                          type="text" placeholder="Text"><span--}}
                {{--                                        class="social-input__text">Добавить</span></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-social__input social-input">--}}
                {{--                                <div class="social-input__icon"><img src="/social-Instagram.0fe232e6.svg"--}}
                {{--                                                                     alt="Instagram">--}}
                {{--                                </div>--}}
                {{--                                <div class="social-input__wrapper"><input class="social-input__input" name="instagram"--}}
                {{--                                                                          type="text" placeholder="Text"><span--}}
                {{--                                        class="social-input__text">Добавить</span></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="setting-form-social__input social-input">--}}
                {{--                                <div class="social-input__icon"><img src="/scoail-facebook.6c0c36fd.svg" alt="facebook">--}}
                {{--                                </div>--}}
                {{--                                <div class="social-input__wrapper"><input class="social-input__input" name="facebook"--}}
                {{--                                                                          type="text" placeholder="Text"><span--}}
                {{--                                        class="social-input__text">Добавить</span></div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <div class="setting-form__column">
                    <div class="input-field">
                        <div class="input-field__header"><span
                                class="input-field__title">О себе в свободной форме</span></div>
                        <div class="input-field__input-wrapper"><textarea maxlength="1000"
                                                                          class="input-field__textarea setting-form__about-textarea"
                                                                          name="description">{{ $user->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="setting-form__footer">
                    <button class="btn btn--red setting-form__submit" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
