<template>
    
</template>

<script>
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