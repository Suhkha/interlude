<template>
	<div>
        <span class="font-semibold text-violet-500">{{message.user.name}}: </span>{{message.message}}
    </div>
</template>

<script>
	export default{
		props:['message']
	}
</script>