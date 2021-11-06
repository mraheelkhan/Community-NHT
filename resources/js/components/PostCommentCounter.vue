<template>
  <div>
    <div class="total-comment-block">
      <div class="dropdown">
        <span
          class="dropdown-toggle"
          data-bs-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          role="button"
        >
          {{ count }} Comment
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props : ['count'],
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
</style>