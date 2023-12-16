<template>
    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5">
        <table class="table col-start-4 row-start-3 col-span-8 row-span-11">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Major</th>
                    <th>Course</th>
                    <th>Phone</th>
                    <th>Active</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(member, index) in members" :key="index">
                    <td>
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="../../assets/avt.png" alt="">
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>{{ member.name }}</p>
                    </td>
                    <td>
                        <p>{{ member.birthday }}</p>
                    </td>
                    <td>
                        <p>{{ member.major.Name }}</p>
                    </td>
                    <td>
                        <p>{{ member.course.name }}</p>
                    </td>
                    <td>
                        <p>{{ member.phone }}</p>
                    </td>
                    <td>
                        <p>{{ member.active }}</p>
                    </td>
                    <td>
                        <p>{{ member.role }}</p>
                    </td>
                    <td>
                        <p>{{ member.username }}</p>
                    </td>
                    <td>
                        <button class="btn btn-error" @click.prevent="DeleteMem(member.id)">Delete</button>
                    </td>
                    <td>
                        <a href="#memUpdate" @click="updateMemberId(member.Id, index)" class="btn btn-info">Update</a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <th></th>
            </tfoot>
        </table>
        <a href="#prjCreate" class="btn btn-info col-start-4 col-span-2 row-start-12 z-10">Create</a>
    </div>
    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5">

        <form @submit.prevent="updateMem" id="memUpdate"
            class="col-start-6 col-span-4 row-start-3 row-span-full flex flex-col gap-3 w-full h-full">
            <h3 class="font-bold text-3xl pb-10 text-center">Member Update</h3>

            <label for="name" class="pl-12 text-xl font-bold">Member Name</label>
            <Field type="text" name="name" v-model="updateData.name"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="name" />

            <label for="birthday" class="pl-12 text-xl font-bold">Birthday</label>
            <Field type="date" name="birthday" v-model="updateData.birthday"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="birthday" />

            <label for="major" class="pl-12 text-xl font-bold">Major</label>
            <Field type="text" name="major" v-model="updateData.major"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="major" />

            <label for="course" class="pl-12 text-xl font-bold">Course</label>
            <Field type="text" name="course" v-model="updateData.course"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="course" />

            <label for="phone" class="pl-12 text-xl font-bold">phone</label>
            <Field type="number" name="phone" v-model="updateData.phone"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="phone" />

            <label for="active" class="pl-12 text-xl font-bold">Active</label>
            <Field type="text" name="active" v-model="updateData.active"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="active" />

            <label for="role" class="pl-12 text-xl font-bold">Role</label>
            <Field type="text" name="role" v-model="updateData.role"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="role" />

            <label for="username" class="pl-12 text-xl font-bold">username</label>
            <Field type="text" name="username" v-model="updateData.username"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="username" />
            <button class="btn btn-success text-xl font-bold mx-10" type="submit">Save</button>
        </form>
    </div>

    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5">

        <form @submit.prevent="createPrj" id="prjCreate"
            class="col-start-6 col-span-4 row-start-3 row-span-full flex flex-col gap-3 w-full h-full">
            <h3 class="font-bold text-3xl pb-10 text-center">Create Project</h3>

            <label for="id" class="pl-12 text-xl font-bold">Project Id</label>
            <Field type="text" name="id" v-model="CreateData.id"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="id" />

            <label for="name" class="pl-12 text-xl font-bold">Project Name</label>
            <Field type="text" name="name" v-model="CreateData.name"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="name" />

            <label for="leader" class="pl-12 text-xl font-bold">Leader</label>
            <Field type="text" name="leader" v-model="CreateData.leader"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="leader" />

            <label for="startDate" class="pl-12 text-xl font-bold">Start Date</label>
            <Field type="date" name="startDate" v-model="CreateData.startDate"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="startDate" />

            <label for="endDate" class="pl-12 text-xl font-bold">End Date</label>
            <Field type="date" name="endDate" v-model="CreateData.endDate"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="endDate" />

            <label for="projectSrc" class="pl-12 text-xl font-bold">Project Src</label>
            <Field type="text" name="projectSrc" v-model="CreateData.projectSrc"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="projectSrc" />

            <label for="status" class="pl-12 text-xl font-bold">Status</label>
            <Field type="text" name="status" v-model="CreateData.status"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="status" />
            <button class="btn btn-success text-xl font-bold mx-10" type="submit">Save</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Api, DeleteMember, UpdateProject, CreateProject } from '../../api/api';
import { Form, Field, ErrorMessage } from 'vee-validate';

const members = ref()

const updateData = ref({
    id: '',
    index: "",
    name: '',
    birthday: '',
    major: '',
    course: '',
    phone: '',
    active: '',
    role: '',
    username: ''
})

const CreateData = ref({
    id: '',
    name: '',
    leader: '',
    startDate: '',
    endDate: '',
    projectSrc: '',
    status: '',
})


onMounted(async () => {
    const memberData = await Api.get(`/members`);
    members.value = memberData.data.data;

    console.log(members.value);
})

const updateMemberId = (memberId, index) => {
    updateData.value.id = memberId;
    updateData.value.index = index;
}

const updateMem = async () => {
    try {
        const index = updateData.value.index;

        if (updateData.value.name == '') {
            updateData.value.name = project.value[index].Name
        }
        if (updateData.value.leader == '') {
            updateData.value.leader = project.value[index].Leader
        }
        if (updateData.value.startDate == '') {
            updateData.value.startDate = project.value[index].StartDate
        }
        if (updateData.value.endDate == '') {
            updateData.value.endDate = project.value[index].EndDate
        }
        if (updateData.value.projectSrc == '') {
            updateData.value.projectSrc = project.value[index].ProjectSrc
        }
        if (updateData.value.status == '') {
            updateData.value.status = project.value[index].Status
        }



        console.log(project.value[index].Status)

        const result = await UpdateProject(CreateData.value.name, updateData.value.leader, updateData.value.startDate, updateData.value.endDate, updateData.value.projectSrc, updateData.value.status)
        console.log(result);
    } catch (e) { }
}

const createPrj = async () => {
    try {
        const result = await CreateProject(CreateData.value.id, CreateData.value.name, CreateData.value.leader, CreateData.value.startDate, CreateData.value.endDate, CreateData.value.projectSrc, CreateData.value.status)
        console.log(result);
    } catch (e) { }
}

const DeleteMem = async (a) => {
    await DeleteMember(a)
        .then(function (responsive) {
            window.location.reload();
        })
}
</script>
