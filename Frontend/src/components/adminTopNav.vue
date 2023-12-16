<template>
    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5 absolute">
        <div class="col-start-4 col-span-3 row-span-2 flex flex-col self-center">
            <div class="flex gap-2">
                <p class="text-4xl">Hello,</p>
                <p class="text-4xl font-bold">{{ user?.username }}</p>
            </div>
            <p class="text-xl font-light">Track your projects & new in CLB</p>
        </div>
            <div class="col-start-10 col-span-full row-span-2 flex place-self-center items-center gap-6">
            <font-awesome-icon :icon="['far', 'bell']" size="2xl" style="color: #a6adba;" />
            <font-awesome-icon :icon="['fas', 'gear']" size="2xl" style="color: #a6adba;" />
            <div class="w-20">
                <img src="../assets/iwanaga.jpg" alt="logo" class="rounded-full">
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import { getMemberDataById, getCookie } from '../api/api.js';

const user = ref();

const id = getCookie('Id');

onMounted(async () => {
    const userData = await getMemberDataById(id);
    user.value = userData;
});
</script>