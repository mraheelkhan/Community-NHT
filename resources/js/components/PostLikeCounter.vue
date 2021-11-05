<template>
  <div>
    <div class="d-flex align-items-center">
      <div class="like-data">
        <div class="dropdown">
          <span
            class="dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            role="button"
          >
            <i 
            :class="'fa fa-2x ' + 
                    (is_liked ? 'fa-thumbs-up text-primary' : 'fa-thumbs-o-up text-secondary')"
            ></i>
          </span>
        </div>
      </div>
      <div class="total-like-block ms-2 me-3">
        <div class="dropdown">
          <span
            class="dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            role="button"
          >
            {{ likes_count }} Likes
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["likes_count", "is_liked"],
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
</style>