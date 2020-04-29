<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Notify from 'izitoast';

    export default {
        methods: {
            create({ target }) {
                window.axios.post('/posts', new FormData(target)).then(() => {
                    Notify.success({
                        message: "Post created",
                        position: "topRight"
                    });
                    target.reset();
                });

            }
        }
    }
</script>
