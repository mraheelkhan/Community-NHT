<template>
  <div>
    <ul class="post-comments list-inline p-0 m-0">
      <li class="mb-2" v-for="(comment, index) in comments" :key="index">
        <div class="d-flex">
          <div class="user-img">
            <img
              src="http://localhost:8001/assets/images/user/02.jpg"
              alt="userimg"
              class="avatar-35 rounded-circle img-fluid"
            />
          </div>
          <div class="comment-data-block ms-3">
            <h6>{{ comment.commenter_full_name }}</h6>
            <p class="mb-0"> 
                {{ comment.free_description }}
            </p>
            <div class="">
            <img
                v-if="comment.image_url"
              :src="comment.image_url"
              alt="comment image"
              class="m-10 w-50"
            />
            </div>
            <div class="d-flex flex-wrap align-items-center comment-activity">
              <a href="javascript:void();">like</a>
              <a href="javascript:void();">reply</a>
              <span> {{ comment.created_at_human_diff }}</span>
            </div>
            
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
    props: ['comments'],
    data() {
        return {
        }
    },
};
</script>

<style lang="scss" scoped>
</style>