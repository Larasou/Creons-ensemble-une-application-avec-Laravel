<template>
    <div class="max-w-3xl mx-auto">
        <div class="my-4">
            <h3 class="text-black">
               {{ message }}
            </h3>
        </div>

        <add-comment @creating="created"></add-comment>

        <div v-for="comment in comments" :key="comment.id">
            <comment :comment="comment" @updating="updated" @deleting="deleted"></comment>
        </div>
    </div>
</template>

<script>
    import Comment from './Comment';
    import AddComment from './AddComment';

    export default {
        name: "Comments",
        props: ['post'],
        data() {
            return {
                comments: {},
                count: this.post.commentsCount,
            }
        },
        created() {
            this.fetch();
        },
        components: { Comment, AddComment },
        computed: {
            message() {
                if (this.count <= 1)
                    return this.count + ' commentaire';
                return this.count + ' commentaires';
            }
        },
        methods: {
            fetch() {
                axios.get(this.post.path + '/comments')
                    .then((response) => {
                        this.comments = response.data;
                    });
            },
            created($event) {
                this.comments.unshift($event);

                this.count++;
            },
            updated($event) {
                let index = this.comments.findIndex((element) => {
                    return $event.id === element.id;
                });

                this.comments[index].body = $event.body;
            },
            deleted($event) {
                let index = this.comments.findIndex((element) => {
                    return $event.id === element.id;
                });

               this.comments.splice(index, 1);

                this.count--;
            }
        }
    };
</script>

<style scoped>

</style>