<template>
    <div class="chat-content__column chat-content__sidebar chat-sidebar" id="chat-sidebar">
        <div class="chat-sidebar__item chat-item" v-for="chat in chats" v-bind:data-chatid="'chat-' + chat.id"
             @click="setChat(chat.id)">
            <router-link v-bind:to="'/personal/chats/' + chat.id">
                <div v-if="chat.user.image !== undefined && chat.user.image !== null" class="chat-item__image ibg">

                    <img
                        :src="'/storage' + chat.user.image.path"
                        alt="cosplayer">
                </div>
                <div v-else class="chat-item__image ibg">
                    <img
                        :src="'/images/no-photo.0b72cc78.jpg'"
                        alt="cosplayer">
                </div>

                <div class="chat-item__body">
                    <div class="chat-item__title">
                        {{ chat.user.fullname !== undefined ? chat.user.fullname : chat.user.name }}
                    </div>
                    <div class="chat-item__message">
                        {{ Object.keys(chat.messages).includes(0) ? chat.messages[0].message : '' }}
                    </div>
                    <div v-if="chat.user.fullname !== undefined && chat.customer_unreaded_messages_count > 0" class="chat-item__message-count">
                        {{ chat.customer_unreaded_messages_count}}
                    </div>
                    <div v-else-if="chat.user.name !== undefined && chat.executant_unreaded_messages_count > 0" class="chat-item__message-count">
                        {{ chat.executant_unreaded_messages_count}}
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['chats'],

    mounted() {
        console.log('qqqqq');
    },

    methods: {
        setChat(chatId) {
            Array.from(this.$root.chats).forEach(chat => {
                if(chat.id === chatId) {
                    chat.executant_unreaded_messages_count = 0;
                    chat.customer_unreaded_messages_count = 0;
                }
            });
            localStorage.setItem('chat', chatId)
        }
    }
};
</script>
