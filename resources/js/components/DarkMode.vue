<template>
  <div class="text-2xl">
    <button
      class="hover:bg-gray-200 dark:hover:bg-gray-500 rounded-sm px-2 py-1 outline-none focus:outline-none"
      @click="toggle"
    >
      <span v-if="!dark">🌝</span>
      <span v-else>🌞</span>
    </button>
  </div>
</template>

<script>
import { toggleDarkMode, getDarkMode, setDarkMode } from "./../app";

export default {
  data() {
    return {
      dark: getDarkMode()
    };
  },
  methods: {
    toggle() {
      let darkMode = getDarkMode();
      setDarkMode(!darkMode);
      this.dark = !darkMode;
      toggleDarkMode();
    }
  }
};
</script>