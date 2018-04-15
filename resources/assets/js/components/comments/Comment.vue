<template>
    <div>
        <a class="avatar">
            <img :src="comment.user.avatar">
        </a>
        <div class="content">
           <div class="d-flex justify-content-between">
               <div>
                   <a v-text="comment.user.name" class="author"></a>
                   <div class="metadata">
                       <div class="date">
                           {{ comment.created_at }}
                       </div>
                   </div>
               </div>
               <div>
                   <a @click="isEdited" href="javascript:void(0)">
                       <i class="olive pencil icon"></i>
                   </a>
                   <a @click="destroy" href="javascript:void(0)">
                       <i class="red trash icon"></i>
                   </a>
               </div>
           </div>
            <div v-if="editing === false" v-text="body" class="text"></div>
            <form @submit.prevent="update" v-else action="" method="POST" class="ui form">
                <div class="field">
                    <textarea v-model="body" name="body" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="small ui olive submit icon button">
                        <i class="icon comment"></i> Mettre à jour
                    </button>
                    <button @click="isEdited" type="button" class="small ui orange submit icon button">
                        <i class="icon close text-white"></i> Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comment",
        props: ['comment'],
        data() {
            return {
                editing: false,
                body: this.comment.body,
            }
        },
        methods: {
            isEdited() {
                if (this.editing === false) return this.editing = true;
                return this.editing = false;
            },
            update() {
                let uri = `${location.pathname}/${this.comment.id}/comment`;
               axios.patch(uri, {
                   body: this.body
               }).then((response) => {
                   this.editing = false;
               });
            },
            destroy() {
                let uri = `${location.pathname}/${this.comment.id}/comment`;
                axios.delete(uri);
            }
        }
    }
</script>

<style scoped>

</style>