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
            <div v-for="comment in comments" class="comment">
                <a class="avatar">
                    <img :src="comment.user.avatar">
                </a>
                <div class="content">
                    <a v-text="comment.user.name" class="author"></a>
                    <div class="metadata">
                        <div class="date">
                            {{ comment.created_at }}
                        </div>
                    </div>
                    <div v-text="comment.body" class="text"></div>
                    <div class="actions">
                        <a class="reply">Reply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comments",
        props: ['comments'],
        created() {
            console.log(this.comments);
        }
    }
</script>

<style scoped>

</style>