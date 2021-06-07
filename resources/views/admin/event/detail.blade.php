@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Редактирование мероприятия</b>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('event_update', ['event' => $event->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="" for="active">Активность</label>
                                <input
                                    class="form-control"
                                    id="active"
                                    name="active"
                                    type="checkbox"
                                    @if($event->active == 1)
                                    checked
                                    @endif
                                />
                            </div>
                            <div class="form-group">
                                <label class="" for="name">Заголовок</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Заголовок"
                                    type="text"
                                    value="{{ $event->name }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="image">Изображение мероприятия</label>
                                <input
                                    class="form-control"
                                    id="image"
                                    name="image"
                                    placeholder="Изображение мероприятия"
                                    type="file"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="city_id">Место проведеня</label>
                                <select class="form-control" id="city_id" name="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city['id'] }}"
                                                @if($city['id'] == $event->city->id)
                                                selected
                                            @endif
                                        >{{ $city['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="" for="image">Текст превью</label>
                                <input
                                    required
                                    class="form-control"
                                    id="preview_body"
                                    name="preview_body"
                                    placeholder="Текст превью"
                                    type="text"
                                    value="{{ $event->preview_body }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="code">Текст основной</label>
                                <textarea name="body" id="body" cols="30" rows="10">
                                    {!! $event->body !!}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <section class="section">
                                    <div class="container"><h2 class="title">Загрузка фото</h2>
                                        <div class="form-images">
                                            <div class="form-images__add">
                                                <input type="file" class="form-images__add-button btn btn-primary"
                                                       id="form-img-add" placeholder="Добавить файл"/>
                                            </div>
                                            <div class="form-images__images">
                                                @foreach($event->images as $image)
                                                    @if(!$loop->first)
                                                        <div class="form-images__wrapper">
                                                            <div class="form-images-img">
                                                                <img class="form-images-img__img"
                                                                     src="{{ Storage::url($image->path) }}"
                                                                     alt="your img"
                                                                >
                                                                <button class="form-images-img__close"
                                                                        id="{{ $image->id }}">✖
                                                                </button>
                                                                <input class="form-images-img__input" type="file"
                                                                       name="images[]">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="form-group">
                                <label class="" for="exampleDate">Начало мероприятия</label>
                                <input class="form-control"
                                       id="exampleDate"
                                       name="start"
                                       placeholder="Начало мероприятия"
                                       type="date"
                                       value="{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d') }}"
                                >
                            </div>

                            <div class="form-group col-xs-6">
                                <label class="" for="end">Окончание мероприятия</label>
                                <input class="form-control"
                                       id="end"
                                       name="end"
                                       placeholder="Окончание мероприятия"
                                       value="{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d') }}"
                                       type="date">
                            </div>

                            @foreach(json_decode($event->programm) as $dateProgramm)
                                @foreach($dateProgramm->extra as $extras)
                                <div class="form-group row">
                                    <div class="col-xs-6">
                                        <label class="" for="programm_dates">Программа мероприятия</label>
                                        <input
                                            required
                                            class="form-control"
                                            id="programm"
                                            name="programm_dates[]"
                                            placeholder="Программа мероприятия"
                                            type="datetime-local"
                                            value="{{ \Carbon\Carbon::parse($dateProgramm->date . ' ' . $extras->time)->format('Y-m-d\TH:i') }}"
                                        /></div>
                                    <div class="col-xs-6">
                                        <label class="" for="programm_names">Программа мероприятия (название)</label>
                                        <input
                                            required
                                            class="form-control"
                                            id="programm"
                                            name="programm_names[]"
                                            placeholder="Программа мероприятия (название)"
                                            type="text"
                                            value="{{ $extras->name }}"
                                        />
                                    </div>
                                </div>
                            @endforeach
                            @endforeach
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <span class="btn btn-secondary" id="add_programm">Добавить</span>
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label class="" for="place_title">Название места проведения</label>
                                <input
                                    required
                                    class="form-control"
                                    id="place_title"
                                    name="place_title"
                                    placeholder="Название места проведения"
                                    type="text"
                                    value="{{ $event->place_title }}"
                                />
                            </div>

                            <div class="form-group col-xs-6">
                                <label class="" for="address">Адрес</label>
                                <input
                                    required
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Адрес"
                                    type="text"
                                    value="{{ $event->address }}"
                                />
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <section class="section">--}}
{{--                                    <div class="container"><h2 class="title">Место проведения на карте</h2>--}}
{{--                                        <div class="map">--}}
{{--                                            <div class="form-group"><label for="point">Кординаты</label><input--}}
{{--                                                    class="form-control" id="point"--}}
{{--                                                    type="text" placeholder="Кординаты"--}}
{{--                                                    name="point"><small--}}
{{--                                                    class="form-text text-muted">Введите координаты вручную или выберите--}}
{{--                                                    место на карте.</small></div>--}}
{{--                                            <div class="map__map">--}}
{{--                                                <div class="map-map" id="map"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </section>--}}
{{--                            </div>--}}

                            <button class="btn btn-secondary">Создать</button>
                            <a href="{{ route('event_index') }}" class="btn btn-primary"
                               style="float: right">Назад к списку</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#body',
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime table paste code help wordcount'
                ],
                toolbar:
                    `bold italic underline forecolor backcolor link | undo redo | fontselect fontsizeselect formatselect |
      alignleft aligncenter alignright alignjustify |
      bullist numlist outdent indent | removeformat | table | help`,

                language: 'ru',
                language_url: '{{ asset('js/tiny/ru.js') }}',
            });

            $('#add_programm').click(function () {
                $('<div class="form-group row">' +
                    '<div class="col-xs-6">' +
                    '<label class="" for="programm_dates">Программа мероприятия</label>' +
                    '<input required class="form-control" id="programm"' +
                    ' name="programm_dates[]"' +
                    ' placeholder="Программа мероприятия"' +
                    ' type="datetime-local"' +
                    ' /></div>' +
                    '<div class="col-xs-6">' +
                    ' <label class="" for="programm_names">Программа мероприятия (название)</label>' +
                    '<input required class="form-control" id="programm"' +
                    ' name="programm_names[]"' +
                    ' placeholder="Программа мероприятия (название)"' +
                    ' type="text"' +
                    '/>' +
                    '</div>' +
                    '</div>').insertBefore($(this));
            });
        });
    </script>
    @push('js')
        <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
        <script src="{{ asset('js/main.d8ebb8d6.js') }}"></script>
    @endpush
@endsection
