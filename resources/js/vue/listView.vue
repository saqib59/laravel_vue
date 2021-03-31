<template>
	<div>
		<div v-for="(item, index) in items" :key="index">
			<list-item :item="item" class="item" v-on:itemChanged="$emit('reloadlist')" />
		</div>
	</div>
</template>
<script type="text/javascript">
	import listItem from "./listItem"; 
	
	export default{
		props: ['items'],
		components: {
			listItem
		}
	};
</script>
<style type="text/css">
	.item{
		background: #e6e6e6;
		padding: 5px;
		margin-top: 5px;
	}
</	style>