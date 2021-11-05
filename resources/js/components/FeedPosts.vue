<template>
  <div>
    <div class="col-sm-12" v-for="(post, index) in posts" :key="index">
      <div class="card card-block card-stretch card-height">
        <div class="card-body">
          <div class="user-post-data">
            <div class="d-flex justify-content-between">
              <div class="me-3">
                <img
                  class="rounded-circle img-fluid"
                  src="http://localhost:8001/assets/images/user/01.jpg"
                  alt=""
                />
              </div>
              <div class="w-100">
                <div class="d-flex justify-content-between">
                  <div class="">
                    <h5 class="mb-0 d-inline-block">
                      {{ post.fullname }}
                    </h5>
                    <span class="mb-0 d-inline-block">added new post</span>
                    <p class="mb-0 text-primary">
                      {{ post.created_at }}
                    </p>
                  </div>
                  <div class="card-post-toolbar">
                    <div class="dropdown">
                      <span
                        class="dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        role="button"
                      >
                        <i class="ri-more-fill"></i>
                      </span>
                      <div class="dropdown-menu m-0 p-0">
                        <a class="dropdown-item p-3" href="#">
                          <div class="d-flex align-items-top">
                            <i class="ri-close-circle-line h4"></i>
                            <div class="data ms-2">
                              <h6>Delete Post</h6>
                              <p class="mb-0">Delete this post.</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-3" style="white-space: pre-wrap">
            <p>{{ post.free_description }}</p>
          </div>

          <div class="user-post" v-if="post.filename">
            <a href="#">
              <img
                :src="'http://localhost:8001/postimages/' + post.filename"
                alt="post-image"
                class="img-fluid rounded w-100 shadow"
              />
            </a>
          </div>

          <div class="comment-area mt-3">
            <div
              class="
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              "
            >
              <div
                class="like-block position-relative d-flex align-items-center"
              >
                <post-like-counter></post-like-counter>
                <post-comment-counter></post-comment-counter>
              </div>
            </div>
            <hr />
            <post-comment-list></post-comment-list>
            <create-comment></create-comment>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CreateComment from "./CreateComment.vue";
import PostCommentCounter from "./PostCommentCounter.vue";
import PostCommentList from "./PostCommentList.vue";
import PostLikeCounter from "./PostLikeCounter.vue";
export default {
  components: {
    PostCommentCounter,
    PostLikeCounter,
    PostCommentList,
    CreateComment,
  },
  data() {
    return {
      posts: null,
    };
  },
  methods: {
    getAllPosts() {
      axios
        .get("posts")
        .then((response) => {
          console.info(response.data);
          if (response.data.success) {
            Swal.fire({
              title: "Successfully created your post.",
              icon: "success",
            });
            this.description = "";
            this.removeUploadedImage();
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
};
</script>

<style lang="scss" scoped>
</style>