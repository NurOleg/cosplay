@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="mb-4 card">
                    <div class="card-header">
                        <b>Создание города</b>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{ route('city_store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="" for="name">Название</label>
                                <input
                                    required
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Заголовок"
                                    type="text"
                                />
                            </div>

                            <button class="btn btn-secondary">Создать</button>
                            <a href="{{ route('city_index') }}" class="btn btn-primary"
                               style="float: right">Назад к списку</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
