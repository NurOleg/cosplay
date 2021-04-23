@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Фандомы</span>
                <a href="{{ route('fandom_create') }}" class="btn btn-success" style="float: right">Создать фандом</a>
            </div>
            @if($fandoms->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название, RUS</th>
                            <th>Название, ENG</th>
                            <th>Код</th>
                            <th>Активность</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fandoms as $fandom)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>
                                    <a href="{{ route('fandom_detail', ['fandom' => $fandom->id]) }}">{{$fandom->name_ru}}</a>
                                </td>
                                <td>
                                    <a href="{{ route('fandom_detail', ['fandom' => $fandom->id]) }}">{{$fandom->name_eng}}</a>
                                </td>
                                <td>{{$fandom->code}}</td>
                                <td>
                                    @if($fandom->active == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>{{$fandom->created_at}}</td>
                                <td>{{$fandom->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
