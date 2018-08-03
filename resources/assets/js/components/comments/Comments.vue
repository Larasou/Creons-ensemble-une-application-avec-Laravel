<template>
    <div class="max-w-3xl mx-auto">
        <div class="my-4">
            <h3 class="text-black">Commentaires</h3>
        </div>

        <div v-for="comment in comments" :key="comment.id">
            <comment :comment="comment"></comment>
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
            this.fetch();
        },
        components: { Comment },
        methods: {
            fetch() {
                axios.get(location.pathname + '/comments')
                    .then((response) => {
                        this.comments = response.data;
                    });
            }
        }
    };
</script>

<style scoped>

</style>