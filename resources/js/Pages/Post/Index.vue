<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import CreatePost from '@/Components/CreatePost.vue';

export default {
    components: {
        CreatePost,
        Head,
        Pagination,
        Link,
        BreezeAuthenticatedLayout,
    },
    props: {
        posts: Object,
        categories: Object,
    },
    data(){
        return {
            login: false,
            CreatePost
        }
    },
    methods:{
        toggle : function(){
            this.login = this.login === false;
        }
    }
};
</script>

<template>
    <Head title="Posts" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Posts
            </h2>
            <button @click="toggle">
                Click
            </button>
        </template>

        <div class="py-12">
            <div class="container mx-auto sm:px-6 lg:px-8">
                <div
                    class="
                        flex
                        flex-row
                        justify-center
                        items-center
                    "
                >
                    <div v-for="post in posts.data" :key="post.id" class=" w-96 h-60 my-12 gap-5  bg-white border-b border-gray-200 flex flex-col justify-between items-center mx-12">
                        <img class="h-36 w-36 -mt-10 lg:-mt-16 shadow-2xl" v-bind:src="('storage/images/' + post.image)" />
                        <h2 class="text-center">
                            {{ post.title }}
                        </h2>
                        <p class="text-center">
                            {{ post.body }}
                        </p>
                        <Link :href="route('post.index', { slug: post.slug})">Show More</Link>
                    </div>
                    <transition
                        enter-active-class="duration-300 ease-out"
                        enter-from-class="transform opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="duration-200 ease-in"
                        leave-from-class="opacity-100"
                        leave-to-class="transform opacity-0"
                    >
                        <div  v-if="login" class="w-full flex flex-col justify-center items-center z-50 absolute inset-0 bg-neutral-600/50">
                            <button class="absolute top-10 right-10" @click="toggle">
                                Click
                            </button>
                            <component :categories="categories" v-bind:is="CreatePost" />
                        </div>
                    </transition>
                    <pagination class="mt-6" :links="posts.links" />
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

