<template>
  <div>
    PostList
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