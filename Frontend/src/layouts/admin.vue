<template>
    <div>
        <TopNav></TopNav>
        <SideNav></SideNav>
        <router-view></router-view>
    </div>
</template>
<script setup>
import SideNav from '../components/adminSideNav.vue';
import TopNav from '../components/adminTopNav.vue';
</script>