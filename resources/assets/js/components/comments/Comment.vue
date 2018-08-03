<template>
    <div class="flex sm:flex-col md:flex-row mb-4">
        <div class="flex flex-col items-center justify-center sm:mr-0 md:mr-4">
            <img :src="comment.user.avatar" width="75" height="75" :alt="comment.user.name">
            <div class="flex justify-between mt-2">
                <a href="javascript:void(0)">
                    <i class="icon edit"></i>
                </a>
                <a href="javascript:void(0)" class="ml-4">
                    <i class="icon trash"></i>
                </a>
            </div>
        </div>

        <div class="flex flex-col justify-between w-full">
            <div class="mb-2">
                <p v-html="comment.body"></p>
            </div>
            <div class="italic text-grey-darker">
               {{ comment.user.name }} <span class="text-lg">•</span> {{ comment.created_at }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comment",
        props: ['comment'],
        data() {
            return {}
        }
    };
</script>

<style scoped>

</style>