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
                        
                            <div class="form-group row">
                                <label for="nameId" class="col-sm-2 control-label">Full Name </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nameId" placeholder="Full Name" autocomplete="false" v-model="form.name" required name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="nidId" class="col-sm-2 control-label">National Id </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nidId" placeholder="Nationl Id" autocomplete="false" v-model="form.nid" required name="nid" minlength="16" maxlength="16" :class="{ 'is-invalid': form.errors.has('nid') }">
                                <has-error :form="form" field="nid"></has-error>
                            </div>
                            </div>
                             <div class="form-group row">
                                <label for="telId" class="col-sm-2 control-label">Telephone </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="telId" placeholder="Telephone" autocomplete="false" v-model="form.telephone" required name="telephone" minlength="10" maxlength="12" :class="{ 'is-invalid': form.errors.has('telephone') }">
                                <has-error :form="form" field="telephone"></has-error>
                            </div>
                            </div>
                             <div class="form-group row">
                                <label for="districtId" class="col-sm-2 control-label">District</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="districtId" placeholder="District" autocomplete="false" v-model="form.district" required  maxlength="16" :class="{ 'is-invalid': form.errors.has('district') }">
                                <has-error :form="form" field="district"></has-error>
                            </div>
                            </div>
                             <div class="form-group row">
                                <label for="sectorId" class="col-sm-2 control-label">Sector </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="sectorId" placeholder="Sector" autocomplete="false" v-model="form.sector" required name="sector" :class="{ 'is-invalid': form.errors.has('sector') }">
                                <has-error :form="form" field="sector"></has-error>
                            </div>
                            </div>
                             <div class="form-group row">
                                <label for="cellId" class="col-sm-2 control-label">Cell </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="cellId" placeholder="Cell" autocomplete="false" v-model="form.cell" required name="cell"  :class="{ 'is-invalid': form.errors.has('cell') }">
                                <has-error :form="form" field="cell"></has-error>
                            </div>
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
     name:'editClient',
         data(){
            return{
                form: new Form({
                    id:'',
                    name:'',
                    nid:'',
                    telephone:'',
                    district:'',
                    sector:'',
                    cell:'',
                }),
                is_disable:false,

            };
        },
        
        props: {
             id: {
            type: Number,
            required: true
        },
        },
        created () {
        this.getClientDetail(this.id)
        },
        methods: {
            getClientDetail(client) {
            axios.put('/admin/clients/show', {
                    params:{id:client} 
                })
                    .then(response => (
                        this.form.id=response.data.client.id,
                        this.form.name=response.data.client.name,
                        this.form.district=response.data.client.district,
                        this.form.sector=response.data.client.sector,
                        this.form.nid=response.data.client.nid,
                        this.form.cell=response.data.client.cell,
                        this.form.telephone=response.data.client.telephone
                    )).catch((error) => console.log(error));
        },
            submit(){
                this.is_disable=true
                         // Submit the form via a POST request
                this.form.post('/admin/clients/update')
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
                        this.$router.push('/allClient')
                         this.is_disable=false
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