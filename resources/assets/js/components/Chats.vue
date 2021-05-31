<template>
    <div class="chat-content__column chat-content__sidebar chat-sidebar" id="chat-sidebar">
        <div class="chat-sidebar__item chat-item" v-for="chat in chats" v-bind:data-chatid="'chat-' + chat.id"
             @click="setChat(chat.id)">
            <router-link v-bind:to="'/personal/chats/' + chat.id">
                <div class="chat-item__image ibg"><img
                    v-bind:src="'/storage' + chat.user.image.path"
                    alt="cosplayer"></div>
                <div class="chat-item__body">
                    <div class="chat-item__title">
                        {{ chat.user.fullname !== undefined ? chat.user.fullname : chat.user.name }}
                    </div>
                    <div class="chat-item__message">
                        {{ Object.keys(chat.messages).includes(0) ? chat.messages[0].message : '' }}
                    </div>
                    <div class="chat-item__message-count" style="display: none;">3</div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['chats'],

    mounted() {
        console.log('Component mounted.');
    },

    methods: {
        setChat(chatId) {
            localStorage.setItem('chat', chatId)
        }
    }
};
</script>
