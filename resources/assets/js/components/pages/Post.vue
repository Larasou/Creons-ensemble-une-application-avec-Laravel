
<script>
    import Comments from '../comments/Comments';

    export default {
        name: "Post",
        props: ['post', 'categories'],
        data() {
            return {
                editing: false,
                name: this.post.name,
                body: this.post.body,
                category_id: this.post.category_id,
            }
        },
        components: {Comments},
        methods: {
            isEditing() {
                if (this.editing) return this.editing = false;
                return this.editing = true;
            },
            update() {

            }
        }
    }
</script>

<style scoped>

</style>