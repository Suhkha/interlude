
<template>
    <div class="flex flex-col items-end mt-4">
        <input type="text" 
        v-model="message" 
        @keyup.enter="sendMessage()" 
        placeholder="Type here" 
        class="input input-bordered input-primary w-full border-violet-500" />

        <button @click="sendMessage()" 
        class="bg-violet-500 text-white rounded hover:bg-violet-400 max-w-max py-2 px-8 mt-4">
            Enviar
        </button>
    </div>
</template>

<script>
export default { 
    props: ['chat'],
    data: function () {
        return {
            message: ''
        }
    },
    methods: {
        sendMessage() {
            if(this.message == ''){
                return;
            }

            axios.post('/chat/'+this.chat.id +'/message', {
                message:this.message
            }).then(response => {
                if(response.status == 201) {
                    this.message = '';
                    this.$emit('messageSent')
                }
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>