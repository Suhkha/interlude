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
    methods: {
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
            this.getMessages()
        },

        getMessages() {
            console.log(this.currentChat.id)
            axios.get('chat/'+ this.currentChat.id +'/messages/').then(response => {
                this.messages = response.data;
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