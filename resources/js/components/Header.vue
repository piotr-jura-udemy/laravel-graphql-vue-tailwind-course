<template>
  <div class="flex px-8 py-2 items-center text-gray-100 top-0 bg-indigo-900">
    <div class="mr-auto flex items-center space-x-8">
      <router-link :to="{name: 'index'}" class="text-xl font-medium mr-10">fado</router-link>
      <router-link :to="{name: 'index', hash: '#top'}" class="text-gray-200 font-medium">Posts</router-link>

      <div>
        <div
          ref="topicsMenu"
          @click="showTopicsMenu"
          v-on-clickaway="closeTopicsMenuNow"
          class="text-gray-200 font-medium group cursor-pointer select-none"
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

        <transition name="appear">
          <div
            class="absolute mt-4 bg-white dark:bg-gray-900 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 dark:shadow-lg w-2/5"
            v-show="topicsMenu"
          >
            <div class="grid grid-cols-3">
              <div class="col-span-2 border-r border-gray-200 dark:border-gray-700 p-4">
                <router-link
                  :to="{name: 'topic', params: {slug: 'laravel'}, hash: '#top'}"
                  class="block hover:bg-gray-50 dark:hover:bg-gray-800 p-2 rounded-md"
                >
                  <div class="font-medium text-gray-700 dark:text-gray-300">Laravel</div>
                  <div class="text-xs text-gray-500">Most popular PHP framework</div>
                </router-link>

                <div class="cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 p-2 rounded-md">
                  <div class="font-medium text-gray-700 dark:text-gray-300">Vue.js</div>
                  <div class="text-xs text-gray-500">The progressive JavaScript frontend framework</div>
                </div>

                <router-link
                  :to="{name: 'topic', params: {slug: 'docker'}, hash: '#top'}"
                  class="block hover:bg-gray-50 dark:hover:bg-gray-800 p-2 rounded-md"
                >
                  <div class="font-medium text-gray-700 dark:text-gray-300">Docker</div>
                  <div class="text-xs text-gray-500">Run software in isolated containers</div>
                </router-link>
              </div>
              <div class="p-4">
                <div class="text-gray-700 dark:text-gray-300">Other Topics</div>
                <div class="text-gray-600 dark:text-gray-400 text-sm">
                  <div class="py-1">JavaScript</div>
                  <div class="py-1">TypeScript</div>
                  <div class="py-1">Node.js</div>
                  <div class="py-1">PHP</div>
                  <div class="py-1">Tailwind</div>
                  <div class="py-1">Servers</div>
                  <div class="py-1 text-gray-400 dark:text-gray-500">More...</div>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>

      <div>
        <router-link
          :to="{name: 'courses'}"
          class="text-gray-200 font-medium group cursor-pointer select-none"
        >Courses</router-link>
      </div>
    </div>
    <dark-mode></dark-mode>
  </div>
</template>

<script>
let timeout = null;
let els = [];

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
    showTopicsMenu() {
      this.coursesMenu = false;
      clearTimeout(timeout);
      this.hideSticky();
      this.topicsMenu = !this.topicsMenu;
    },
    closeTopicsMenu() {
      console.log("hide");
      timeout = setTimeout(() => {
        this.topicsMenu = false;
        this.showSticky();
      }, 500);
    },
    closeTopicsMenuNow() {
      console.log("hide now");
      this.topicsMenu = false;
    },
    hideSticky() {
      if (0 === els.length) {
        els = document.getElementsByClassName("sticky-hidden");
      }

      for (let i = 0; i < els.length; i++) {
        els.item(i).style.visibility = "hidden";
      }
    },
    showSticky() {
      if (els.length) {
        for (let i = 0; i < els.length; i++) {
          els.item(i).style.visibility = "visible";
        }

        els = [];
      }
    }
  }
};
</script>

<style scoped>
.appear-enter-active,
.appear-leave-active {
  transition: all 100ms ease-in-out;
}
.appear-enter,
.appear-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
