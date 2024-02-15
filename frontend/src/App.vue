<template>
    <div class="flex-grow">
        <HeaderLayout/>

        <router-view></router-view>
    </div>

    <FooterLayout/>
</template>
<script setup>
import FooterLayout from './components/Layouts/FooterLayout.vue'
import HeaderLayout from "./components/Layouts/HeaderLayout.vue";

</script>
