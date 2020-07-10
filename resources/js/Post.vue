<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 mt-20">
    <div v-if="$apollo.loading">Loading...</div>
    <div v-else>
      <div class="text-lg text-gray-600">
        By
        <router-link
          :to="{name: 'author', params: {id: post.author.id}}"
          class="underline hover:text-black"
        >{{ post.author.name }}</router-link>in
        <router-link
          :to="{name: 'topic', params: {slug: post.topic.slug}}"
          class="underline hover:text-black"
        >{{ post.topic.name }}</router-link>&nbsp;• 3 hours ago
      </div>

      <h1 class="text-5xl mt-10 font-bold mb-12">{{ post.title }}</h1>

      <p class="text-gray-700 pb-3 mb-12 whitespace-pre-line">{{ post.content }}</p>

      <div class="mb-24 flex">
        <div class="mr-6">
          <img
            :src="'/storage/faces/' + post.author.avatar"
            alt="Author avatar"
            class="w-16 h-16 rounded-full"
          />
        </div>
        <div class="flex flex-col justify-center">
          <div class="text-xl text-gray-600">
            Written by
            <router-link
              :to="{name: 'author', params: {id: post.author.id}}"
              class="underline hover:text-black"
            >{{ post.author.name }}</router-link>
          </div>
          <div class="text-gray-600">
            Published in
            <router-link
              :to="{name: 'topic', params: {slug: post.topic.slug}}"
              class="underline hover:text-black"
            >{{ post.topic.name }}</router-link>&nbsp;on May 19, 2020
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
export default {
  apollo: {
    post: {
      query: gql`
        query($id: ID!) {
          post(id: $id) {
            id
            title
            content
            author {
              id
              name
              avatar
            }
            topic {
              name
              slug
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