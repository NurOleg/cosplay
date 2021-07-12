@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/main.7c1187fd.js') }}"></script>
    <div class="chat">
        <div class="chat__container">
            <div class="chat__content">
                <div class="chat__sidebar chat-sidebar">
                    <div class="chat-sidebar__title">Чаты</div>
                    <div class="chat-sidebar__content" id="chats-container"></div>
                </div>
                <div class="chat__content chat-content">
                    <div class="chat-content-header">
                        <div class="chat-content-header__btn" id="chat-menu-btn">
                            <span> </span><span> </span><span> </span></div>
                    </div>
                    <div class="chat-content__body" id="messages-container">
                        <div class="chat-content-overlay"><h2>Выберите чат </h2></div>
                    </div>
                    <form class="chat-content__form chat-content-form" id="chat-form" action="#"><input
                            class="chat-content-form__input" id="chat-input" type="text" autocomplete="off"
                            placeholder="Введите сообщение">
                        <button class="btn btn--red chat-content-form__submit" id="form-submit" type="submit"><img
                                src="{{ asset('images/send.b8c3f654.svg') }}" alt="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('script')
       <script src="{{asset('js/chat.a5e31bfa.js')}}"></script>
    @endpush
@endsection
