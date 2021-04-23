@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Редактирование фандома - {{ $fandom->name_ru }}</b>
                        <a href="{{ route('fandom_delete', ['fandom' => $fandom->id]) }}" class="btn btn-danger"
                           style="float: right">Удалить</a>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('fandom_update', ['fandom' => $fandom->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="" for="name_ru">Название (RUS)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name_ru"
                                    name="name_ru"
                                    placeholder="Название (RUS)"
                                    type="text"
                                    value="{{ $fandom->name_ru }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="name_eng">Название (ENG)</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name_eng"
                                    name="name_eng"
                                    placeholder="Название (ENG)"
                                    type="text"
                                    value="{{ $fandom->name_eng }}"
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="code">Код</label>
                                <input
                                    class="form-control"
                                    id="code"
                                    name="code"
                                    placeholder="Код"
                                    type="text"
                                    value="{{ $fandom->code }}"
                                    readonly
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="active">Активность</label>
                                <input
                                    required
                                    class="form-control"
                                    id="active"
                                    name="active"
                                    type="checkbox"
                                    @if($fandom->active == 1)
                                        checked="checked"
                                    @endif
                                />
                            </div>
                            <input type="hidden" name="description" id="description" value="">
                            <button class="btn btn-secondary">Обновить</button>
                            <a href="{{ route('fandom_index') }}" class="btn btn-primary"
                               style="float: right">Назад к списку</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
