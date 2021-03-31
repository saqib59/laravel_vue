<template>
	<div>
		<p>Total View is {{views}}</p>
		<button @click="plusOne(1)">Increment</button>
		<button @click="plusOne(-1)">Decrement</button>
		<br>
		<br>
		<div v-for="blog in blogs" v-if="blogs.length">
			<h1>{{blog.title}}</h1>
			<p>{{blog.desc}}</p>
		</div>
		<div>
			<h1 v-if="showItem">Show this item if "showItem = true"</h1>
			<h1 v-else>Show this item if "showItem = false"</h1>
		</div>

		<button @click="showItem = !showItem">Show / hide</button>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
					views : 0,
					blogs: [],	
					showItem: false
			}
		},
		methods:{
			plusOne(number){
				this.views += number
			},
		},
		created(){
			// call total views here from the server
			this.views = 100
			/*load posts from server*/
			let posts = [
				{
					'title': 'this is blog title',
					'desc': 'blog description'
				},
				{
					'title': 'this is blog title',
					'desc': 'blog description'
				},
				{
					'title': 'this is blog title',
					'desc': 'blog description'
				}
			];

			this.blogs = posts;
		}
	}
</script>