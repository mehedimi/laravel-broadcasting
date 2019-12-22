<template>
    <div></div>
</template>

<script>
    export default {
        mounted() {
            window.Echo.join('users');
        }
    }
</script>
