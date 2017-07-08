
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue'
import Vuetify from 'vuetify'
 
Vue.use(Vuetify)

Vue.component('example', require('./components/Example.vue'));
Vue.component('links', require('./components/Link.vue'));
Vue.component('preview', require('./components/Preview.vue'));
Vue.component('material', require('./components/material.vue'));
Vue.component('categories', require('./components/categories.vue'));
Vue.component('categorieslist', require('./components/categoriesList.vue'));
/**Vue.component('favorite', require('./components/Favorite.vue'));
Vue.component('test', require('./components/test.vue'));*/
/*Vue.http.options.emulateJSON = true;*/
const app = new Vue({
    el: '#app'
});