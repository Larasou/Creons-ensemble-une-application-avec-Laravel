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
                    <form @submit.prevent="submit" method="POST" class="ui form">

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="name" type="text" name="name" placeholder="Nom d'utilisateur">
                                <i class="user icon"></i>
                            </div>
                        </div>

                        <div class="fourteen wide field">
                            <div class="ui left icon input">
                                <input v-model="password" type="password" name="password" placeholder="Ton mot de passe">
                                <i class="lock icon"></i>
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            <div class="ui checkbox">
                                <input type="checkbox" v-model="remember" id="remember" name="remember">
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
    export default {
        name: "Login",
        data() {
            return {
                name: null,
                password: null,
                redirect: location.pathname,
                remember: null
            }
        },
        methods: {
            submit() {
               axios.post('/signin', this.$data)
                   .then((response) => {
                       window.location = response.data.redirect;
                   });
            }
        }
    }
</script>

<style scoped>

</style>