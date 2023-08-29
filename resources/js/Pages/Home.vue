<script lang="ts" setup>
import {Post} from "@/types";

interface Props {
    posts: Array<Post>;
}

defineProps<Props>()
</script>

<template>
    <div style="max-width: 820px; margin: 0 auto;">
        <article v-for="post in posts" :key="post.slug" style="margin-bottom: 100px;">
            <h2>{{ post.title }}</h2>

            <main>{{ post.body}}</main>
        </article>
    </div>
</template>
