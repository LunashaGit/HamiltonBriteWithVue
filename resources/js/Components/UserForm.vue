<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth : Object,
})

const form = useForm({
    firstname: props.auth.user.firstname,
    lastname: props.auth.user.lastname,
    email: props.auth.user.email,
    username: props.auth.user.username,
    bio: props.auth.user.bio,
})
</script>

<template>
    <transition>
    <form @submit.prevent="form.put('/dashboard/update/' + auth.user.id)" class="flex flex-col">
        <div class="flex flex-row gap-8 my-2.5">
            <div class="flex flex-col justify-center items-center">
                <label for="firstname">
                    Firstname
                </label>
                <input v-model="form.firstname" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            </div>
            <div class="flex flex-col justify-center items-center">
                <label for="lastname">
                    Lastname
                </label>
                <input name="lastname" v-model="form.lastname" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            </div>
        </div>
        <div class="flex flex-row gap-8 my-2.5">
            <div class="flex flex-col justify-center items-center">
                <label for="mail">
                    Mail
                </label>
                <input name="mail" v-model="form.email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
            </div>
            <div class="flex flex-col justify-center items-center">
                <label for="username">
                    Username
                </label>
                <input name="username" v-model="form.username" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
            </div>
        </div>
        <div class="flex flex-col justify-center items-center mt-2.5 mb-5">
            <label for="bio">
                Bio
            </label>
            <textarea name="bio" v-model="form.bio" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none" />
        </div>
        <input type="submit" class="w-1/4 mx-auto cursor-pointer shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
    </form>
        </transition>
</template>
