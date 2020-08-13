<template>
<div class="info">
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="content-register">
    <div class="item2">
    <form role="form" @submit.prevent="submit" @keydown="form.onKeydown($event)" >

                <div class="message"></div>
                
                    <div class="info" >
                        <!-- <div class="step-title"><span>Personal Info</span><hr></div> -->
                        <div class="card-body">
                               <div class="form-group">
                                <label for="nameId">Name </label>
                                <input type="text" class="form-control" id="nameId" placeholder="full name" v-model="form.name" required name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>



                        </div>
                    <div class="card-footer form-group">
                       
                        <button :disabled="is_disable" class="btn update" type="submit" >Update</button>
                    </div>
                    </div>
            </form>

        </div>
    </div>
</div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
     name:'info',
         data(){
            return{
                form: new Form({
                    name:'',
                }),
                is_disable:false,
            }
        },
        mounted() {
              axios.get('/auth/user/data')
                .then(response => (
                  this.form.name = response.data.name))
        },
        methods: {
            submit(){
                this.is_disable=true;
                         // Submit the form via a POST request
                this.form.post('update/Profile')
                    .then(({ data }) => {
                    console.log(data.message)
                    // console.log(data)
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
            },
        }
    
    
}
</script>

<style scoped>
.content-register{
    margin-left: 20%;
}
.item2{
        position: relative;
        width: 50%;
        background: #DDEAF5;
        margin-left: 3%;
        border-radius: 5px;
        
    }
    .login{
        background: #FFFFFF;
        /* box-shadow: 1px 1px 4px rgba(148, 143, 143, 0.25); */
        border-radius: 3px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal; 
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        /* identical to box height */

        margin-left: 3%;
        color: #06275B;

    }

     .update{
      background: #DD1B1B;
        border-radius: 3px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal; 
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;

        color: #FFFFFF;  
        border: none;
        margin-left: 80%;
    }
    @media only screen and (max-width: 938px) {
.update{
    margin-left: 74%;
}
    }
@media only screen and (max-width: 639px) {
    .item2{
        position: relative;
        width: 90%;
        background: #DDEAF5;
        margin-left: 3%;
        border-radius: 5px;
        
    }
    .content-register{
    margin-left: 2%;
}
.update{
    margin-left: 71%;
}
}

</style>