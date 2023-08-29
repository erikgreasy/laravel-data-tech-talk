<script lang="ts" setup>
import {Post} from "@/types";
import {Link} from "@inertiajs/vue3";

interface Props {
    posts: Array<Post>;
}

defineProps<Props>()
</script>

<template>
    <div class="py-10">
        <Link
            href="/posts/create"
            class="bg-blue-600 py-2 px-4 text-white rounded inline-block mb-10 hover:bg-blue-700"
        >
          Create new post
        </Link>

        <div class="space-y-5">
          <article v-for="post in posts" :key="post.slug" class="border rounded p-5 shadow space-y-5">
              <h2 class="font-bold text-xl mb-5">{{ post.title }}</h2>

              <main>{{ post.body}}</main>

              <footer>
                <a href="#" class="text-blue-600">Read more</a>
              </footer>
          </article>
        </div>
    </div>
</template>
