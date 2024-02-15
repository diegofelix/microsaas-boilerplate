import { createApp } from 'vue'
import { createRouter, createWebHashHistory } from 'vue-router'
import './style.css'
import App from './App.vue'

import Home from "./components/Pages/Home.vue"
import Championships from "./components/Pages/Championships.vue";

const routes = [
    { path: '/', component: Home },
    { path: '/championships', component: Championships },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
})

const app = createApp(App)

app.use(router)

app.mount('#app')
