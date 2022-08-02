<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue3';
export default {
    /*data(){
        return{
            title: '1'
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        getData(){
            axios.get('/api/user/' + {title:this.title} )
                .then(res => {
                    console.log(res)
                }).catch(err => {
                console.log(err)
            })
        }
    },*/
    components: {
        Head,
        Pagination,
        Link,
        BreezeAuthenticatedLayout,
    },
    props: {
        post: Object,
        comments: Object,
        users: Object
    },
};
/*const x = axios.get('/api/user/' + 26 )
    .then(res => {
        console.log(res)
    }).catch(err => {
        console.log(err)
    })*/
</script>



<template>
    <Head :title="post.title" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ post.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="container mx-auto sm:px-6 lg:px-8">
                <div
                    class="
                        overflow-hidden
                        bg-white
                        shadow-sm
                        max-w-7xl
                        sm:rounded-lg
                    "
                >
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="w-1/2">
                            {{ post.title }}
                        </div>
                        <div class="w-1/2">
                            <table class="w-full">
                                <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">Username</td>
                                <td class="px-4 py-2">Commentary</td>
                                </thead>
                                <tbody>
                                <tr v-for="comment in comments.data" :key="comment.id">
                                    <td v-for="user in users.data" :key="user.id" class="px-4 py-2"><p v-if="comment.user_id === user.id"> {{ user.username }} </p> </td>
                                    <td class="px-4 py-2">{{ comment.comment }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
