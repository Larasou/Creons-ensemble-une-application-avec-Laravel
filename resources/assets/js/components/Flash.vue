<template>
    <div v-show="open" class="flash-alert ui container grid">
        <div class="ui teal message eight wide column">
           <p v-html="body"></p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Flash",
        props: ['message'],
        data() {
            return {
                body: null,
                open: false
            }
        },
        created() {
            this.flash(this.message);
        },
        methods: {
            flash(message) {
                if (message) {
                    this.open = true;
                    this.body = message;
                    this.hide();
                }
            },
            hide() {
                setTimeout(() => {
                    this.open = false;
                }, 5000);
            }
        }
    };
</script>

<style scoped>
    .flash-alert {
        position: fixed;
        bottom: 3rem;
        left: 2rem;
    }
</style>