<template>
  <div class="row">
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
                      {{ post.full_name }}
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

          <div class="user-post" v-if="post.image">
            <a href="#">
              <img
                :src="post.image"
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
                <post-like-counter
                  :likes_count="post.likes_count"
                  :is_liked="post.is_liked"
                  :post_id="post.id"
                ></post-like-counter>
                <post-comment-counter
                  :count="post.comments.length"
                ></post-comment-counter>
              </div>
            </div>
            <hr />
            <post-comment-list
              ref="refComments"
              :comments="post.comments"
            ></post-comment-list>
            <create-comment
              v-if="is_auth"
              :post_id="post.id"
            ></create-comment>
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
  props: ["username", "is_auth"],
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
    async getAllPosts() {
      await axios
        .get("public/profile/user/" + this.username)
        .then((response) => {
          this.posts = response.data.data;
        })
        .catch((error) => {
          this.errored = true;
          console.error(error);
        })
        .finally(() => (this.loading = false));
    },
  },
  mounted() {
    this.getAllPosts();

    this.$root.$on("refreshProfilePosts", () => {
      this.getAllPosts();
    });
  },
  created() {
    setInterval(() => this.getAllPosts(), 30000);
  },
};
</script>

<style lang="scss" scoped>
</style>