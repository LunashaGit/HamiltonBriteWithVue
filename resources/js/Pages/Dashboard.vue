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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                        <img class="h-1/6 w-1/6 rounded-full" v-bind:src="('storage/images/' + auth.user.profile_picture)" />
                        <component v-bind:is="component" :auth=" auth " />
                        <button v-on:click="toggle">Toggle</button>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

