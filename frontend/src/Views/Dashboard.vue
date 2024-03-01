<template>
    <router-link :to="{ name: 'register-championship' }"
                 class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Criar um campeonato</router-link>
</template>

<script setup>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
import { useAuthStore } from '../stores/auth.js'
import { computed } from 'vue';

const authStore = useAuthStore()

const user = computed(() => {
    return authStore.user.value
})
</script>
