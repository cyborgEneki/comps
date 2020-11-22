require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App.vue'
import Home from './views/Home.vue'
import PathwayOutcomeForm from './components/PathwayOutcome.vue'
import Milestones from './views/Milestones.vue'

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
            component: PathwayOutcomeForm,
        },
        {
            path: '/outcome',
            name: 'outcome',
            component: PathwayOutcomeForm,
        },
        {
            path: '/milestones',
            name: 'milestones',
            component: Milestones,
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
