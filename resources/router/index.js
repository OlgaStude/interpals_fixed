import {createWebHistory, createRouter} from 'vue-router'

import Home from '../pages/Home.vue'
import Registration from '../pages/Registration.vue'
import Login from '../pages/Login.vue'
import UserPage from '../pages/UserPage.vue'
import Dashboard from '../pages/Dashboard.vue'

export const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'Registration',
        path: '/registration',
        component: Registration
    },
    {
        name: 'UserPage',
        path: '/user/:id',
        component: UserPage
    },
    {
        name: 'Dashboard',
        path: '/dashboard',
        component: Dashboard
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;