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
              <li class="breadcrumb-item active">Change Password</li>
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
                                <label for="password_currentId">Current Password </label>
                                <input type="password" class="form-control" id="password_currentId" placeholder="..." v-model="form.password_current" required name="password_current" :class="{ 'is-invalid': form.errors.has('password_current') }">
                                <has-error :form="form" field="password_current"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="passwordId">New Password </label>
                                <input type="password" class="form-control" id="passwordId" placeholder="..." v-model="form.password" required name="password" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmationId">Confirm Password </label>
                                <input type="password" class="form-control" id="password_confirmationId" placeholder="..." v-model="form.password_confirmation" required name="password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                                <has-error :form="form" field="password_confirmation"></has-error>
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
     name:'changePassword',
         data(){
            return{
                form: new Form({
                    password_current:'',
                    password:'',
                    password_confirmation:'',
                }),
                is_disable:false,
                changePassword:true,

            };
        },
        methods: {
            submit(){
                         // Submit the form via a POST request
                this.form.post('/update/password')
                    .then(({ data }) => {
                    console.log(data.message)
                    // console.log(data)
                        if (data.message=="ok"){
                            // this.$router.push('/login')
                            Swal.fire({
                            icon: 'success',
                            showConfirmButton: false,
                            timer:2000,
                            position:"top-end"
                        })
                        this.$router.push('/')
                        }else {
                        Swal.fire({
                            icon: 'error',
                            showConfirmButton: false,
                            timer:2500,
                            position:"top-end"
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
        margin-left: 75%;
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
    margin-left: 70%;
}
}

</style>