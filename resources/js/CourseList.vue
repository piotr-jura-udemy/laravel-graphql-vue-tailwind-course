<template>
  <div class="container mx-auto px-4 w-full md:w-4/5 my-12">
    <div class="grid grid-cols-2 gap-4 border-b border-gray-200 dark:border-gray-700 mb-8 pb-8">
      <course-list-item
        title="Laravel Essentials"
        desc="Learn Laravel fundamentals and more, build a blog application with tags, top posts, images, avatars, translations and more!"
        time="33"
        lessons="201"
        logo="master-laravel.png"
      ></course-list-item>

      <course-list-item
        title="Laravel REST + Vue.js"
        desc="Learn how to mix Laravel with Vue. Build a hotel booking app with user accounts, reviews and owner panel."
        time="18"
        lessons="101"
        logo="laravel-vue.png"
      ></course-list-item>

      <course-list-item
        title="Laravel with GraphQL, Vue and Tailwind"
        desc="A complete guide into making a GraphQL server in Laravel. Making a Vue frontend consuming a GraphQL API. Learn Tailwind."
        time="18"
        lessons="101"
        logo="laravel-gql.png"
      ></course-list-item>

      <course-list-item
        title="Nest.js Course"
        desc="Learn Nest.js fundamentals and build a backend for an Events Managament app."
        time="6"
        lessons="45"
        logo="api.png"
      ></course-list-item>
    </div>

    <SubscribeNewsletter></SubscribeNewsletter>
  </div>
</template>

<script>
import CourseListItem from "./components/CourseListItem";
import SubscribeNewsletter from "./components/SubscribeNewsletter";
export default {
  components: { CourseListItem, SubscribeNewsletter }
};
</script>