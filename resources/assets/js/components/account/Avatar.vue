<template>
    <div class="flex flex-col items-center justify-center max-w-3xl mx-auto my-5 px-2">
        <div class="flex mb-5 justify-center items-center">
            <img width="150" :src="avatar" :alt="user.name">
        </div>

        <div class="w-full lg:w-3/5">
            <form enctype="multipart/form-data" method="post">
                <div class="my-3 flex flex-col">
                    <label for="avatar" class="bg-input">
                        Choissir un avatar
                    </label>
                    <input @change="onChange" id="avatar" name="avatar" type="file" class="hidden">
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Avatar",
        props: ['user'],
        data() {
            return {
                avatar: this.user.avatar,
            }
        },
        methods: {
            onChange(e) {
                let avatar = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(avatar);

                reader.onload = e => {
                    this.avatar = e.target.result;
                };

                this.update(avatar);
            },
            update($avatar) {
                let data = new FormData();
                data.append('avatar', $avatar);

                axios.post('/account/avatar/' + this.user.name, data)
                    .then(() => {
                        flash("L'avatar a bien été uplodé!");
                    })
            }
        }
    }
</script>

<style scoped>

</style>