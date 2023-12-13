<script setup>
import { Nav } from "../components/HomeNav.vue";
</script> 

<template>
    <div class="w-screen h-screen">
        <Nav></Nav>
        <router-view></router-view>
    </div>
</template>