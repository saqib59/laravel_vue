/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import Vue from 'vue';
import App from './vue/app';
import router from './vue/router';
import store from './store';
import ViewUI from 'view-design';
import locale from 'view-design/dist/locale/en-US';
import 'view-design/dist/styles/iview.css';
import common from './common'
import Editor from 'vue-editor-js/src/index';


Vue.use(ViewUI, { locale: locale });
Vue.use(Editor);

Vue.mixin(common);

Vue.config.productionTip = false
Vue.prototype.$user = window.Laravel.user;
Vue.prototype.$userPermission = window.Laravel.permission;


/* eslint-disable no-new */

new Vue({
    el: '#app',
    router,
    store,
    components: { App },
    template: `<App/>`
})