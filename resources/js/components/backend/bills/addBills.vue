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
              <li class="breadcrumb-item active">Add Water Bills</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="content-register">
    <div class="item2">
        <form role="form" @submit.prevent="submit" @keydown="form.onKeydown($event)" >

                <div class="message">{{message}}</div>
                
                    <div class="info" >
                        <!-- <div class="step-title"><span>Personal Info</span><hr></div> -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="compteId">Compte Number </label>
                                <input type="text" class="form-control" id="compteId" placeholder="Compte Number" v-model="form.compte" required minlength="9" maxlength="9" name="compte" :class="{ 'is-invalid': form.errors.has('compte') }">
                                <has-error :form="form" field="compte"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="cashId">Cash </label>
                                <input type="number" class="form-control" id="cashId" placeholder="Cash" min="300" max="500000" v-model="form.cash" required name="cash" :class="{ 'is-invalid': form.errors.has('cash') }">
                                <has-error :form="form" field="cash"></has-error>
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
                    cash:'',
                    compte:'',
                }),
                is_disable:false,
                message:'',

            };
        },
        methods: {
            submit(){
                this.is_disable=true
                         // Submit the form via a POST request
                this.form.post('/admin/AddBills/save')
                    .then(({ data }) => {
                    // console.log(data.message)
                    this.is_disable=false
                    console.log(data)
                        if (data.message=="ok"){
                            // this.$router.push('/login')
                            Swal.fire({
                            icon: 'success',
                            showConfirmButton: false,
                            timer:2000,
                            position:"top-end"
                        })
                        this.$router.push('/waterBill')
                        this.is_disable=false
                        }else if(data.message=="not"){
                            this.message="The compte meter is invalid please velify Compte Number"
                              Swal.fire({
                            icon: 'error',
                            showConfirmButton: false,
                            timer:2500,
                            position:"top-end"
                        })
                        this.is_disable=false
                        }
                        else {
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
.message{
    text-align: center;
    color: #DD1B1B;
     font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal; 
        font-weight: normal;
        font-size: 16px;
        line-height: 16px;
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