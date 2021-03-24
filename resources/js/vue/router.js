import Vue from 'vue';
import Router from 'vue-router';
import secondpage from './pages/secondpage'
import hooks from './pages/basic/hooks'
import methods from './pages/basic/methods'
/*project routes*/
import home from './pages/home'
import tags from '../admin/pages/tags'
import category from '../admin/pages/category'
import adminusers from '../admin/pages/adminusers'
import login from '../admin/pages/login'
import roles from '../admin/pages/roles'
import designs from '../admin/pages/designs'

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
    {
        path: '/adminusers',
        component: adminusers
    },
    {
        path: '/login',
        component: login
    },
    {
        path: '/roles',
        component: roles
    },
    {
        path: '/designs',
        component: designs
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