<template>
    <div class="audio-list">
  <div class="content-header">
     <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All Role</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>


     <CRow>
        <CCol sm="12" md="12" lg="12">
        <CCard>
          <CCardHeader>
            <span>User  List</span>
            <CBadge class="float-right">
               <router-link :to="'/addUser'" class="btn btn-info" > <i class="fa fa-plus-square" aria-hidden="true"></i>Add New</router-link> </CBadge>
          </CCardHeader>
          <CCardBody>

           <div class="table-responsive-sm">
                    <vue-good-table
                        title="Shop List Table"
                        class="table table-bordered table-hover table-condensed table-striped"
                        :columns="columns"
                        :rows="rows"
                        :search-options="{
                            enabled: true
                        }"
                        :pagination-options="{
                            enabled: true
                        }"
                        :lineNumbers="true"
                        :globalSearch="true"
                        >
                        <template slot="table-row" slot-scope="props">
                        <span v-if="props.column.field == 'actions'">
                      <button class="btn btn-danger"  @click="deleteUser(props.row)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </span>
                       
                        <span v-else>
                        {{props.formattedRow[props.column.field]}}
                        
                        </span>
                    </template> 
                </vue-good-table>
                </div>

               </CCardBody>
        </CCard>
      </CCol>

    </CRow>
    </div>
</template>
<script>

import Swal from 'sweetalert2'
export default {
    name:'allUser',
    data() {
        return {
          
            columns: [
            {
              label: 'Role',
              field: 'role.name', 
              filterable: true,
            },
             {
              label: 'Name',
              field: 'name',  
              filterable: true,
            },
             {
              label: 'Email',
              field: 'email',  
              filterable: true,
            },
            {
              label: 'Actions',
              field: 'actions',
              sortable: false,
            }      
       ],
     rows:[],
      show: true,
      isCollapsed: true,
        }
    },
    created () {
         this.getAllUser();
    },
    methods: {
       getAllUser(){
            var self = this;
            var new1=[];
            axios.get('/admin/AllUser')
                .then(response => (
             self.rows=response.data.users))
             },
        deleteUser(role){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                // height:200,
                // width:400,
                padding: 0.7,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                     axios.put('/admin/users/delete', {
                    params:{id:role.id} 
                })
                    .then(response => (
                        this.getAllUser(),
                        console.log(response.data),
                         Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    ))
                    ).catch((error) => console.log(error));
                   
                }
                })
            },
    },
}
</script>
<style scoped>

</style>