<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 my-20">
    <h2 class="text-4xl">All Posts</h2>
    <div v-if="$apollo.loading"></div>

    <div v-else>
      <PostListItem v-for="post in posts" :key="post.id" :post="post" class="mt-10"></PostListItem>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
import PostListItem from "./components/PostListItem";

export default {
  components: {
    PostListItem
  },
  apollo: {
    posts: gql`
      {
        posts {
          id
          title
          lead
          created_at
          author {
            id
            name
          }
          topic {
            name
            slug
          }
        }
      }
    `
  }
};
</script>