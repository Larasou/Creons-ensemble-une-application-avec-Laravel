<template>
   <div v-show="open" :class="`bg-${color} flash-alert flex sm:rounded lg:rounded-full lg:inline-flex leading-none text-indigo-lightest py-4 px-5`">
       <span v-html="body" class="text-center font-semibold text-lg lg:text-xl">Coucou les gens!</span>
   </div>
</template>

<script>
    export default {
        name: "Flash",
        props: ['message', 'bg'],
        data() {
            return {
                body: null,
                color: this.bg ? this.bg : 'indigo-darkest',
                open: false
            }
        },
        created() {
            if (this.message) {
                this.flash(this.message, this.color);
            }

            window.bus.$on('flash', (message, color = 'blue') => {
                this.flash(message, color);
            })
        },
        methods: {
            flash(message, color = 'indigo-darkest') {
                if (message) {
                    this.open = true;
                    this.body = message;
                    this.color = color;
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
        right: 2rem;
    }
</style>