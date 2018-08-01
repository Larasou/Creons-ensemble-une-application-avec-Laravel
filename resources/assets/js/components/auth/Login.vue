<template>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Se connecter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit" @keydown="form.errors.clear($event.target.name)" method="POST" class="ui form">
                        <div v-if="form.errors.has('echec')" class="ui red icon message mt-3">
                            <i class="times icon"></i>
                            <div class="content">
                                <p v-html="form.errors.getError('echec')"></p>
                            </div>
                        </div>
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
                                <input v-model="form.password" type="password" name="password" placeholder="Ton mot de passe">
                                <i class="lock icon"></i>
                            </div>
                            <div v-if="form.errors.has('password')" class="text-danger">
                                <strong v-html="form.errors.get('password')"></strong>
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            <div class="ui checkbox">
                                <input type="checkbox" v-model="form.remember" id="remember" name="remember">
                                <label for="remember">Se souvenir de moi</label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="ui violet icon button">
                                <i class="user icon"></i>
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <div class="mt-1">
                        Pas encore inscrit ?
                        <a href="/register">
                            <strong class="text-primary">S'enregistrer</strong>
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
        name: "Login",
        data() {
            return {
               form: new Form({
                   name: null,
                   password: null,
                   redirect: location.pathname,
                   remember: null
               }),
            }
        },
        methods: {
            submit() {
               axios.post('/signin', this.form)
                   .then((response) => {
                       window.location = response.data.redirect;
                   })
                   .catch((error) => {
                       this.form.errors.record(error.response.data.errors)
                       flash('Ha mince... identifiants inccrectes...', 'red');
                   });
            }
        }
    }
</script>

<style scoped>

</style>