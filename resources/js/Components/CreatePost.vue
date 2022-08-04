<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import { onMounted } from "vue";
import axios from "axios";

const props = defineProps({
    categories : Object,

});
const form = useForm({
    title:null,
    category_id:null,
    excerpt:null,
    body:null,
    date_start:null,
    date_end:null,
    start_hour:null,
    end_hour:null,
    address:null,
    latitude:null,
    longitude:null,
    image:null,
})
Inertia.post(`/posts/create/`, {
    _method: 'post',
    forceFormData: true,
    image: form.image,
})
onMounted(() => {
    console.log('Component Enabled')
})

function addCoord(){
    var requestOptions = {
        method: 'GET',
    };

    fetch(`https://api.geoapify.com/v1/geocode/search?text=${form.address}&apiKey=25619b21b202429aaddbfd5efb7bd368`, requestOptions)
        .then(response => response.json())
        .then(result => {
            console.log(result)
            form.latitude = result.features[0].geometry.coordinates[1]
            form.longitude = result.features[0].geometry.coordinates[0]
            })
        .catch(error => console.log('error', error));
        console.log(form.address)
}
</script>

<template>
        <form @submit.prevent="form.post('/posts/create/')" enctype="multipart/form-data" class="flex flex-col py-4 px-6 bg-slate-50 overflow-hidden">
            <div class="flex flex-row gap-8 justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                <label for="title">
                    Title
                </label>
                <input name="title" v-model="form.title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
                <div class="flex flex-col justify-center items-center">
                <label for="summary">
                    Summary
                </label>
                <input name="summary" v-model="form.excerpt" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
            </div>
            <div class="flex flex-col justify-center items-center mt-2.5 mb-5">
                <label for="category_id">
                    Category
                </label>
                <select name="category_id" v-model="form.category_id" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none">
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{category.id}} {{category.name}}
                    </option>
                </select>
            </div>
            <div class="flex flex-col justify-center items-center mt-2.5 mb-5">
                <label for="body">
                    Body
                </label>
                <textarea name="body" v-model="form.body" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none" />
            </div>
            <div class="flex flex-row gap-8 my-2.5 justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <label for="date_start">
                        Date Start
                    </label>
                    <input type="date" name="date_start" v-model="form.date_start" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
                </div>
                <div class="flex flex-col justify-center items-center">
                    <label for="date_end">
                        Date End
                    </label>
                    <input type="date" name="date_end" v-model="form.date_end" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
                </div>
            </div>
            <div class="flex flex-row gap-8 my-2.5 justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                    <label for="hour_start">
                        Starting Time
                    </label>
                    <input type="Time" name="date_start" v-model="form.start_hour" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
                </div>
                <div class="flex flex-col justify-center items-center">
                    <label for="hour_end">
                        Ending Time
                    </label>
                    <input type="time" name="hour_end" v-model="form.end_hour" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
                </div>
            </div>
            <div class="flex flex-row gap-8 justify-center items-center">
                <div class="flex flex-col justify-center items-center">
                <label for="latitude">
                    Latitude
                </label>
                <input name="latitude" v-model="form.latitude" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
                <div class="flex flex-col justify-center items-center">
                <label for="longitude">
                    Longitude
                </label>
                <input name="longitude" v-model="form.longitude" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                </div>
            </div>
            <div class="flex flex-col justify-center items-center mt-2.5 mb-5">
                <label for="address">
                    Address
                </label>
                <textarea @change="addCoord" name="address" v-model="form.address" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 resize-none" />
            </div>
            <label
                class="border-gray-300 text-sm choose-file rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 dark:bg-gray-700 dark:border-gray-500 text-gray-400"
                for="image">

                <input @input="form.image = $event.target.files[0]" class="hidden" type="file" id="image"
                       name="image" placeholder="">

            </label>
            <input type="submit" class="w-1/4 mx-auto cursor-pointer shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
        </form>
</template>
