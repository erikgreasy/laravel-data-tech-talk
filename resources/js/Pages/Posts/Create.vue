<script lang="ts" setup>
import AppInput from "@/components/AppInput.vue";
import AppTextarea from "@/components/AppTextarea.vue";
import {useForm} from "@inertiajs/vue3";

const post = useForm({
    title: 'Moj novy clanok',
    slug: 'moj-novy-clanok',
    body: 'Obsah clanku',
    published_at: '2023-08-01',
})

const storePost = async () => {
  post.clearErrors()

  post.post('/posts')
}
</script>

<template>
    <form @submit.prevent="storePost" class="py-10">
        <AppInput v-model="post.title" label="Title:" :error="post.errors.title" />

        <AppInput v-model="post.slug" label="Slug:" :error="post.errors.slug" />

        <AppTextarea v-model="post.body" label="Body:" :error="post.errors.body"/>

        <AppInput type="date" v-model="post.published_at" label="Published at:" :error="post.errors.published_at" />

        <button class="bg-blue-600 px-10 py-3 rounded block w-full text-white hover:bg-blue-700">Submit</button>
    </form>
</template>
