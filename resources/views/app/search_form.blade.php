<form class="cosplay-block-form" action="{{ route('executant_index') }}" method="GET">
    <div class="cosplay-block-form__row">
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Специализация</div>
                <div class="input-field__input-wrapper">
                    <select class="input-field__input"
                            name="speciality">
                        <option value="0" disabled
                                @if(!request()->filled('speciality') || empty(request()->get('speciality')))
                                selected
                            @endif
                        >--Не выбран
                        </option>
                        @foreach($specialities as $speciality)
                            <option value="{{$speciality->id}}"
                                    @if(request()->filled('speciality') && request()->get('speciality') == $speciality->id)
                                    selected
                                @endif
                            >{{$speciality->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Город</div>
                <div class="input-field__input-wrapper">

                    <select class="input-field__input"
                            name="city">
                        <option value="0" disabled
                                @if(!request()->filled('city') || empty(request()->get('city')))
                                selected
                            @endif
                        >--Не выбран
                        </option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"
                                    @if(request()->filled('city') && request()->get('city') == $city->id)
                                     selected
                                    @endif
                            >{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Персонаж</div>
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="hero" list="hero" data-name="hero">
                    <datalist id="hero"></datalist>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Вселенная</div>
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="fandom" list="fandom" data-name="fandom">
                    <datalist id="fandom"></datalist>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Ник косплеера</div>
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="nick" list="nick" data-name="nick">
                    <datalist id="nick"></datalist>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Пол</div>
                <div class="input-field__input-wrapper"><select class="input-field__input"
                                                                name="sex">
                        <option value="0" disabled
                                @if(!request()->filled('sex') || empty(request()->get('sex')))
                                selected
                            @endif
                        >--Не выбран
                        </option>
                        @foreach(['male' => 'Мужской', 'female' => 'Женский'] as $code => $gender)
                            <option value="{{$code}}"
                                    @if(request()->filled('sex') && request()->get('sex') == $code)
                                    selected
                                @endif
                            >{{$gender}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Фамилия Имя</div>
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="fullName" list="fullName"
                                                               data-name="fullName">
                    <datalist id="fullName"></datalist>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Тематика</div>
                <div class="input-field__input-wrapper">
                    <select class="input-field__input"
                            name="thematic">
                    <option value="0" disabled
                                                                @if(!request()->filled('thematic') || empty(request()->get('thematic')))
                                                                selected
                        @endif
                    >--Не выбрана
                    </option>
                    @foreach($thematics as $thematic)
                        <option value="{{$thematic->name_ru}}"
                                @if(request()->filled('thematic') && request()->get('thematic') == $thematic->name_ru)
                                selected
                            @endif
                        >{{$thematic->name_ru}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <p class="hero-form__tip">*чем больше ячеек заполнено, тем точнее будет выполнен поиск</p>
    <div class="hero-form__footer">
        <button class="btn btn--red cosplay-block-form__submit" type="submit">Найти</button>
    </div>
</form>
