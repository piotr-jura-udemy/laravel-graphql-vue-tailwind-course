<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 my-20">
    <h2 class="text-4xl dark:text-gray-200">
      <router-link
        :to="{name: 'index'}"
        class="text-gray-600 dark:text-gray-400 hover:underline"
      >All Posts</router-link>
      <span class="text-gray-600 dark:text-gray-400" v-if="!$apollo.loading">/</span>
      <span v-if="!$apollo.loading">{{ user.name }}</span>
    </h2>
    <div v-if="$apollo.loading"></div>

    <div v-else>
      <PostListItem v-for="post in user.posts" :key="post.id" :post="post" class="mt-10"></PostListItem>
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
    user: {
      query: gql`
        query($id: ID!) {
          user(id: $id) {
            id
            name
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
        }
      `,
      variables() {
        return {
          id: this.$route.params.id
        };
      }
    }
  }
};
</script>