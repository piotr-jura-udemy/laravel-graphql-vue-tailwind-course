<template>
  <div>
    <router-link :to="{name: 'post', params: {id: post.id}}">
      <h4 class="text-2xl pb-3 font-semibold hover:underline">{{ post.title }}</h4>
    </router-link>

    <p class="text-gray-600 pb-3">{{ post.lead }}</p>
    <div class="text-sm text-gray-600">By Piotr Jura&nbsp;in Links&nbsp;• 3 hours ago</div>
  </div>
</template>
<script>
export default {
  props: {
    post: Object
  }
};
</script>