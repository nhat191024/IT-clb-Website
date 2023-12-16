<template>
    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5">
        <div
            class="col-start-4 col-span-5 row-start-3 row-span-6 bg-[#2a323b] w-full h-full rounded-3xl  grid grid-cols-6 grid-rows-10">
            <p class="place-self-center text-3xl font-bold">Project</p>
            <div class="row-start-2 col-span-full row-span-full grid grid-cols-6 grid-rows-9">
                <p class="col-start-3 col-span-2 row-start-1 place-self-center  text-4xl font-bold">
                    {{ projectMem?.ProjectInfo.Name }}</p>
                <div class="row-start-2 row-span-3 col-span-3 p-10 place-self-center w-60">
                    <img src="../../assets/logo.png" alt="logo" class="rounded-full">
                </div>
                <div class="row-start-2 row-span-3 col-span-3 place-self-start self-center  text-2xl font-bold">
                    <p>Leader: {{ projectMem?.ProjectInfo.Leader }}</p>
                    <p>Members: {{ MemPrj?.length }}</p>
                    <p>Tasks: {{ projectTask?.length }}</p>
                    <p>Status: {{ projectMem?.ProjectInfo.Status }} </p>
                </div>
                <p class="row-start-5 place-self-center text-3xl font-bold pl-4">Progress</p>
                <div class="row-start-6 row-span-3 col-span-3">
                    <Doughnut :data="data" :options="options" />
                </div>
                <p class="row-start-5  col-start-4 col-span-2 place-self-start self-center text-3xl font-bold">Your Task:
                </p>
                <div
                    class="row-start-6 row-span-3 col-start-4 col-span-3 text-2xl font-bold border-2 mx-6 flex justify-center items-center rounded-xl mt-4">
                    <!--! Bug của vue chưa được chữa -->
                    <!-- <p> {{ projectTask[0]?.Task }}</p> -->
                </div>
                <p class="row-start-9 col-span-full place-content-start self-center font-bold pl-4">Project Time: {{
                    projectMem?.ProjectInfo.StartDate }} - {{ projectMem?.ProjectInfo.EndDate }}</p>
            </div>
        </div>

        <div
            class="col-start-9 row-start-3 col-span-3 row-span-6 bg-[#2a323b] w-full h-full rounded-3xl grid grid-rows-8 grid-cols-2">
            <p class="text-3xl font-bold place-self-center">Members</p>
            <Form class="row-start-2 col-span-full w-full h-full px-10 flex items-center">
                <Field type="text" name="memberSearch" placeholder="search here"
                    class="w-full h-[80%] rounded-xl px-4 border-2 border-black" />
            </Form>
            <div v-for="(member, index) in allMembers" :key="index"
                class="col-span-full flex items-center justify-between px-16">
                <div class="w-12"><img src="../../assets/avt.png" alt="logo"></div>
                <p class="font-bold text-lg">{{ member.username }}</p>
                <div>
                    <font-awesome-icon :icon="['far', 'message']" size="2xl" style="color: #a6adb9;" />
                </div>
            </div>
        </div>

        <div
            class="col-start-4 row-start-9 col-span-5 row-span-3 bg-[#2a323b] w-full h-full rounded-3xl flex flex-col gap-4">
            <p class="text-3xl font-bold pl-4 pt-3">Blog</p>
            <p class="text-2xl font-bold pl-4">Title: {{ blog?.name }}</p>
            <p class="text-1xl font-bold pl-4">View: {{ blog?.view }}</p>
            <div class="flex justify-between">
                <p class="text-1xl font-bold pl-4">Like: {{ blog?.like }}</p>
                <p class="text-2xl font-bold pr-10">Post By: {{ user?.username }}</p>
            </div>
            <div class="flex justify-center gap-20">
                <a class="btn text-1xl font-bold px-8" href="">To The Blog</a>
                <a class="btn text-1xl font-bold px-8" href="">Create New</a>
                <a class="btn text-1xl font-bold px-8" href="">Detail</a>
            </div>
        </div>

        <div class="col-start-9 row-start-9 col-span-3 row-span-3 bg-[#2a323b] w-full h-full rounded-3xl">
            <p class="text-3xl font-bold pl-4 pt-3">Meeting schedules</p>
                <p class="text-center pt-20">You don't have any meeting</p>
  
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { getMemberDataById, getCookie, isLogged, Api} from '../../api/api';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'
import { Form, Field } from 'vee-validate';

isLogged();

const user = ref();
const projectMem = ref();
const MemPrj = ref();
const projectTask = ref();
const allMembers = ref();
const blog = ref();
const id = getCookie('Id');

onMounted(async () => {
    const userData = await getMemberDataById(id);
    user.value = userData;
    const projectMemData = await Api.get(`/projectMembers?Member[eq]=${id}`)
    projectMem.value = projectMemData.data.ProjectMem[0];
    const MemPrjData = await Api.get(`/projectMembers?Project[eq]=${projectMemData.data.ProjectMem[0].ProjectId}`);
    MemPrj.value = MemPrjData.data.ProjectMem;
    const projectTaskData = await Api.get(`/tasks?Project[eq]=${projectMemData.data.ProjectMem[0].ProjectId}`);
    projectTask.value = projectTaskData.data.Task
    const allMem = await Api.get(`/members`);
    allMembers.value = allMem.data.data;
    const blogData = await Api.get(`/blogs?Author[eq]=${id}`);
    blog.value = blogData.data.data[0];
});

ChartJS.register(ArcElement, Tooltip, Legend)

const data = {
    datasets: [
        {
            backgroundColor: ['#41B883', '#2a323b'],
            data: [70, 30]
        }
    ]
}
const options = {
    responsive: true,
    maintainAspectRatio: false
}

</script>