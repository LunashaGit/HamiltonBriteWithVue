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
        users: Object,
    },
};
</script>

<template>
    <Head title="Posts" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Users
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
                            <td class="px-4 py-2">Username</td>
                            <td class="px-4 py-2">Firstname</td>
                            <td class="px-4 py-2">Lastname</td>
                            <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                            <tr v-for="user in users.data" :key="user.id">
                                <td class="px-4 py-2">
                                    {{ user.username }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ user.firstname }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ user.lastname }}
                                </td>
                                <td class="px-4 py-2">
                                    <Link :href="route('user.index', { username: user.username})">Show More</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination class="mt-6 flex justify-center" :links="users.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

