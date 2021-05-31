<template>
    <form class="chat-messager-form" id="chat-form" action="#">
        <input class="chat-messager-form__input" id="chat-input" type="text" placeholder="Введите сообщение"
               v-model="newMessage" @keyup.enter="sendMessage" autocomplete="off">
        <button class="chat-messager-form__submit" id="chat-submit" type="submit" @click="sendMessage"><img
            src="/submit.aae925b9.svg" alt="submit"></button>
    </form>
</template>

<script>
export default {
    props: ['user'],

    data() {
        return {
            newMessage: ''
        }
    },

    mounted() {
        console.log('Component mounted.')
    },

    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                user: this.user,
                message: this.newMessage,
                chat: this.getChat()
            });

            this.newMessage = ''
        },

        getChat() {
            return localStorage.getItem('chat');
        }
    }
}
</script>
