import { createRouter, createWebHistory } from 'vue-router';
import admin from './admin';
import home from './home';
import login from './login';
import test from './test';

const routes = [...admin, ...home, ...login, ...test];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;