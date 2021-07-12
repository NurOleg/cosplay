@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Создание фандома</b>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('fandom_store') }}" enctype="multipart/form-data">
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
                                    readonly
                                />
                            </div>

                            <div class="form-group">
                                <label class="" for="active">Активность</label>
                                <input
                                    class="form-control"
                                    id="active"
                                    name="active"
                                    type="checkbox"
                                />
                            </div>

                            <button class="btn btn-secondary">Создать</button>
                            <a href="{{ route('fandom_index') }}" class="btn btn-primary"
                               style="float: right">Назад к списку</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
