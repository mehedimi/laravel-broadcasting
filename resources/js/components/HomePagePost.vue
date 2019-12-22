<template>
    <div>
        <PostList :posts="posts"/>
    </div>
</template>

<script>
    import PostList from "./PostList";

    export default {
        components: {
            PostList
        },

        data() {
            return {
                posts: []
            }
        },
        mounted() {
            this.getPosts();
            this.registerEvents();
        },
        methods: {
            getPosts() {
                window.axios.get('/').then(({ data }) => {
                    this.posts = data.data;
                });
            },
            registerEvents() {
                window.Echo.channel('posts').listen('PostCreated', ({ post }) => {
                    this.posts.unshift(post);
                });
            }
        }
    }
</script>
