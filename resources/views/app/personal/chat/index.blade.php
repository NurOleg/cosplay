@extends('layouts.app')
@section('content')
    <div id="app">
        <div class="container">
            <div class="chat-content">
                <div class="chat">
                    <div class="chat-container">
                        <div class="chat-content">
                            <chats :chats="chats"></chats>
                            <div class="chat-content__column chat-content__messager chat-messager">
                                <router-view
                                    :messages="messages"
                                    :user="{{ $user }}"
                                ></router-view>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @push('script')
            <script src="{{asset('js/app.js')}}"></script>
    @endpush
@endsection
