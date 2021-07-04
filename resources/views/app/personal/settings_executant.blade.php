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
                    <div class="setting-form__img setting-form-img">
                        <input class="setting-form-img__input" type="file"
                               name="image" accept="image/x-png,image/jpeg"
                               id="setting-form-img"><label
                            class="setting-form-img__body" for="setting-form-img">
                            <div class="ibg setting-form-img__img-wrapper">
                                <img
                                    src="{{ $user->image && $user->image->count() > 0 ? Storage::url($user->image->path) : asset('images/photo.6edb12fe.jpg') }}"
                                    alt="your photo"
                                    aria-hidden="true">
                            </div>
                            <div class="setting-form-img__title">
                                <img src="{{ asset('images/download.0e10ec77.svg') }}"
                                     alt="downnolad svg"
                                     aria-hidden="true"><span>Загрузить </span><div class="tip" data-text="Максимальный размер изображения - 0.5 Mb">
                                    <img class="tip__icon" src="{{ asset('images/tip.1645b35d.svg') }}" alt="tip"></div>
                            </div>
                        </label></div>
                </div>
                <div class="row setting-form__row wrap">
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nameLastName">
                                    Фамилия и
                                    имя*</label></div>
                            <div class="input-field__input-wrapper">
                                <input
                                    class="input-field__input"
                                    id="nameLastName"
                                    type="text"
                                    required
                                    name="fullname"
                                    value="{{ $user->fullname }}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header">
                                <label class="input-field__title"
                                       for="nicknameRu">Никнейм*</label>
                                <div class="tip" data-text="Ваш никнейм на Русском языке">
                                    <img class="tip__icon"
                                         src="{{ asset('images/tip.1645b35d.svg') }}"
                                         alt="tip"></div>
                            </div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input"
                                       id="nicknameRu"
                                       type="text"
                                       required
                                       name="nickname"
                                       value="{{ $user->nickname }}"
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
                                       required
                                       type="password"
                                       name="password"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nicknameEn">
                                    NickName*</label>
                                <div class="tip" data-text="Ваш никнейм на Английском языке">
                                    <img class="tip__icon"
                                         src="{{ asset('images/tip.1645b35d.svg') }}"
                                         alt="tip"></div>
                            </div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="nicknameEn"
                                                                           type="text" name="nickname_eng"
                                                                           required
                                                                           value="{{ $user->nickname_eng }}"></div>
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
                                    Страна*</label>
                            </div>
                            <div class="input-field__input-wrapper">
                                <input class="input-field__input"
                                       id="country"
                                       type="text"
                                       required
                                       name="country"
                                       value="{{ $user->country }}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="nickname">
                                    Пол*</label>
                            </div>
                            <div class="input-field__input-wrapper">
                                <select class="input-field__select" id="gender"
                                        required
                                        name="sex">
                                    <option
                                        @if($user->sex == 'male')
                                        selected
                                        @endif
                                        value="male">Мужчина
                                    </option>
                                    <option
                                        @if($user->sex == 'female')
                                        selected
                                        @endif
                                        value="female">Женщина
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="city"> Город*</label>
                            </div>
                            <div class="input-field__input-wrapper">
                                <select class="input-field__select" id="city"
                                        required
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
                                    телефона*</label></div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="phone"
                                                                           type="tel"
                                                                           required
                                                                           name="phone"
                                                                           value="{{ $user->phone }}"></div>
                        </div>
                        <div class="input-field">
                            <div class="input-field__header"><label class="input-field__title" for="email">
                                    E-mail*</label>
                            </div>
                            <div class="input-field__input-wrapper"><input class="input-field__input" id="email"
                                                                           type="email" name="email"
                                                                           required
                                                                           value="{{ $user->email }}"></div>
                        </div>
                    </div>
                    <div class="setting-form__column setting-form-variables">
                        <div class="input-field__header"><span class="input-field__title">Специализация*</span></div>
                        <div class="row wrap">
                            @foreach($specialities as $speciality)

                                <div class="setting-form-variables__column">
                                    <div class="c-checkbox"><input class="c-checkbox__input"
                                                                   id="{{ $speciality->code }}"
                                                                   name="specialities[]"
                                                                   value="{{ $speciality->id }}"
                                                                   @foreach($user->specialities as $specialityUser)
                                                                   @if($speciality->id == $specialityUser->id)
                                                                   checked="checked"
                                                                   @endif
                                                                   @endforeach
                                                                   type="checkbox"><label class="c-checkbox__body"
                                                                                          for="{{ $speciality->code }}">
                                            <div class="c-checkbox__checkbox"></div>
                                            <div class="c-checkbox__title">{{ $speciality->name }}</div>
                                        </label></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field__header"><span
                                class="input-field__title">Ссылки на социальные сети</span>
                        </div>
                        <div class="setting-form__social setting-form-social">
                            <div class="setting-form-social__input social-input">
                                <div class="social-input__icon">
                                    <img src="{{ asset('images/social-youtube.4436d954.svg') }}" alt="youtube">
                                </div>
                                <div class="social-input__wrapper"><input class="social-input__input" name="youtube"
                                                                          data-inputmask-regex="(https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?"
                                                                          value="{{ $user->youtube }}"
                                                                          type="url" placeholder="Text"><span
                                        class="social-input__text">Добавить</span></div>
                            </div>
                            <div class="setting-form-social__input social-input">
                                <div class="social-input__icon">
                                    <img src="{{ asset('images/social-vk.e1dadef2.svg') }}" alt="vk">
                                </div>
                                <div class="social-input__wrapper"><input class="social-input__input" name="vk"
                                                                          type="url"
                                                                          data-inputmask-regex="(https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?"
                                                                          value="{{ $user->vk }}"
                                                                          placeholder="vk"><span
                                        class="social-input__text">Добавить</span>
                                </div>
                            </div>
                            <div class="setting-form-social__input social-input">
                                <div class="social-input__icon">
                                    <img src="{{ asset('images/social-twitter.5757a209.svg') }}" alt="twitter">
                                </div>
                                <div class="social-input__wrapper"><input class="social-input__input" name="twitter"
                                                                          data-inputmask-regex="(https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?"
                                                                          value="{{ $user->twitter }}"
                                                                          type="url" placeholder="twitter"><span
                                        class="social-input__text">Добавить</span></div>
                            </div>
                            <div class="setting-form-social__input social-input">
                                <div class="social-input__icon">
                                    <img src="{{ asset('images/social-instagram.0fe232e6.svg') }}"
                                         alt="Instagram">
                                </div>
                                <div class="social-input__wrapper"><input class="social-input__input" name="instagram"
                                                                          data-inputmask-regex="(https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?"
                                                                          value="{{ $user->instagram }}"
                                                                          type="url" placeholder="instagram"><span
                                        class="social-input__text">Добавить</span></div>
                            </div>
                            <div class="setting-form-social__input social-input">
                                <div class="social-input__icon">
                                    <img src="{{ asset('images/scoail-facebook.6c0c36fd.svg') }}" alt="facebook">
                                </div>
                                <div class="social-input__wrapper"><input class="social-input__input" name="facebook"
                                                                          data-inputmask-regex="(https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?"
                                                                          value="{{ $user->facebook }}"
                                                                          type="url" placeholder="facebook"><span
                                        class="social-input__text">Добавить</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="setting-form__column">
                        <div class="input-field">
                            <div class="input-field__header"><span
                                    class="input-field__title">О себе в свободной форме</span>
                            </div>
                            <div class="input-field__input-wrapper"><textarea maxlength="1000"
                                                                              class="input-field__textarea setting-form__about-textarea"
                                                                              name="description">{{ $user->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-form__footer">
                    <button class="btn btn--red setting-form__submit" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script src="//rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
        <script>
            $(document).ready(function () {
                $('.social-input__input').each(function (index) {
                    $(this).inputmask();
                });
            });
        </script>
    @endpush
@endsection
