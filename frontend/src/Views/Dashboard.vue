<template>
    <div v-if="user">
        <h2>Dashboard, home of the user {{ user.name }}</h2>
    </div>
    <div v-else>
        <h2>Dashboard, home of the user!</h2>
    </div>
</template>
<script setup>
import { useAuthStore } from '../stores/auth.js'
import { computed } from 'vue';

const authStore = useAuthStore()

const user = computed(() => {
    return authStore.user.value
})
</script>
