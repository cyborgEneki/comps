require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App.vue'
import Home from './views/Home.vue'
import PathwayOutcome from './components/PathwayOutcome.vue'
import Milestones from './views/Milestones.vue'
import FinancialInformation from './views/FinancialInformation.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/initiative/:initiativeId',
            name: 'initiative',
            component: Home
        },
        {
            path: '/pathway',
            // path: '/initiative/:initiativeId/pathway/:pathwayId/edit',
            name: 'pathway',
            component: PathwayOutcome,
        },
        {
            path: '/outcome',
            name: 'outcome',
            component: PathwayOutcome,
        },
        {
            path: '/milestones',
            name: 'milestones',
            component: Milestones,
        },
        {
            path: '/financial-information',
            name: 'financial-information',
            component: FinancialInformation,
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