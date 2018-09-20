<template>
    <div>
        <a @click="toggle" href="javascript:void(0)" :class="colors">
            <i class="entypo-bell"></i>
        </a>
    </div>
</template>

<script>
    export default {
        name: "PostSubscribe",
        props: ['post'],
        data() {
            return {
                active: this.post.isSubscribedTo,
            }
        },
        computed: {
            colors() {
                return [
                    "text-4xl p-2 ",
                    this.active ? "text-red-darkest hover:text-red-darkest" : "text-grey-darkest hover:text-grey-darkest"
                ];
            },
            endpoint() {
                return this.post.path + "/subscribe";
            }
        },
        methods: {
            toggle() {
                return this.active ? this.delete() : this.create();
            },
            create() {
                axios.post(this.endpoint);

                this.active = true;

                flash("Tu es abonné!", 'indigo-darker');
            },
           delete() {
                axios.delete(this.endpoint);

               this.active = false;

               flash("Tun'es plus abonné!", 'red-darker');
           }
        }
    }
</script>

<style scoped>

</style>