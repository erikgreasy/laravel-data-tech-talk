<script lang="ts" setup>
import {ref} from 'vue';
import { router } from '@inertiajs/vue3'

const post = ref({
    title: 'Moj novy clanok',
    slug: 'moj-novy-clanok',
    body: 'Obsah clanku',
    published_at: '2023-08-01',
})

const storePost = async () => {
    router.post('/posts', post.value)
}
</script>

<template>
    <form @submit.prevent="storePost">
        <div>
            <label for="">
                Title:
                <input type="text" v-model="post.title">
            </label>
        </div>

        <div>
            <label for="">
                Slug:
                <input type="text" v-model="post.slug">
            </label>
        </div>

        <div>
            <label for="">
                Body:
                <textarea v-model="post.body"></textarea>
            </label>
        </div>

        <div>
            <label for="">
                Published at:
                <input type="date" v-model="post.published_at">
            </label>
        </div>

        <button>Submit</button>
    </form>
</template>
