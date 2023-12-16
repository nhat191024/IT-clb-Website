<script setup>
import Nav from "../components/HomeNav.vue";
import Footer from "../components/homeFooter.vue";

</script> 

<template>
    <div class="">
        <Nav></Nav>
        <router-view></router-view>
        <Footer></Footer>
    </div>
</template>