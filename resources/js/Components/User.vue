<script>

export default {
    props: {
        'auth' : Object,
    }
};
</script>
<template>
    <img class="h-1/6 w-1/6 rounded-3xl -mt-10 lg:-mt-16 shadow-2xl" v-bind:src="('storage/images/' + auth.user.profile_picture)" />
    <div class="flex flex-row gap-8 my-2.5">
        <div class="flex flex-col justify-center items-center">
            <h2 class="font-heading font-light text-gray-600">Firstname</h2>
            <h2 class="font-heading">{{ auth.user.firstname }}</h2>
        </div>
        <div class="flex flex-col justify-center items-center">
            <h2 class="font-heading font-light text-gray-600">Lastname</h2>
            <h2 class="font-heading">{{ auth.user.lastname }}</h2>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center mt-2.5 mb-5">
        <h4 class="font-heading font-light text-gray-600">Bio</h4>
        <h5 class="max-w-xs text-justify">{{ auth.user.bio }}</h5>
    </div>
</template>
