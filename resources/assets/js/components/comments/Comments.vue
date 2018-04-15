<template>
    <div class="mt-5">
        <div class="ui comments">
            <form action="" method="POST" class="ui form">
                <div class="field">
                    <textarea name="body" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="ui orange submit icon button">
                        <i class="icon comment"></i> Commenter
                    </button>
                </div>
            </form>
            <div v-for="(comment, index) in comments" :key="comment.id" class="comment mb-3">
              <comment :comment="comment" @deleted="remove(index)"></comment>
            </div>
        </div>
    </div>
</template>

<script>
    import Comment from './Comment';

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
        components: { Comment },
        methods: {
            fetch() {
                let uri = `${location.pathname}/comment`;
                axios.get(uri).then((response) => {
                    this.comments = response.data;
                });
            },
            remove(index) {
                return this.comments.splice(index, 1);
            }
        }
    }
</script>

<style scoped>

</style>