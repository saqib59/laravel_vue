<template>
	<div class="todoListContainer">
		<div class="heading">
			<h2 id="title">
				To do List
			</h2>
			<addItemForm v-on:reloadlist="getList()" />
			<list-view :items="items" v-on:reloadlist="getList()" />
		</div> 
	</div>
</template>

<script type="text/javascript">
import addItemForm from "./addTaskForm";
import listView from "./listView";
	export default {
		components:{
			addItemForm,
			listView,
		},
		data(){
			return {
				items:[]
			}
		},
		methods:{
			getList(){
				axios.get('api/items')
				.then(response => {
					this.items = response.data;
				})	
				.catch(error => {
					console.log(error);
				})
			}
		},
		created(){
			this.getList();
		}
	};
</script>
<style scoped>
	.todoListContainer{
		width: 350px;
		margin: auto;
	}
	.heading{
		background: white;
		padding: 10px;
	}
	#title{
		text-align: center;
	}
</style>