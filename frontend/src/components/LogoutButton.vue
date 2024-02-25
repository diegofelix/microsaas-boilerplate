<template>
    <MenuItem v-slot="{ active }">
        <a href="#" @click="logout" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign out</a>
    </MenuItem>
</template>
<script setup>
import router from "../router/index.js"
import { MenuItem } from '@headlessui/vue'
import { useAuthStore } from '../stores/auth.js'

const authStore = useAuthStore()

const logout = () => {
    authStore.logout()
    router.push({ name: 'session.create'})
}
</script>
