import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import axios from "axios"

// These configuration allows us to use the backend server
// on the same domain as the frontend
axios.defaults.baseURL = 'https://backend.battleroad.local'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const app = createApp(App)
app.use(router)
app.mount('#app')
