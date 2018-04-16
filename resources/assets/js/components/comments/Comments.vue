<template>
    <div class="mt-5">
        <div class="ui comments">
            <add-comment @created="add"></add-comment>
            <div v-for="(comment, index) in orderByComments" :key="comment.id" class="comment mb-3">
              <comment :comment="comment" @deleted="remove(index)"></comment>
            </div>
        </div>
    </div>
</template>

<script>
    import Comment from './Comment';
    import AddComment from './AddComment';

    export default {
        name: "Comments",
       data() {
            return {
                comments: {}
            }
       },
        created() {
            // console.log(this.comments);
           this.fetch();
        },
        components: { Comment, AddComment },
        computed: {
            orderByComments() {
                return _.orderBy(this.comments, 'created_at', 'desc');
            }
        },
        methods: {
            fetch() {
                let uri = `${location.pathname}/comment`;
                axios.get(uri).then((response) => {
                    this.comments = response.data;
                });
            },
            add(item) {
                return this.comments.push(item);
            },
            remove(index) {
                return this.comments.splice(index, 1);
            }
        }
    }
</script>

<style scoped>

</style>