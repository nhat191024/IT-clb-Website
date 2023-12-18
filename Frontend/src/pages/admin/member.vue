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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Active</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>JoinDate</th>
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
                        <p>{{ member.email }}</p>
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
                        <p>{{ member.joinDate }}</p>
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
        <a href="#memCreate" class="btn btn-info col-start-4 col-span-2 row-start-12 z-10">Create</a>
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

            <label for="email" class="pl-12 text-xl font-bold">Email</label>
            <Field type="text" name="email" v-model="updateData.email"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="email" />

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

            <label for="joinDate" class="pl-12 text-xl font-bold">JoinDate</label>
            <Field type="date" name="course" v-model="updateData.joinDate"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="joinDate" />
            <button class="btn btn-success text-xl font-bold mx-10" type="submit">Save</button>
        </form>
    </div>

    <div class="w-full h-screen grid grid-cols-12 grid-rows-12 gap-5">

        <form @submit.prevent="createMem" id="memCreate"
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

            <label for="email" class="pl-12 text-xl font-bold">Email</label>
            <Field type="text" name="email" v-model="updateData.email"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="email" />

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

            <label for="joinDate" class="pl-12 text-xl font-bold">JoinDate</label>
            <Field type="date" name="course" v-model="updateData.joinDate"
                class="h-10 rounded-xl mx-10 px-4 text-lg text-white border-2 border-white bg-[#1d232a]" />
            <ErrorMessage name="joinDate" />
            <button class="btn btn-success text-xl font-bold mx-10" type="submit">Save</button>
        </form>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { Api, DeleteMember, UpdateProject, CreateProject, UpdateMember } from '../../api/api';
import { Form, Field, ErrorMessage } from 'vee-validate';

const members = ref()

const updateData = ref({
    id: '',
    index: "",
    name: '',
    birthday: '',
    major: '',
    course: '',
    email: '',
    phone: '',
    active: '',
    role: '',
    username: '',
    joinDate: ''
})

const CreateData = ref({
    id: '',
    index: "",
    name: '',
    birthday: '',
    major: '',
    course: '',
    email: '',
    phone: '',
    active: '',
    role: '',
    username: '',
    joinDate: ''
})


onMounted(async () => {
    const memberData = await Api.get(`/members`);
    members.value = memberData.data.data;

    console.log(memberData.data.data);
})

const updateMemberId = (memberId, index) => {
    updateData.value.id = memberId;
    updateData.value.index = index;
}

const updateMem = async () => {
    try {
        const index = updateData.value.index;

        if (updateData.value.name == '') {
            updateData.value.name = project.value[index].name
        }
        if (updateData.value.birthday == '') {
            updateData.value.birthday = project.value[index].birthday
        }
        if (updateData.value.major == '') {
            updateData.value.major = project.value[index].Major.Name
        }
        if (updateData.value.course == '') {
            updateData.value.course = project.value[index].course.name
        }
        if (updateData.value.email == '') {
            updateData.value.email = project.value[index].email
        }
        if (updateData.value.phone == '') {
            updateData.value.phone = project.value[index].phone
        }
        if (updateData.value.active == '') {
            updateData.value.active = project.value[index].active
        }
        if (updateData.value.role == '') {
            updateData.value.role = project.value[index].role
        }
        if (updateData.value.username == '') {
            updateData.value.username = project.value[index].username
        }
        if (updateData.value.joinDate == '') {
            updateData.value.joinDate = project.value[index].joinDate
        }

        const result = await UpdateMember(updateData.value.id, updateData.value.name, updateData.value.birthday, updateData.value.major, updateData.value.course, updateData.value.email, updateData.value.phone, updateData.value.active, updateData.value.role, updateData.value.username, updateData.value.joinDate)
            .then(function (responsive) {
                window.location.reload();
            })
        console.log(result);
    } catch (e) {
        console.log(e);
    }
}

const createMem = async () => {
    try {
        const result = await CreateMember(CreateData.value.name, CreateData.value.birthday, CreateData.value.major, CreateData.value.course, CreateData.value.email, CreateData.value.phone, CreateData.value.active, CreateData.value.role, CreateData.value.username, CreateData.value.joinDate)
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
