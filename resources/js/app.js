import ChatMessages from "../assets/js/components/ChatMessages";

require('./bootstrap');

import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

Vue.component('chat-messages', require('../assets/js/components/ChatMessages.vue').default);
Vue.component('chat-form', require('../assets/js/components/ChatForm.vue').default);
Vue.component('chats', require('../assets/js/components/Chats.vue').default);

const routes = [
    {
        path: '/personal/chats/:uuid', component: ChatMessages
    }
];

const router = new VueRouter({
    routes: routes,
    mode: "history"
})

const app = new Vue({
    el: '#app',
    router,

    data: {
        messages: [],
        chats: []
    },

    async created() {
        //this.fetchMessages();
        this.chats = await this.fetchChats();

        Array.from(this.chats).forEach(chat => {
            let uuid = chat.id.toString();
            Echo.private(uuid)
                .listen('MessageSent', (e) => {
                    if (uuid === e.chat) {
                        chat.messages.push({
                            message: e.message.message,
                            user: e.user
                        });

                        if (e.user.name !== undefined) {
                            chat.executant_unreaded_messages_count = chat.executant_unreaded_messages_count + 1;
                        } else {
                            chat.customer_unreaded_messages_count = chat.customer_unreaded_messages_count + 1;
                        }
                    }
                });
        })
    },

    methods: {
        async fetchChats() {
            const {data} = await axios.get('/personal/chats-fetch');
            console.log(data)
            return data
        },

        //async fetchMessages() {
        //    await axios.get('/personal/chat/messages').then(response => {
        //        this.messages = response.data;
        //    });
        //},

        addMessage(message) {
            this.messages.push(message);

            axios.post('/personal/chat/messages', message).then(response => {
                console.log(response.data);
            });
        },
    }
}).$mount('#app');
