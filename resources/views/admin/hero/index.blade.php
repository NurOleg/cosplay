@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Герои</span>
                <a href="{{ route('hero_create') }}" class="btn btn-success" style="float: right">Создать героя</a>
            </div>
            @if($heroes->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Новый</th>
                            <th>Название, RUS</th>
                            <th>Название, ENG</th>
                            <th>Код</th>
                            <th>Активность</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($heroes as $hero)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th scope="row">
                                    @if($hero->is_new == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif</th>
                                <td>
                                    <a href="{{ route('hero_detail', ['hero' => $hero->id]) }}">{{$hero->name_ru}}</a>
                                </td>
                                <td>
                                    <a href="{{ route('hero_detail', ['hero' => $hero->id]) }}">{{$hero->name_eng}}</a>
                                </td>
                                <td>{{$hero->code}}</td>
                                <td>
                                    @if($hero->active == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>{{$hero->created_at}}</td>
                                <td>{{$hero->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
