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
              <li class="breadcrumb-item active">Edit Role</li>
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
                                <label for="displayId">Display Name </label>
                                <input type="text" class="form-control" id="displayId" placeholder="Display" v-model="form.display" required name="display" :class="{ 'is-invalid': form.errors.has('display') }">
                                <has-error :form="form" field="display"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="descriptionId">Description </label>
                                <input type="text" class="form-control" id="description" placeholder="Description" v-model="form.description" required name="description" :class="{ 'is-invalid': form.errors.has('description') }">
                                <has-error :form="form" field="description"></has-error>
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
     name:'editRole',
         data(){
            return{
                form: new Form({
                    id:'',
                    display:'',
                    description:'',
                }),
                is_disable:false,
                changePassword:true,

            };
        },
        
        props: {
             id: {
            type: Number,
            required: true
        },
        },
        created () {
        this.getRoleDetail(this.id)
        },
        methods: {
              getRoleDetail(video) {
            axios.put('/admin/roles/show', {
                    params:{id:video} 
                })
                    .then(response => (
                        this.form.id=response.data.role.id,
                        this.form.display=response.data.role.display_name,
                        this.form.description=response.data.role.description
                    )).catch((error) => console.log(error));
        },
            submit(){
                this.is_disable=true
                         // Submit the form via a POST request
                this.form.post('/admin/Roles/update')
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
                        this.$router.push('/allRole')
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