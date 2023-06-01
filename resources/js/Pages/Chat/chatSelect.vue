<template>
	<div class="flex justify-between items-center">
        <div>
            <span class="font-semibold">Tema:</span> <span class="font-normal ">{{ selected.name }}</span>
        </div>
		
		<div>
			<select
				v-model="selected"
				@change="$emit('chatChanged', selected)">
				<option v-for="(chat,index) in chats" 
					:key="index" 
					:value="chat">
					{{chat.name}}
				</option>
				
			</select>			
		</div>
	</div>
</template>

<script>
	export default{
		props:['currentChat','chats'],
		data:function(){
			return{
				selected: ''
			}
		},
		created(){
			this.selected = this.currentChat;
		}
	}
</script>