@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Тематики</span>
                <a href="{{ route('thematic_create') }}" class="btn btn-success" style="float: right">Создать тематику</a>
            </div>
            @if($thematics->count() > 0)
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
                        @foreach($thematics as $thematic)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th scope="row">
                                    @if($thematic->is_new == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif</th>
                                <td>
                                <td>
                                    <a href="{{ route('thematic_detail', ['thematic' => $thematic->id]) }}">{{$thematic->name_ru}}</a>
                                </td>
                                <td>
                                    <a href="{{ route('thematic_detail', ['thematic' => $thematic->id]) }}">{{$thematic->name_eng}}</a>
                                </td>
                                <td>{{$thematic->code}}</td>
                                <td>
                                    @if($thematic->active == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>{{$thematic->created_at}}</td>
                                <td>{{$thematic->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
