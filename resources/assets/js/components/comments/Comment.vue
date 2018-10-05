<template>
    <div class="flex flex-col md:flex-row mb-4 px-2">
        <div class="flex flex-col mb-3 items-center justify-center sm:mr-0 md:mr-4">
            <img :src="comment.user.avatar" width="75" height="75" :alt="comment.user.name">
            <div v-if="editable" class="flex justify-between mt-2">
                <a @click="state = 'editing'" href="javascript:void(0)">
                    <i class="icon edit"></i>
                </a>
                <a @click="destroy" href="javascript:void(0)" class="ml-4">
                    <i class="icon trash"></i>
                </a>
            </div>
        </div>

        <div v-if="state === 'default'" class="flex flex-col justify-between w-full">
            <div class="mb-2">
                <p v-html="body"></p>
            </div>
            <div class="text-grey-darker text-sm">
                {{ comment.user.name }} <span class="text-lg">•</span> {{ created_at }}
            </div>
        </div>

        <form v-if="state === 'editing'" @submit.prevent="submit" class="w-full">
            <div>
                <textarea name="body"
                          v-model="body"
                          class="h-24 form-comment rounded"
                ></textarea>
            </div>

            <div class="flex justify-end">
                <button class="hover:bg-indigo-darker bg-indigo-darkest uppercase font-bold text-xs rounded text-indigo-lightest py-2 px-4" type="submit">
                    <i class="icon save"></i>
                    Enregistrer
                </button>
                <button @click="resetForm" class="hover:bg-red hover:text-red-lightest border border-red-dark bg-red-lightest uppercase font-bold text-xs rounded text-red py-2 px-4" type="button">
                    Annuler
                    <i class="icon times"></i>
                </button>
            </div>
        </form>

    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "Comment",
        props: ['comment'],
        data() {
            return {
                state: 'default',
                body: this.comment.body
            }
        },
        computed: {
            editable() {
                if (this.signedIn) {
                    return this.user.id === this.comment.user_id || this.modo;
                }
            },
            created_at() {
                return moment(this.comment.created_at).locale('fr').format('ddd Do MMM YYYY à H:mm')
            }
        },
        methods: {
            submit() {
                axios.put(`${location.pathname}/${this.comment.id}`, this.$data)
                    .then(this.onSuccess)
            },
            onSuccess(response) {
                this.$emit('updating', response.data);

                this.state = 'default';

                flash(`Ton commentaire a bien été mise à jour!`, 'green-dark')
            },
            destroy() {
                axios.delete(`${location.pathname}/${this.comment.id}`)
                    .then(() => {
                        this.$emit('deleting', {
                            id: this.comment.id
                        });

                        flash(`Ton commentaire a bien été supprimé!`, 'blue')
                    });
            },
            resetForm() {
                this.state = 'default';
                this.body = this.comment.body;
            }
        }
    };
</script>

<style scoped>

</style>