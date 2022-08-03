<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue3';
export default {
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
                                    <div v-if="comment.post_id === post.id">
                                        <div v-for="user in users.data" :key="user.id">
                                            <td v-if="comment.user_id === user.id"> {{ user.username }} </td>
                                        </div>
                                        <td class="px-4 py-2">{{ comment.comment }}</td>
                                    </div>

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
