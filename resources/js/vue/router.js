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
import assignroles from '../admin/pages/assignroles'

Vue.use(Router);

const routes = [
    /*project routes*/
    {
        path: '/',
        component: home,
        name: '/'
    },
    {
        path: '/tags',
        component: tags,
        name: 'tags'
    },
    {
        path: '/category',
        component: category,
        name: 'category'
    },
    {
        path: '/adminusers',
        component: adminusers,
        name: 'adminusers'

    },
    {
        path: '/login',
        component: login,
        name: 'login'

    },
    {
        path: '/roles',
        component: roles,
        name: 'roles'
    },
    {
        path: '/designs',
        component: designs,
        name: 'designs'
    },
    {
        path: '/assignroles',
        component: assignroles,
        name: 'assignroles'
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