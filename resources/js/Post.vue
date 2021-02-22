<template>
  <div class="container mx-auto px-4 w-full my-12 grid grid-cols-12 gap-4">
    <div class="md:col-span-2 hidden md:block">
      <div class>
        <div v-if="!headersCalculated" class="animate-pulse">
          <div class="w-full h-4 bg-gray-100 dark:bg-gray-700 rounded mb-4"></div>
          <div class="w-full h-4 bg-gray-100 dark:bg-gray-700 rounded"></div>
        </div>
        <div v-else>
          <div
            class="uppercase text-gray-500 dark:text-gray-400 font-medium text-sm lg:text-base"
          >Contents</div>
          <div
            v-for="header in headers"
            :key="header.id"
            class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 text-xs lg:text-sm mt-4 font-medium"
          >
            <a :href="`#${header.id}`">{{ header.title }}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="lg:col-span-8 md:col-span-10 col-span-12">
      <div v-if="$apollo.loading" class="animate-pulse">
        <div
          class="w-full h-8 bg-gray-100 dark:bg-gray-800 rounded mb-4"
          v-for="i in 2"
          :key="`a${i}`"
        ></div>
        <div class="w-full h-16 bg-gray-100 dark:bg-gray-700 rounded mb-4"></div>
        <div
          class="w-full h-8 bg-gray-100 dark:bg-gray-700 rounded mb-4"
          v-for="i in 8"
          :key="`b${i}`"
        ></div>
      </div>

      <div v-else class="border-b border-gray-200 dark:border-gray-700 mb-8">
        <div class="text-base lg:text-lg text-gray-600 dark:text-gray-300">
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
          <span
            v-if="post.created_at !== post.updated_at"
          >&nbsp;• Updated {{ post.updated_at | timeago }}</span>
        </div>

        <h1 class="text-2xl lg:text-5xl mt-10 font-bold mb-12 dark:text-gray-200">{{ post.title }}</h1>

        <div
          ref="content"
          class="text-gray-700 dark:text-gray-300 mb-8 whitespace-pre-line text-lg"
        >
          <span v-html="post.content"></span>
        </div>

        <div class="mb-8 flex">
          <div class="mr-6">
            <img
              :src="'/storage/faces/' + post.author.avatar"
              alt="Author avatar"
              class="w-16 h-16 rounded-full"
            />
          </div>
          <div class="flex flex-col justify-center">
            <div class="text-xl text-gray-600 dark:text-gray-400">
              Written by
              <router-link
                :to="{name: 'author', params: {id: post.author.id}}"
                class="underline hover:text-black dark:hover:text-white"
              >{{ post.author.name }}</router-link>
            </div>
            <div class="text-gray-600 dark:text-gray-400">
              Published in
              <router-link
                :to="{name: 'topic', params: {slug: post.topic.slug}}"
                class="underline hover:text-black dark:hover:text-white"
              >{{ post.topic.name }}</router-link>
              on {{ post.created_at | longDate }}
            </div>
          </div>
        </div>
      </div>

      <SubscribeNewsletter></SubscribeNewsletter>
    </div>

    <div class="col-span-2 hidden lg:block">
      <div class="top-20 sticky">
        <div
          class="uppercase text-gray-500 dark:text-gray-400 font-medium text-xs lg:text-base"
        >Related</div>
        <div
          class="mt-4 rounded-sm border border-gray-100 hover:border-gray-200 dark:border-gray-700 dark:hover:border-gray-600 text-sm text-gray-400 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-300 p-2 flex flex-col items-center text-center select-none cursor-pointer"
        >
          <svg
            class="w-8 h-8 text-indigo-600 dark:text-indigo-400"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
            <path
              fill="#fff"
              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
            />
          </svg>
          Learn Laravel fundamentals in this 33+ hours course!
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
import SubscribeNewsletter from "./components/SubscribeNewsletter";

export default {
  components: { SubscribeNewsletter },
  data() {
    return {
      headers: [],
      headersCalculated: false
    };
  },
  apollo: {
    post: {
      query: gql`
        query($id: ID!) {
          post(id: $id) {
            id
            title
            content
            created_at
            updated_at
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
      },
      error() {
        this.$router.push({ name: "404" });
      },
      result() {
        setTimeout(() => hljs.highlightAll(), 1);
        setTimeout(() => {
          const headers = this.$refs.content.getElementsByTagName("H2");
          this.headers = [];

          for (let i = 0; i < headers.length; i++) {
            this.headers.push({
              title: headers.item(i).innerText,
              id: headers.item(i).getAttribute("id")
            });
          }

          this.headersCalculated = true;
        }, 1);
      }
    }
  },
  mounted() {
    this.headers = [];
  },
  destroyed() {
    this.headers = [];
  }
};
</script>
