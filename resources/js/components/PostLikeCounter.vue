<template>
  <div>
    <div class="d-flex align-items-center">
      <div class="like-data">
        <div class="dropdown">
          <span
            v-if="is_liked"
            class="dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            role="button"
            @click="dislikePost"
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
          <span
            v-else
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
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

export default {
  props: ["likes_count", "is_liked", "post_id"],
  data() {
    return {
      notyfy : null,
    };
  },
  methods: {
    likePost() {
      let formData = new FormData();
      formData.append("post_id", this.post_id);
      formData.append("is_like", true);

      axios
        .post("user/likes", formData, {
          headers: {
            Accept: "application/json",
          },
        })
        .then((response) => {
          if (response.data.success) {
            this.notyfy.success(response.data.message);
            this.refreshLikes();
          } else {
            this.notyfy.error("Could not like this post at the moment.");
          }
        })
        .catch((error) => {
          this.errored = true;
          console.error(error);
        })
        .finally(() => (this.loading = false));
    },
    dislikePost() {
      let formData = new FormData();
      formData.append("post_id", this.post_id);
      formData.append("is_like", false);

      axios
        .post("user/likes", formData, {
          headers: {
            Accept: "application/json",
          },
        })
        .then((response) => {
          if (response.data.success) {
            this.notyfy.success('You have dislike a post.');
            this.refreshLikes();
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
    refreshLikes(){
        this.$parent.getAllPosts();
    },
  },
  mounted() {
    this.notyfy = new Notyf();
  },
};
</script>

<style lang="scss" scoped>
</style>