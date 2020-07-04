<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 mb-20 mt-20">
    <h2 class="text-4xl">All Posts</h2>
    <div v-if="$apollo.loading"></div>
    <div v-else>
      <div v-for="post in posts" :key="post.id">{{ post.id }} is titled: {{ post.title }}</div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";

export default {
  apollo: {
    posts: gql`
      {
        posts {
          id
          title
        }
      }
    `
  }
};
</script>