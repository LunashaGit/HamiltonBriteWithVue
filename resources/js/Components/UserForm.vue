<script>

export default {
    props: {
        'auth' : Object,
    }
};
</script>

<template>
    <h2 class="font-heading font-bold">{{ auth.user.username }}</h2>
</template>
