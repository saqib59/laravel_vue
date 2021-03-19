import Vue from 'vue';
import Router from 'vue-router';
import secondpage from './pages/secondpage'
import hooks from './pages/basic/hooks'
import methods from './pages/basic/methods'
		/*project routes*/
import home from './pages/home'
import tags from '../admin/components/pages/tags'
import category from '../admin/components/pages/category'
Vue.use(Router);

const routes = [
		/*project routes*/
	{
		path: '/',
		component: home
	},
	{
		path: '/tags',
		component: tags
	},
	{
		path: '/category',
		component: category
	},
	// /*hooks*/
	// {
	// 	path: '/hooks',
	// 	component: hooks
	// },
	/*more basics*/
	// {
	// 	path: '/methods',
	// 	component: methods
	// }
]

export default new Router({
	mode: 'history',
	routes
})