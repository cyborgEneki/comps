require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App.vue'
import Home from './views/Home.vue'
import CreateInitiativeIndicator from './components/CreateInitiativeIndicator.vue'
import EditInitiativeIndicator from './components/EditInitiativeIndicator.vue'
import Milestones from './views/Milestones.vue'
import FinancialInformation from './views/FinancialInformation.vue'
import EditInitiative from "./views/EditInitiative.vue";

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
            props: true,
            component: EditInitiative
        },
        {
            path: '/initiative/:initiativeId/create',
            name: 'create-pathway',
            component: CreateInitiativeIndicator,
        },
        {
            path: '/initiative/:initiativeId/pathway/:pathwayId',
            name: 'edit-pathway',
            props: true,
            component: EditInitiativeIndicator,
        },
        {
            path: '/initiative/:initiativeId/create',
            name: 'create-outcome',
            component: CreateInitiativeIndicator,
        },
        {
            path: '/initiative/:initiativeId/outcome/:outcomeId',
            name: 'edit-outcome',
            component: EditInitiativeIndicator,
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