<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 my-12" id="top">
    <h2 class="text-4xl dark:text-gray-200 font-medium">All Posts</h2>

    <PostListLoader v-if="$apollo.loading"></PostListLoader>
    <div v-else>
      <PostListItem v-for="post in posts.data" :key="post.id" :post="post" class="mt-10"></PostListItem>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
import PostListItem from "./components/PostListItem";
import PostListLoader from "./loaders/PostListLoader";

export default {
  components: {
    PostListItem,
    PostListLoader
  },
  apollo: {
    posts: gql`
      {
        posts {
          data {
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
      }
    `
  }
};
</script>