<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import UserComponent from '@/Components/User.vue';
import UserComponentForm from '@/Components/UserForm.vue';
export default {
    components: {
        Head,
        Link,
        BreezeAuthenticatedLayout,
        UserComponent,
        UserComponentForm
    },
    props: {
        auth: Object,
    },
    data(){
        return{
            component:"UserComponent"
        }
    },
    methods:{
        toggle : function(){
            if(this.component === "UserComponent") {
                this.component = "UserComponentForm";
            } else {
                this.component = "UserComponent";
            }
        }
    }
};


</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-screen-sm lg:max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                        <component v-bind:is="component" :auth=" auth " />
                        <button class="font-heading p-2 rounded-2xl shadow-blue-200 shadow-2xl" v-on:click="toggle">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

