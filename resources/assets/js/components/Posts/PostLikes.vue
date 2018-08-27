<template>
    <div class="flex flex-col items-center">
        <a v-if="signedIn" @click="toggle" href="javascript:void(0)" :class="colors">
            <i class="entypo-heart"></i>
        </a>
        <a v-else href="javascript:void(0)" :class="colors">
            <i class="entypo-heart"></i>
        </a>
        <span v-text="count" class="font-bold text-2xl"></span>
    </div>
</template>

<script>
    export default {
        name: "PostLikes",
        props: ['post'],
        data() {
            return {
                active: this.post.isLiked,
                count: this.post.likesCount,
            }
        },
        computed: {
            colors() {
                return ['text-4xl px-2', this.active ? 'text-red hover:text-red' : 'text-grey-darkest hover:text-grey-darkest'];
            },
            endpoint() {
                return this.post.path + '/likes';
            }
        },
        methods: {
            toggle() {
                return this.active ? this.destroy() : this.create();
            },
            create() {
                axios.post(this.endpoint);

                this.count++;

                this.active = true;

                flash("J'aime cet article!", 'blue-dark');
            },
            destroy() {
                axios.delete(this.endpoint);

                this.count--;

                this.active = false;

                flash("Je n'aime plus cet article!", 'orange-dark');
            }
        }
    }
</script>

<style scoped>

</style>