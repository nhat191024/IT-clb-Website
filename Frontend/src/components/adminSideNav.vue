<template>
    <div class="h-screen w-[420px] fixed grid grid-rows-12 bg-base-200 rounded-box">

        <div class="row-span-2 flex items-center justify-center gap-3">
            <div class="w-14">
                <img src="../assets/logo.png" alt="logo" class="rounded-full">
            </div>
            <div>
                <p class="text-white text-xl font-bold">Fpoly Hp IT ClB</p>
            </div>
        </div>

        <ul class="menu w-full h-full row-start-3 row-span-7 place-content-center gap-6 text-xl font-bold">
            <li>
                <router-link :to="{ name: 'dashboard' }" :class="{ 'active': activeTab === 'dashboard' }"
                    @click="setActiveTab('dashboard')">
                    <font-awesome-icon :icon="['fas', 'bars']" style="color: #a6adba;" size="xl" />
                    Dashboard
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'projects' }" :class="{ 'active': activeTab === 'project' }"
                    @click="setActiveTab('project')">
                    <font-awesome-icon :icon="['fas', 'folder']" size="xl" style="color: #a6adba;" />
                    Projects
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'tasks' }" :class="{ 'active': activeTab === 'task' }"
                    @click="setActiveTab('task')">
                    <font-awesome-icon :icon="['fas', 'list-check']" size="xl" style="color: #a6adba;" />
                    Tasks
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'members' }" :class="{ 'active': activeTab === 'member' }"
                    @click="setActiveTab('member')">
                    <font-awesome-icon :icon="['fas', 'user-group']" size="xl" style="color: #a6adba;" />
                    Members
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'blogs' }" :class="{ 'active': activeTab === 'blog' }"
                    @click="setActiveTab('blog')">
                    <font-awesome-icon :icon="['fas', 'blog']" size="xl" style="color: #a6adba;" />
                    Blogs
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'meets' }" :class="{ 'active': activeTab === 'meet' }"
                    @click="setActiveTab('meet')">
                    <font-awesome-icon :icon="['fas', 'video']" size="xl" style="color: #a6adba;" />
                    Meets
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'home-page' }" @click="onClick">
                    <font-awesome-icon :icon="['fas', 'right-from-bracket']" size="xl" style="color: #a6adba;" />
                    Logout
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { logout } from '../api/api.js';
import { useRouter } from 'vue-router';

const router = useRouter();

const activeTab = ref('dashboard');

function setActiveTab(tabName) {
    activeTab.value = tabName;
}

let date = new Date();
const expires = new Date(date.getTime() + 0);

const onClick = async () => {
    try {
        const result = await logout();

        if (result == 'success') {
            router.push('/');
        }
    } catch (e) { }
}
</script>
