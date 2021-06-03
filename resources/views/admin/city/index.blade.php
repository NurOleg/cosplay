@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Город</span>
                <a href="{{ route('city_create') }}" class="btn btn-success" style="float: right">Создать</a>
            </div>
            @if($cities->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>
                                    <a href="{{ route('city_detail', ['city' => $city->id]) }}">
                                        {{$city->name}}
                                    </a>
                                </td>
                                <td>{{$city->created_at}}</td>
                                <td>{{$city->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
