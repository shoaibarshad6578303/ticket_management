<template>
    <div>
        <h3 class="text-center">All Posts</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: []
        }
    },
    created() {
        // this.axios
        //     .get('http://localhost:8000/api/posts')
        //     .then(response => {
        //         this.posts = response.data;
        //     });
    },
    methods: {
        // deletePost(id) {
        //     this.axios
        //         .delete(`http://localhost:8000/api/post/delete/${id}`)
        //         .then(response => {
        //             let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
        //             this.posts.splice(i, 1)
        //         });
        // }
    }
}
</script>
