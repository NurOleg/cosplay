<template>
    <div v-if="!this.isFetching">
        <div v-if="this.chatUuid === undefined">
            Выберите чат для общения.
        </div>
        <div v-else>
            <div class="chat-messager-header" id="chat-header">
                <div class="chat-messager-header__menu" id="btn-sidebar"><img
                    src="/images/right-arrow.edc5ce1a.svg" alt="open menu"></div>
                <div class="align-center row">
                    <div v-if="this.chat.user.image !== undefined && this.chat.user.image !== null"
                         class="chat-messager-header__image ibg">
                        <img id="chat-img"
                             :src="'/storage' + this.chat.user.image.path"
                             alt="cosplayer">
                    </div>
                    <div v-else class="chat-messager-header__image ibg">
                        <img id="chat-img"
                             :src="'/images/no-photo.0b72cc78.jpg'"
                             alt="cosplayer">
                    </div>
                    <div class="chat-messager-header__info">
                        <div class="chat-messager-header__title" id="chat-title">
                            {{ this.chat.user.fullname !== undefined ? this.chat.user.fullname : this.chat.user.name }}
                        </div>
                        <!--                        <div-->
                        <!--                            class="chat-messager-header__status chat-messager-header__status&#45;&#45;write">-->
                        <!--                            Не-->
                        <!--                            в-->
                        <!--                            сети-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
            <div v-for="chat in this.$root.chats">
                <div v-if="chat.id === $route.params.uuid" class="chat-messager__content chat-messager-content" id="chat-body">
                    <div class="chat-body__list" id="chat-body__list">
                        <div class="message" v-for="message in chat.messages">

                            <a v-if="message.user.image !== undefined && message.user.image !== null"
                               class="message__img ibg" href="#">
                                <img
                                    :src="'/storage'+ message.user.image.path" alt="cosplayer">
                            </a>

                            <a v-else class="message__img ibg" href="#"> <img
                                :src="'/images/no-photo.0b72cc78.jpg'" alt="cosplayer">
                            </a>

                            <div class="message__content"><a class="message__name" href="#">
                                {{ message.user.fullname !== undefined ? message.user.fullname : message.user.name }}
                            </a>
                                <div class="message__text">{{ message.message }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="chat-messager-form" id="chat-form" action="#" v-on:submit.prevent="sendMessage">
                <input class="chat-messager-form__input" id="chat-input" type="text" placeholder="Введите сообщение"
                       v-model="newMessage" autocomplete="off">
                <button class="chat-messager-form__submit" id="chat-submit" type="submit"><img
                    src="/images/submit.aae925b9.svg" alt="submit"></button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['uuid', 'user'],

    data: function () {
        return {
            chatUuid: undefined,
            chat: undefined,
            newMessage: '',
            isFetching: true,
            messages: []
        }
    },

    async mounted() {
        this.chatUuid = this.chatExists();

        this.$on('messagesent', message => {

            console.log(message)
            axios.post('/personal/chat/messages', message).then(response => {
                console.log(response.data);
            });

            this.fetchMessages(message.chat)
        });

        if (this.chatUuid !== undefined) {
            this.fetchMessages(this.chatUuid);
            this.chat = await this.getChatInfo(this.chatUuid);
            this.isFetching = false;
        }
    },

    methods: {
        chatExists() {
            return this.$route.params.uuid;
        },

        fetchMessages(uuid) {
            axios.get('/personal/chat/' + uuid + '/messages').then(response => {
                Array.from(this.$root.chats).forEach(chat => {
                    if (chat.id === uuid) {
                        chat.messages = response.data
                    }
                });
            });
        },

        sendMessage() {
            this.$emit('messagesent', {
                user: this.user,
                message: this.newMessage,
                chat: this.chatUuid
            });

            this.newMessage = ''
        },

        async fetchChats() {
            const {data} = await axios.get('/personal/chats-fetch');
            console.log(data)
            return data
        },

        async getChatInfo(uuid) {
            const {data} = await axios.get('/personal/chats/info/' + uuid);
            return data
        },
    },
};
</script>
