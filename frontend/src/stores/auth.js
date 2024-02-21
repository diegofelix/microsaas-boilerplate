import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
    }),

    getters: {
        user: (state) => state.authUser,
        isLoggedIn: (state) => !!state.authUser,
    },

    actions: {
        /**
         * Responsible for logging in the user.
         *
         * @param {Object} credentials
         */
        async login(credentials) {
            await this.setCsrfToken()
            await axios.post('/login', credentials)
        },

        /**
         * Responsible for logging out the user,
         * and clearing the user state.
         *
         * @returns {Promise<void>}
         */
        async logout() {
            await axios.post('/logout')
            this.authUser = null
        },

        /**
         * Responsible for setting the CSRF token on the axios instance.
         *
         * @returns {Promise<void>}
         */
        async setCsrfToken() {
            await axios.get('/sanctum/csrf-cookie')
        },

        /**
         * Responsible for getting the user from the backend.
         * This will set the user state.
         *
         * @returns {Promise<void>}
         */
        async getUser() {
            const response = await axios.get('/api/v1/user')
            this.authUser = response.data
        },
    },
})
