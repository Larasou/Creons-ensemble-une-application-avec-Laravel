
<script>
    import Comments from '../comments/Comments';
    import Like from './PostLikes';

    export default {
        name: "Post",
        props: ['post', 'categories'],
        data() {
            return {
                editing: false,
                name: this.post.name,
                body: this.post.body,
                category_id: this.post.category_id,
                form: {}
            }
        },
        created() {
          this.resetForm();
        },
        components: { Comments, Like },
        methods: {
            editForm() {
                return this.editing = true;
            },
            resetForm() {
                this.form = {
                    name: this.post.name,
                    body: this.post.body,
                    category_id: this.post.category_id,
                };
                 this.editing = false;
            },
            update() {
                axios.patch(`${location.pathname}`, this.form)
                    .then(this.onSuccess)
                    .catch(this.onFail);
            },
            onSuccess(response) {
                window.location = response.data.redirect;
               //this.editing = false;
            },
            onFail(error) {
                console.log(error);
            }
        }
    }
</script>

<style scoped>

</style>