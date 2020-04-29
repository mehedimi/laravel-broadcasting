<template>
    <div>
        <PostList :posts="posts"/>
    </div>
</template>

<script>
    import PostList from "./PostList";
    import Notify from 'izitoast'

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
                    Notify.success({
                        message: `New post publish from ${post.user.name}`,
                        position: 'topRight'
                    })
                });
            }
        }
    }
</script>
