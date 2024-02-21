<template>
    <h2>Dashboard home</h2>
</template>
<script setup>
import { useAuthStore } from '../stores/auth.js'
import { onMounted } from "vue";

onMounted(() => {
    const authStore = useAuthStore()

    authStore.getUser().then((user) => {
        console.log(user)
    })
})
</script>
