import Vue from 'vue';
import VueRouter from 'vue-router';
import './bootstrap';

window.Vue = Vue;
Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
});
