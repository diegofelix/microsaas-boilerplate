import {createRouter, createWebHistory} from 'vue-router';
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Dashboard from "../Views/Dashboard.vue";

const Home = () => import("../Views/Home.vue")
const Championships = () => import("../Views/Championships.vue")
const Login = () => import("../Views/Login.vue")

// Definição das rotas
const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: '/', name: 'home', component: Home },
            { path: 'championships', name: 'championships', component: Championships },
            { path: 'login', name: 'session.create', component: Login },
            { path: 'ranking', name: 'ranking', component: Championships },
            { path: 'ranking', name: 'how-it-works', component: Championships },
        ]
    },
    {
        path: '/dashboard',
        component: DashboardLayout,
        children: [
            { path: '/dashboard', name: 'dashboard', component: Dashboard },
        ]
    },
];

// Criação e exportação do router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
