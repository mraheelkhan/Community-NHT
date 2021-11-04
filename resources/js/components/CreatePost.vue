<template>
  <div class="col-sm-12">
    <div id="post-modal-data" class="card card-block card-stretch card-height">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title">
          <h4 class="card-title">Create Post</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="user-img">
            <img
              src="http://localhost:8001/assets/images/user/1.jpg"
              alt="userimg"
              class="avatar-60 rounded-circle"
            />
          </div>
          <form
          @submit.prevent="createPost"
            class="post-text ms-3 w-100"
            data-bs-toggle="modal"
            data-bs-target="#post-modal"
            action="javascript:void();"
          >
            <textarea
              class="form-control rounded"
              placeholder="Write something here..."
              style="border: 1px solid gray"
              v-model="description"
              ref="refTextAreaDescription"
              v-on:input="auto_grow(this)"
            ></textarea>

            <input
              type="file"
              style="visibility: hidden"
              ref="refImageUpload"
              name="img[]"
              id="imageUpload"
              @change="imagePreview"
              accept="image/*"
            />

            <div v-if="url" class="w-100">
                <img  :src="url" id="preview" class="img-thumbnail w-100" />
                <a class="btn btn-soft-primary w-100" @click="removeUploadedImage">
                    <span> <i class="fa fa-times"></i></span>
                </a>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-8">
                    <ul class="post-opt-block d-flex list-inline m-0 p-0 flex-wrap">
              <li class="me-3 mb-md-0 mb-2">
                <a
                  href="#"
                  class="btn btn-soft-primary"
                  v-on:click="openImageUploadBrowse"
                  id="file"
                >
                  <img
                    src="http://localhost:8001/assets/images/small/07.png"
                    alt="icon"
                    class="img-fluid me-2"
                  />
                  Photo
                </a>
              </li>
              <!-- <li class="me-3 mb-md-0 mb-2">
            <a href="#" class="btn btn-soft-primary">
              <img
                src="http://localhost:8001/assets/images/small/07.png"
                alt="icon"
                class="img-fluid me-2"
              />
              Video
            </a>
          </li> -->
            </ul>
              </div>
              <div class="col-md-4">
                <div class="text-right">
                    <ul class="post-opt-block list-inline m-0 p-0">
                  <li class="me-3 mb-md-0 mb-2 float-right">
                    <input 
                    type="submit"
                      class="btn btn-success"
                    value="Post now"
                    >
                      
                    
                  </li>
                    </ul>
                </div>
              </div>
            </div>
          
          </form>
        </div>
      </div>
      <!-- <div
        class="modal fade"
        id="post-modal"
        tabindex="-1"
        aria-labelledby="post-modalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="post-modalLabel">Create Post</h5>
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                <i class="ri-close-fill"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <div class="user-img">
                  <img
                    src="http://localhost:8001/assets/images/user/1.jpg"
                    alt="userimg"
                    class="avatar-60 rounded-circle img-fluid"
                  />
                </div>
                <form class="post-text ms-3 w-100" action="javascript:void();">
                  <input
                    v-model="description"
                    type="text"
                    class="form-control rounded"
                    placeholder="Write something here..."
                    style="border: none"
                  />
                </form>
              </div>
              <hr />
              

              <ul
                class="d-flex flex-wrap align-items-center list-inline m-0 p-0"
              >
                <li class="col-md-6 mb-3">
                  <div class="bg-soft-primary rounded p-2 pointer me-3">
                    <a href="#"></a
                    ><img
                      src="http://localhost:8001/assets/images/small/07.png"
                      alt="icon"
                      class="img-fluid"
                    />
                    Photo
                  </div>
                </li>
                <li class="col-md-6 mb-3">
                  <div class="bg-soft-primary rounded p-2 pointer me-3">
                    <a href="#"></a
                    ><img
                      src="http://localhost:8001/assets/images/small/07.png"
                      alt="icon"
                      class="img-fluid"
                    />
                    Video
                  </div>
                </li>
              </ul>
              <hr />
              <div class="other-option">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <div class="user-img me-3">
                      <img
                        src="http://localhost:8001/assets/images/user/1.jpg"
                        alt="userimg"
                        class="avatar-60 rounded-circle img-fluid"
                      />
                    </div>
                    <h6>Your Story</h6>
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
                        <span class="btn btn-primary">Friend</span>
                      </span>
                      <div class="dropdown-menu m-0 p-0">
                        <a class="dropdown-item p-3" href="#">
                          <div class="d-flex align-items-top">
                            <i class="ri-save-line h4"></i>
                            <div class="data ms-2">
                              <h6>Public</h6>
                              <p class="mb-0">Anyone on or off Facebook</p>
                            </div>
                          </div>
                        </a>
                        <a class="dropdown-item p-3" href="#">
                          <div class="d-flex align-items-top">
                            <i class="ri-close-circle-line h4"></i>
                            <div class="data ms-2">
                              <h6>Friends</h6>
                              <p class="mb-0">Your Friend on facebook</p>
                            </div>
                          </div>
                        </a>
                        <a class="dropdown-item p-3" href="#">
                          <div class="d-flex align-items-top">
                            <i class="ri-user-unfollow-line h4"></i>
                            <div class="data ms-2">
                              <h6>Friends except</h6>
                              <p class="mb-0">Don't show to some friends</p>
                            </div>
                          </div>
                        </a>
                        <a class="dropdown-item p-3" href="#">
                          <div class="d-flex align-items-top">
                            <i class="ri-notification-line h4"></i>
                            <div class="data ms-2">
                              <h6>Only Me</h6>
                              <p class="mb-0">Only me</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-block w-100 mt-3">
                Post
              </button>
            </div>
          </div>
        </div>
      </div>  -->
    </div>
  </div>
</template>

<script>
import UploadImages from "vue-upload-drop-images";
export default {
  name: "create-post",
  components: { UploadImages },
  data() {
    return {
      description: null,
      image: null,
      url: null,
    //   url: "https://res.cloudinary.com/practicaldev/image/fetch/s--wwG30Vvz--/c_imagga_scale,f_auto,fl_progressive,h_900,q_auto,w_1600/https://dev-to-uploads.s3.amazonaws.com/i/c3sn0s6qqp1w4ze20wgx.png",
    };
  },
  methods: {
    handleImages(files) {
      console.log("here");
      console.log(files);
    },
    openImageUploadBrowse(e) {
      const elem = this.$refs.refImageUpload;
      elem.click();
    },
    imagePreview(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.image = file
    },
    removeUploadedImage(e) {
      this.url = null;
      this.image = null;
    },
    createPost(){
        let data = {
            'description' : this.description,
            'image' : this.image
        }
        console.log(data)

        axios.post('posts', data)
        .then(response => {
            // if(response.data.success != 1){
            // } else {
                Swal.fire({
                    title: 'Submitted Successfully',
                    icon: 'success',
                })
                console.info(response)
            // }
        }).
        catch(error => {
            this.errored = true
            console.error(error)
        })
        .finally(() => this.loading = false)

        
    },
    auto_grow() {
      const element = this.$refs.refTextAreaDescription;
      if (element.scrollHeight >= 200) {
        element.style.height = "200px";
      } else {
        element.style.height = element.scrollHeight + "px";
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>