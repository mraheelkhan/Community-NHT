<template>
  <div>
    <div class="d-flex align-items-center">
      <div class="total-like-block ms-2 me-3">
        <div class="dropdown">
          <span
            class="dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            role="button"
          >
            {{ post.likes }} Likes
          </span>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Max Emum</a>
            <a class="dropdown-item" href="#">Bill Yerds</a>
            <a class="dropdown-item" href="#">Hap E. Birthday</a>
            <a class="dropdown-item" href="#">Tara Misu</a>
            <a class="dropdown-item" href="#">Midge Itz</a>
            <a class="dropdown-item" href="#">Sal Vidge</a>
            <a class="dropdown-item" href="#">Other</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
</style>