@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Мероприятия</span>
                <a href="{{ route('event_create') }}" class="btn btn-success" style="float: right">Создать мероприятие</a>
            </div>
            @if($events->count() > 0)
                <div class="table-responsive table-striped table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Код</th>
                            <th>Название</th>
                            <th>Активность</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$event->id}}</td>
                                <td>
                                    <a href="{{ route('event_detail', ['event' => $event->id]) }}">
                                        {{$event->name}}
                                    </a>
                                </td>
                                <td>
                                    @if($event->active == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>{{$event->created_at}}</td>
                                <td>{{$event->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
