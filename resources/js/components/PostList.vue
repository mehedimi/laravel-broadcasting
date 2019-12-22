<template>
    <div>
        <h3 class="mb-4">
            Latest Posts

            <a class="btn btn-success float-right" href="/posts/create">Create</a>
        </h3>
        <div v-for="post in posts" class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">
                    {{ post.content }}
                </p>
                <p class="card-text"><small class="text-muted">Posted By: {{post.user.name}} | Created At {{ post.created_at }} | Last updated {{ post.updated_at }}</small></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            posts: {
                default: () => ({})
            }
        }
    }
</script>
