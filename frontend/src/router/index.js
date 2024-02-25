import {createRouter, createWebHistory} from 'vue-router';
import DefaultLayout from "../Layouts/DefaultLayout.vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";
import Dashboard from "../Views/Dashboard.vue";
import { useAuthStore } from "../stores/auth.js";

const Home = () => import("../Views/Home.vue")
const Championships = () => import("../Views/Championships.vue")
const Login = () => import("../Views/Login.vue")

// Definição das rotas
const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            {
                path: '/',
                name: 'home',
                component: () => import("../Views/Home.vue"),
            },
            {
                path: 'championships',
                name: 'championships',
                component: () => import("../Views/Championships.vue"),
            },
            {
                path: 'login',
                name: 'session.create',
                component: () =>import("../Views/Login.vue")
            },
            {
                path: 'ranking',
                name: 'ranking',
                component: () => import("../Views/Championships.vue")
            },
            {
                path: 'ranking',
                name: 'how-it-works',
                component: () => import("../Views/Championships.vue")
            }
        ]
    },
    {
        path: '/dashboard',
        component: DashboardLayout,
        children: [
            {
                path: '/dashboard',
                name: 'dashboard',
                component: () => import("../Views/Dashboard.vue"),
                meta: {
                    requiresAuth: true
                }
            },
        ],
    },
];

// Criação e exportação do router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    let routeRequiresAuth = to.matched.some(record => record.meta.requiresAuth);
    let userIsAuthenticated = useAuthStore().isLoggedIn;

    console.log(routeRequiresAuth, userIsAuthenticated)

    if (routeRequiresAuth && !userIsAuthenticated) {
        next({ name: 'session.create' })
    } else {
        next()
    }
})

export default router;
