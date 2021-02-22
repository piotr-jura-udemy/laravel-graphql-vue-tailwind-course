<template>
  <div
    class="flex p-4 items-center text-gray-900 dark:text-gray-100 sticky top-0 bg-gradient-to-b from-indigo-100 dark:from-indigo-900"
  >
    <div class="mr-auto flex items-center space-x-8">
      <router-link :to="{name: 'index'}" class="text-xl font-medium mr-10">fado</router-link>
      <router-link
        :to="{name: 'index', hash: '#top'}"
        class="text-gray-800 dark:text-gray-300 font-medium"
      >Posts</router-link>

      <div>
        <div
          ref="topicsMenu"
          @click="toggleTopicsMenu"
          v-on-clickaway="closeTopicsMenu"
          class="text-gray-800 dark:text-gray-300 font-medium group cursor-pointer select-none"
        >
          Topics
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="w-4 h-4 inline-block transition duration-300 ease-in-out transform-gpu group-hover:rotate-180"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"
            />
          </svg>
        </div>
        <div
          class="absolute mt-4 bg-white dark:bg-gray-900 p-4 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 dark:shadow-lg w-96"
          v-show="topicsMenu"
        >
          <router-link
            :to="{name: 'topic', params: {slug: 'laravel'}}"
            class="block hover:bg-gray-50 dark:hover:bg-gray-800 p-4 rounded-md"
          >
            <div class="font-medium text-gray-700 dark:text-gray-300">Laravel</div>
            <div
              class="text-sm text-gray-500"
            >Most popular PHP framework that's a pure pleasure to use.</div>
          </router-link>

          <div class="cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 p-4 rounded-md">
            <div class="font-medium text-gray-700 dark:text-gray-300">Symfony</div>
            <div
              class="text-sm text-gray-500"
            >The OG framework that powers all major PHP frameworks/software.</div>
          </div>

          <div class="cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 p-4 rounded-md">
            <div class="font-medium text-gray-700 dark:text-gray-300">Vue.js</div>
            <div
              class="text-sm text-gray-500"
            >The progressive JavaScript frontend framework. Easy to learn and easy to use.</div>
          </div>

          <div class="cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 p-4 rounded-md">
            <div class="font-medium text-gray-700 dark:text-gray-300">Nest.js</div>
            <div
              class="text-sm text-gray-500"
            >Don't mix with Next.js. Powerful Node.js backend framework.</div>
          </div>
        </div>
      </div>

      <router-link
        :to="{name: 'courses'}"
        class="text-gray-800 dark:text-gray-300 font-medium"
      >Courses</router-link>
      <router-link
        :to="{name: 'courses'}"
        class="text-gray-800 dark:text-gray-300 font-medium"
      >Questions</router-link>
    </div>
    <dark-mode></dark-mode>
  </div>
</template>

<script>
import { directive as onClickaway } from "vue-clickaway";
export default {
  data() {
    return {
      topicsMenu: false
    };
  },
  directives: {
    onClickaway: onClickaway
  },
  methods: {
    toggleTopicsMenu() {
      this.topicsMenu = !this.topicsMenu;
    },
    closeTopicsMenu() {
      this.topicsMenu = false;
    }
  }
};
</script>