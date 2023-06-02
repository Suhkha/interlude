<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <chat-select v-if="currentChat.id" :chats="chats" :currentChat="currentChat"
                v-on:chatChanged="setChat($event)"/>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <message-container :messages="messages"/>
                    <input-message :chat="currentChat" v-on:messageSent="getMessages()"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import MessageContainer from './messageContainer.vue';
import InputMessage from './input.vue';
import ChatSelect from './chatSelect.vue'

export default {
    components: {
        AppLayout,
        MessageContainer,
        InputMessage,
        ChatSelect
    },
    data: function() {
        return {
            chats: [],
            currentChat: [],
            messages: []
        }
    },
    watch:{
        currentChat(actualChat, oldChat){
            if(oldChat.id){
                this.disconnect(oldChat);
            }
            this.connect();
        }
    },
    methods: {
        connect() {
            if(this.currentChat.id) {
                let displayMessages = this;
                this.getMessages();

                window.Echo.private("chat-" + this.currentChat.id)
                    .listen('.message.new', e => {
                    displayMessages.getMessages();
                })
            }
        },
        disconnect(chat) {
            window.Echo.leave("chat-" + chat.id)
        },
        getChats() {
            axios.get('chats').then(response => {
                this.chats = response.data;
                this.setChat(response.data[0]);

            }).catch(error => {
                console.log(error)
            });
        },
        setChat(chat) {
            this.currentChat = chat;
        },

        getMessages() {
            axios.get('chat/'+ this.currentChat.id +'/messages/').then(response => {
                this.messages = response.data;
                console.log(this.messages);
            }).catch(error => {
                console.log(error)
            });
        },
    },
    created() {
        this.getChats();
    }
}
</script>