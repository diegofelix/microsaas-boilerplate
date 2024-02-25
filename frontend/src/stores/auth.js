import { defineStore } from 'pinia'
import axios from 'axios'
import { computed, ref } from 'vue';

export const useAuthStore = defineStore('auth',  () => {
    const authUser = ref(JSON.parse(localStorage.getItem('authUser')) || null)
    const user = computed(() => authUser)
    const isLoggedIn = computed(() => !!authUser.value)

    async function login(credentials) {
        await setCsrfToken()
        await axios.post('/login', credentials)
        await getUser()
    }

    async function getUser() {
        const response = await axios.get('/api/v1/user')
        authUser.value = response.data
        localStorage.setItem('authUser', JSON.stringify(response.data))
    }

    function logout() {
        authUser.value = null
        localStorage.removeItem('authUser')
    }

    async function setCsrfToken() {
        await axios.get('/sanctum/csrf-cookie')
    }

    return {
        authUser,
        user,
        isLoggedIn,
        login,
        logout,
        setCsrfToken,
        getUser
    }
})
