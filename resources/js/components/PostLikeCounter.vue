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
            @click="likePost"
          >
            <i
              :class="
                'fa fa-2x ' +
                (is_liked
                  ? 'fa-thumbs-up text-primary'
                  : 'fa-thumbs-o-up text-secondary')
              "
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
  props: ["likes_count", "is_liked", "post_id"],
  data() {
    return {};
  },
  methods: {
    likePost() {
      let formData = new FormData();
      formData.append("post_id", this.post_id);

      axios
        .post("user/likes", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            Accept: "application/json",
          },
        })
        .then((response) => {
          if (response.data.success) {
            this.notyf.success("You have commented on a post.");
            this.description = "";
            this.removeUploadedImage();

            this.refreshComments();
          } else {
            Swal.fire({
              title: "Couldn't created your post, please try again later",
              icon: "error",
            });
          }
        })
        .catch((error) => {
          this.errored = true;
          console.error(error);
        })
        .finally(() => (this.loading = false));
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
</style>