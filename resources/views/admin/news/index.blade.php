@extends('layouts.admin')
@section('content')
    <div class="page-inner bg-light">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3 card">
            <div class="card-header"><span>Новости</span>
                <a href="{{ route('news_create') }}" class="btn btn-success" style="float: right">Создать новость</a>
            </div>
            @if($news->count() > 0)
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
                        @foreach($news as $newsOne)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$newsOne->slug}}</td>
                                <td>
                                    <a href="{{ route('news_detail', ['news' => $newsOne->slug]) }}">
                                        {{$newsOne->name}}
                                    </a>
                                </td>
                                <td>
                                    @if($newsOne->active == 1)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>{{$newsOne->created_at}}</td>
                                <td>{{$newsOne->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
