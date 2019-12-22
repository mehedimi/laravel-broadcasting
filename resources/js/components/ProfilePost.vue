<template>
    <div>
        <PostList :posts="posts"/>
    </div>
</template>

<script>
    import PostList from "./PostList";

    export default {
        props: ['userId'],

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
                window.axios.get('/posts').then(({ data }) => {
                    this.posts = data.data;
                });
            },
            registerEvents() {
                window.Echo.private(`posts.${this.userId}`).listen('PostCreated', ({ post}) => {
                    this.posts.unshift(post);
                })
            }
        }
    }
</script>
