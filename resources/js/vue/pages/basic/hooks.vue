<template>
	<div>
		<h1 ref="name">Hooks tutorial</h1>
		<h1>{{name}}</h1>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
					name: "saqib"
			}
		},
		beforeCreated(){
			console.log("before_created",this.$refs.name);	
		},
		created(){
			console.log("created",this.$refs.name);	
		},
		mounted(){
			console.log("mounted",this.$refs.name);	
		}
	}
</script>