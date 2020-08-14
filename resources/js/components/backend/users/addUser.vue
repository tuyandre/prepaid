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
              <li class="breadcrumb-item active">Add User</li>
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
                                <label for="roleId">Role Name </label>
                                <select v-model="form.role" class="form-control" required :class="{ 'is-invalid': form.errors.has('role') }">
                                    <option  disabled value="">Select Name</option>
                                    <option v-for="role in roles"  :value="role.id" :key="role.id">{{role.display_name}}</option>
                                    </select>
                                <has-error :form="form" field="role"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="nameId">Full Name </label>
                                <input type="text" class="form-control" id="nameId" placeholder="Full Name" v-model="form.name" required name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="emailId">Email </label>
                                <input type="email" class="form-control" id="emailId" autocomplete="false" placeholder="Email" v-model="form.email" required name="email" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="passwordId">Password </label>
                                <input type="password" class="form-control" id="passwordId" placeholder="........" v-model="form.password" required name="password" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>



                        </div>
                    <div class="card-footer form-group">
                       
                        <button :disabled="is_disable" class="btn update" type="submit" >Save</button>
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
     name:'addRole',
         data(){
            return{
                form: new Form({
                    name:'',
                    role:'',
                    email:'',
                    password:'',
                }),
                is_disable:false,
                changePassword:true,
                roles:null,

            };
        },
        created () {
            this.getAllRole();
        },
        methods: {
             getAllRole(){
            var self = this;
            var new1=[];
            axios.get('/admin/AllRole')
                .then(response => (
             this.roles=response.data.roles))
             },
            submit(){
                this.is_disable=true
                         // Submit the form via a POST request
                this.form.post('/admin/AddUser/save')
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
                        this.$router.push('/allUser')
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