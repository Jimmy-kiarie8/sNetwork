
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader

Vue.use(Vuetify, {
  iconfont: 'mdi' // 'md' || 'mdi' || 'fa' || 'fa4'
})
Vue.use(VueRouter) 
Vue.use(Vuetify)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

let myHeader = require('./components/include/Header.vue')
let myView = require('./components/Dashboard.vue')
let myUser = require('./components/users/User.vue')
let myProfile = require('./components/users/Profile.vue')
let myBlog = require('./components/blog/Blog.vue')
let myBlogPost = require('./components/blog/BlogPost.vue')

const routes = [
	{path: '/', component: myView},
	{path: '/users', component: myUser},
	{path: '/blog', component: myBlog},
	{path: '/profile', component: myProfile},
	{path: '/posts', component: myBlogPost},
]

const router = new VueRouter({
// mode: 'history',
	routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components: {
    	myView, myUser, myHeader, myBlog, myProfile, myBlogPost

    }
    
});
  