<template>
  <div>
    <div class="text-2xl font-medium mb-4 text-gray-700 dark:text-gray-200">Subscribe to newsletter</div>
    <div
      class="mb-4 text-gray-700 dark:text-gray-200"
    >Get latest articles, resources directly into your inbox weekly.</div>
    <div v-if="!subscribed">
      <form @submit.prevent="subscribe">
        <input
          v-model="email"
          type="text"
          class="mr-2 border-2 border-gray-200 dark:border-gray-700 rounded-md dark:bg-gray-700 dark:text-gray-200"
        />
        <button
          type="submit"
          class="py-2 px-4 border rounded-md border-gray-200 dark:border-gray-700 dark:bg-gray-900 text-gray-600 dark:text-gray-100"
        >Subscribe</button>
      </form>

      <div
        v-if="error"
        class="text-red-700 dark:text-red-400 pt-2"
      >Something went wrong. You might have already subscribed!</div>
    </div>
    <div
      v-else
      class="pt-2 text-gray-700 dark:text-gray-300"
    >👍&nbsp;&nbsp;Thanks for subscribing! I promise we won't spam! You can unsubscribe at any time!</div>
  </div>
</template>

<script>
import gql from "graphql-tag";
export default {
  data() {
    return {
      email: null,
      subscribed: false,
      error: false
    };
  },
  methods: {
    async subscribe() {
      console.log("Subscribe!");
      this.subscribed = false;

      try {
        await this.$apollo.mutate({
          mutation: gql`
            mutation($email: String!) {
              subscribe(email: $email) {
                id
                created_at
              }
            }
          `,
          variables: {
            email: this.email
          }
        });
        this.subscribed = true;
      } catch (e) {
        console.log(e);
        this.error = true;
      }
    }
  }
};
</script>