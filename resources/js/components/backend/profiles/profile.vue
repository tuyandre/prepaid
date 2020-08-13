<template>
<div class="profile">
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="content-profile">
    <div class="item2">
        <pictureInput
        ref="pictureInput"
        @change="onChanged"
        @remove="onRemoved"
        :width="250"
        :removable="true"
        removeButtonClass="ui red button"
        :height="250"
        :radius="50"
        accept="image/jpeg, image/png, image/gif"
        buttonClass="ui button info"
        :customStrings="{
        upload: '<h1>Upload it!</h1>',
        drag: 'Drag and drop your image here'}">

        </pictureInput>
        <button class="btn uploadss" @click="attemptUpload" v-bind:class="{ disabled: !image }">
  Upload
</button>
    </div>
</div>
</div>
</template>
<script>
import PictureInput from 'vue-picture-input'
import FormDataPost from './uploadProfile';
export default {
    data() {
        return {
            image: ''
        }
    },
    components: {
    PictureInput
  },
  created() {
     axios.get('/auth/user/data')
        .then(response => (
           this.checkProfile(response.data)))
        },
    methods: {
        checkProfile(auth){
            if(auth.photo){
                // this.image="http://localhost:8000/profiles/"+auth.photo
                console.log(this.image)
            }else
            {
                this.image=''
            }
        },
        onChanged() {
    if (this.$refs.pictureInput.file) {
      this.image = this.$refs.pictureInput.file;
       console.log(this.image)
    } else {
      console.log("Old browser. No support for Filereader API");
    }
  },
  onRemoved() {
    this.image = '';
  },
     attemptUpload() {
    if (this.image){
        FormDataPost('/update/photo', this.image)
        .then(response=>{
            console.log(response.data)
        this.is_disable=false;
                        if (data.message=="ok"){
                            // this.$router.push('/login')
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                           showConfirmButton: false,
                        })
                        
                        this.$router.push('/')
                        }else {
                        Swal.fire({
                            icon: 'error',
                            position: 'top-end',
                            showConfirmButton: false
                        })
                        this.is_disable=false
                        }
        })
        .catch(err=>{
          console.error(err);
        });
    }
  }
    },
}
</script>
<style scoped>
.content-profile{
    margin-left: 20%;
}
.item2{
        position: relative;
        width: 50%;
        background: #DDEAF5;
        margin-left: 3%;
        border-radius: 5px;
        
    }
    .uploadss{
        position: relative;
        background: #DD1B1B;
        border-radius: 3px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal; 
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;

        color: #FFFFFF;  
        border: none;
        margin-left: 40%;
        margin-bottom: 10px;
        margin-top: 10px;
    }

        @media only screen and (max-width: 938px) {
.updatess{
    margin-left: 50%;
}
    }
@media only screen and (max-width: 639px) {
.updatess{
    margin-left: 50%;
}
}
</style>

