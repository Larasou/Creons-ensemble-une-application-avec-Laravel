<template>
   <div class="bg-white rounded shadow-sm">
       <form @submit.prevent="submit" class="w-full my-5">
           <div>
            <textarea name="body"
                      v-model="body"
                      class="form-comment rounded"
                      :class="state === 'editing' ? 'h-24' : 'h-10'"
                      @focus="startEditing"
            ></textarea>
           </div>

           <div v-show="state === 'editing'" class="flex justify-end">
               <button class="hover:bg-indigo-darker bg-indigo-darkest uppercase font-bold text-xs rounded text-indigo-lightest py-2 px-4" type="submit">
                   <i class="icon save"></i>
                   Enregistrer
               </button>
               <button @click="stopEditing" class="hover:bg-red hover:text-red-lightest border border-red-dark bg-red-lightest uppercase font-bold text-xs rounded text-red py-2 px-4" type="button">
                   Annuler
                   <i class="icon times"></i>
               </button>
           </div>
       </form>
   </div>
</template>

<script>
    export default {
        name: "AddComment",
        data() {
            return {
                state: 'default',
                body: null,
            }
        },
        methods: {
            startEditing() {
                this.state = 'editing';
            },
            stopEditing() {
                this.state = 'default';
                this.body = null;
            },
            submit() {
                axios.post(`${location.pathname}/comments`, this.$data)
                    .then(this.onSuccess)
                    .catch(this.onFail);
            },
            onSuccess(response) {
                this.$emit('creating', response.data);

                flash(`Commentaire posté!`, 'blue');

                this.stopEditing();
            },
            onFail() {
                flash(`Commentaire non enregistré désolé!`, "red");
            }
        }
    };
</script>

<style scoped>

</style>