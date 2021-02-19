<template>
  <div>
    <router-link :to="{name: 'post', params: {id: post.id}}">
      <h4 class="text-2xl pb-3 font-semibold hover:underline dark:text-gray-200">{{ post.title }}</h4>
    </router-link>

    <p class="text-gray-600 pb-3 dark:text-gray-400">{{ post.lead }}</p>
    <p class="pb-3 text-indigo-400">
      <router-link :to="{name: 'post', params: {id: post.id}}">Read more →</router-link>
    </p>
    <div class="text-sm text-gray-600 dark:text-gray-400">
      By
      <router-link
        :to="{name: 'author', params: {id: post.author.id}}"
        class="underline hover:text-black dark:hover:text-white"
      >{{ post.author.name }}</router-link>&nbsp;in
      <router-link
        :to="{name: 'topic', params: {slug: post.topic.slug}}"
        class="underline hover:text-black dark:hover:text-white"
      >{{ post.topic.name }}</router-link>
      &nbsp;• {{ post.created_at | timeago }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: Object
  }
};
</script>