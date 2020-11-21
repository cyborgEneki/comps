require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App.vue'
import Hello from './views/Hello'
import Home from './views/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/pathway',
            name: 'pathway',
            component: Pathway,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
});
