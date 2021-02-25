<template>
  <div class="border-gray-100 dark:text-gray-50 rounded-md p-6">
    <div
      class="text-base md:text-xl lg:text-2xl text-gray-600 dark:text-gray-100 font-semibold pb-4"
    >{{ title }}</div>
    <div class="text-gray-600 dark:text-gray-300 text-sm lg:text-base">
      <img :src="'/storage/logos/' + logo" alt="Author avatar" class="w-full h-full" />
      <div class="mt-8">
        <div>{{ desc }}</div>
        <div class="text-indigo-400">Learn more! →</div>
      </div>
    </div>
    <div class="flex space-x-2 text-sm md:text-base mt-8">
      <div class="text-gray-600 dark:text-gray-300 flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          class="w-4 h-4 inline mr-1"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
        {{ time }} hours
      </div>
      <div class="text-gray-600 dark:text-gray-300 md:flex items-center">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          class="w-4 h-4 inline mr-1"
        >
          <path
            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"
          />
        </svg>
        {{ lessons }} Lessons
      </div>
      <div class="p-1 bg-indigo-100 rounded-md">Intermediate</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "desc", "time", "lessons", "logo"]
};
</script>
