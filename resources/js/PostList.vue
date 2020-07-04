<template>
  <div>PostList</div>
</template>

<script>
import gql from "graphql-tag";

export default {
  apollo: {
    posts: gql`
      {
        posts {
          id
          title
        }
      }
    `
  }
};
</script>