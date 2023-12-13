import { createRouter, createWebHistory } from 'vue-router';
import admin from './admin';
import home from './home';

const routes = [...admin, ...home];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;