<template>
    <div class="w-full h-screen grid grid-cols-11 grid-rows-10 gap-3">
        <div class="col-start-5 row-start-3 col-span-3 row-span-6 bg-second rounded-xl">
            <Form @submit="onSubmit" :validation-schema="schema" class="w-full h-full grid grid-cols-3 grid-rows-7 px-10">
                <a href="./" class="col-span-3 row-span-2 w-36 h-36 self-center place-self-center">
                    <img src="../../assets/logo.png" alt="logo" class="rounded-full">
                </a>
                <p class="row-start-3 col-span-3 place-self-center text-white font-bold text-4xl">Đăng Nhập</p>
                <Field type="text" v-model="data.username" name="username" placeholder="Tên Đăng Nhập"
                    class="col-span-full row-start-4 place-self-start w-full h-[60%] bg-white rounded-2xl px-4" />
                <ErrorMessage class="col-span-full row-start-4 self-end pb-3 pl-2 text-red-600" name="username" />
                <p :class="{ 'hidden': auth === 'none' }" class="col-span-full row-start-4 self-end pb-3 pl-2 text-red-600">
                    Login failed wrong username or password</p>
                <Field type="password" v-model="data.password" name="password" placeholder="Mật Khẩu"
                    class="col-span-full row-start-5 place-self-start w-full h-[60%] bg-white rounded-2xl px-4" />
                <ErrorMessage class="col-span-full row-start-5 self-end pb-3 pl-2 text-red-600" name="password" />
                <p :class="{ 'hidden': auth === 'none' }" class="col-span-full row-start-5 self-end pb-3 pl-2 text-red-600">
                    Login failed wrong username or password</p>
                <button type="submit" class="row-start-6 col-start-2 col-span-1 self-start btn btn-outline">Đăng
                    Nhập</button>
                <a href="" class="row-start-6 col-start-2  self-end text-center">Quên Mật Khẩu</a>
            </Form>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { useRouter } from 'vue-router';
import { handledLogin } from '../../api/api.js';

const router = useRouter();

const schema = yup.object({
    username: yup.string().required(),
    password: yup.string().required(),
});

const auth = ref('none');

const data = ref({
    username: '',
    password: ''
})

const onSubmit = async () => {
    try {
        const result = await handledLogin(data.value.username, data.value.password);
        if (result == 'success') {
            router.push('/admin');
        } else {
            auth.value = result;
            setTimeout(() => {
                auth.value = 'none';
            }, 2000);
        }
    } catch (e) { }
}
</script>