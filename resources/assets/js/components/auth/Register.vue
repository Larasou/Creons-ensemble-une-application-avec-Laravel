<template>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">S'enregstrer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" method="POST" class="ui form">
                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="form.name" type="text" name="name" placeholder="Nom d'utilisateur">
                                <i class="user icon"></i>
                            </div>
                            <div v-if="form.errors.has('name')" class="text-danger">
                                <strong v-html="form.errors.get('name')"></strong>
                            </div>
                        </div>

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="form.email" type="email" name="email" placeholder="Ton email">
                                <i class="at icon"></i>
                            </div>
                            <div v-if="form.errors.has('email')" class="text-danger">
                                <strong v-html="form.errors.get('email')"></strong>
                            </div>
                        </div>

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="form.email_confirmation" type="email" name="email_confirmation" placeholder="Confirme ton email">
                                <i class="at icon"></i>
                            </div>
                            <div v-if="form.errors.has('email')" class="text-danger">
                                <strong v-html="form.errors.get('email')"></strong>
                            </div>
                        </div>

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="form.password" type="password" name="password" placeholder="Ton mot de passe">
                                <i class="lock icon"></i>
                            </div>
                            <div v-if="form.errors.has('password')" class="text-danger">
                                <strong v-html="form.errors.get('password')"></strong>
                            </div>
                        </div>

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="form.password_confirmation" type="password" name="password_confirmation" placeholder="Confirme ton mot de passe">
                                <i class="lock icon"></i>
                            </div>
                            <div v-if="form.errors.has('password')" class="text-danger">
                                <strong v-html="form.errors.get('password')"></strong>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="ui violet icon button">
                                <i class="user icon"></i>
                                S'enregstrer
                            </button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <div class="mt-1">
                        Déjà inscrit ?
                        <a href="/login">
                            <strong class="text-primary">Se connecter</strong>
                        </a>
                    </div>
                    <div class="mt-3 mb-4">
                        <a href="/confirmation" class="text-warning">
                           <strong> Email de confirmation non reçu ?</strong>
                        </a>
                        <a href="/forget" class="ml-3 text-danger">
                           <strong> Mot de passe perdu ?</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Form from '../../core/Form';

    export default {
        name: "Register",
        data() {
            return {
               form: new Form({
                   name: null,
                   email: null,
                   email_confirmation: null,
                   password: null,
                   password_confirmation: null,
                   remember: null
               }),
            }
        },
        methods: {
            submit() {
               axios.post('/register', this.form)
                   .then((response) => {
                      this.form.reset();
                   })
                   .catch((error) => {
                       this.form.errors.record(error.response.data.errors)
                   });
            }
        }
    }
</script>

<style scoped>

</style>