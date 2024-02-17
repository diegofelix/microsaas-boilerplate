import {createRouter, createWebHistory} from 'vue-router';

const Home = () => import("../Views/Home.vue")
const Championships = () => import("../Views/Championships.vue")

// Definição das rotas
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/championships',
        name: 'championships.index',
        component: Championships
    },
];

// Criação e exportação do router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
