<template>
	<div class="w-full">
		<div class="p-2 flex flex-col-reverse overflow-y-scroll">
			<div v-for="(message, index) in messages" :key="index">
				<message-item :message="message"/>
			</div>
		</div>
	</div>
</template>

<script>
import MessageItem from './message.vue';

export default{
		components: { MessageItem },
		props:['messages']
	}
</script>