<template>
  <div>
    <div class="comment-text d-flex align-items-center mt-3">
      <input
        type="text"
        class="form-control rounded"
        placeholder="Enter Your Comment"
        @keyup.enter="create_comment"
        v-model="description"
      />

      <div class="comment-attagement d-flex">
        <!-- <a><i class="ri-user-smile-line me-3"></i></a> -->
        <!-- <a href="javascript:void();" v-on:click="openImageUploadBrowse"
          ><i class="ri-camera-line me-3"></i
        ></a> -->
      </div>
      <hr />
      <input
        type="file"
        style="visibility: hidden; display: none"
        ref="refImageUploadComment"
        name="img[]"
        id="imageUpload"
        @change="imagePreview"
        accept="image/*"
      />
    </div>
    
    <div v-if="url" class="w-100">
      <hr />
      <img :src="url" id="preview" class="img-thumbnail w-100" />
      <a class="btn btn-soft-primary w-100" @click="removeUploadedImage">
        <span> <i class="fa fa-times"></i></span>
      </a>
    </div>
  </div>
</template>

<script>
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

export default {
  props: ["post_id"],
  data() {
    return {
      description: "",
      image: null,
      url: null,
      data: {},
      notyf : null,
    };
  },
  methods: {
    create_comment() {
      let formData = new FormData();
      formData.append("description", this.description);
      formData.append("image", this.image);
      formData.append("post_id", this.post_id);
      
      axios
        .post("user/comments", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            Accept: "application/json",
          },
        })
        .then((response) => {
          if (response.data.success) {
            this.notyf.success('You have commented on a post.');
            this.description = "";
            this.removeUploadedImage();

            this.refreshComments()
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
    openImageUploadBrowse(e) {
      const elem = this.$refs.refImageUploadComment;
      elem.click();
    },
    imagePreview(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.image = file;
    },
    removeUploadedImage(e) {
      this.url = null;
      this.image = null;
    },
    refreshComments(){
        this.$parent.getAllPosts();
    },
  },
  mounted() {
    this.notyf = new Notyf();
      
  },
};
</script>

<style lang="scss" scoped>
</style>