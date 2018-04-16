<template>
    <form @submit.prevent="submit" action="" method="POST" class="ui form">
        <div class="field">
            <textarea v-model="body" name="body" rows="3"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="ui orange submit icon button">
                <i class="icon comment"></i> Commenter
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "AddComment",
        data () {
            return {
                body: null,
                name: 'hoihoh'
            }
        },
        methods: {
            submit() {
               axios.post(`${location.pathname}/comment`, this.$data).then((response) => {
                   this.$emit('created', response.data);
                   this.body = null;
               });
            }
        }
    }
</script>

<style scoped>

</style>