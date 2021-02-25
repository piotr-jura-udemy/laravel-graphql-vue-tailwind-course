<template>
  <div class="animate-pulse">
    <div
      class="w-full h-8 bg-gray-100 dark:bg-gray-800 rounded mb-4"
      v-for="i in 4"
      :key="`loader-a-${i}`"
    ></div>
    <div class="mb-16"></div>
    <div
      class="w-full h-8 bg-gray-100 dark:bg-gray-700 rounded mb-4"
      v-for="i in 4"
      :key="`loader-b-${i}`"
    ></div>
    <div class="mb-16"></div>
    <div
      class="w-full h-8 bg-gray-100 dark:bg-gray-700 rounded mb-4"
      v-for="i in 4"
      :key="`loader-c-${i}`"
    ></div>
  </div>
</template>