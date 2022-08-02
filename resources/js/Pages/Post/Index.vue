<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
export default {
    components: {
        Head,
        Pagination,
        Link,
        BreezeAuthenticatedLayout,
    },
    props: {
        posts: Object,
    },
};
</script>

<template>
    <Head title="Posts" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="container mx-auto sm:px-6 lg:px-8">
                <div
                    class="
                        overflow-hidden
                        bg-white
                        shadow-sm
                        sm:rounded-lg
                    "
                >
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="w-full">
                            <thead class="font-bold bg-gray-300 border-b-2">
                            <td class="px-4 py-2">ID</td>
                            <td class="px-4 py-2">Title</td>
                            <td class="px-4 py-2">Description</td>
                            <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                            <tr v-for="post in posts.data" :key="post.id">
                                <td class="px-4 py-2">
                                    {{ post.id }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ post.title }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ post.body }}
                                </td>
                                <td class="px-4 py-2">
                                    <Link :href="route('post.index', { slug: post.slug})">Show More</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6" :links="posts.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

