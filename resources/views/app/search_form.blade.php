<form class="cosplay-block-form" action="{{ route('executant_index') }}" method="GET">
    <div class="cosplay-block-form__row">
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Специализация</div>
                <div class="input-field__input-wrapper">
                    <input class="input-field__input" type="text"
                                                               name="concretization" list="concretization"
                                                               data-name="concretization">
                    <datalist id="concretization"></datalist>
                </div>
            </div>
        </div>
        <div class="cosplay-block-form__item">
            <div class="input-field input-field--block" data-selection="">
                <div class="input-field__title">Город</div>
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="city" list="city" data-name="city">
                    <datalist id="city">
                    </datalist>
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
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="gender" list="gender"
                                                               data-name="gender">
                    <datalist id="gender">
                        <option value="male">Мужской</option>
                        <option value="female">Женский</option>
                    </datalist>
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
                <div class="input-field__input-wrapper"><input class="input-field__input" type="text"
                                                               name="thematic" list="thematic"
                                                               data-name="thematic">
                    <datalist id="thematic"></datalist>
                </div>
            </div>
        </div>
    </div>
    <p class="hero-form__tip">*чем больше ячеек заполнено, тем точнее будет выполнен поиск</p>
    <div class="hero-form__footer">
        <button class="btn btn--red cosplay-block-form__submit" type="submit">Найти</button>
    </div>
</form>
