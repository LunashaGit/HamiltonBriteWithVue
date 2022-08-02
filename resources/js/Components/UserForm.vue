<script>

export default {
    props: {
        'auth' : Object,
    }
};
</script>

<template>
    <h2>{{ auth.user.username }}</h2>
</template>
