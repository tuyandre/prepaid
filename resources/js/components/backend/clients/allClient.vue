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
                    <li class="breadcrumb-item active">All Clients</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>


     <CRow>
        <CCol sm="12" md="12" lg="12">
        <CCard>
          <CCardHeader>
            <span>Clients  List</span>
            <CBadge class="float-right">
               <router-link :to="'/addClient'" class="btn btn-info" > <i class="fa fa-plus-square" aria-hidden="true"></i>Add New</router-link> </CBadge>
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
                         <router-link :to="{ name: 'editClient', params: { id: props.row.id } }" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>Edit</router-link>
                       
                      <button class="btn btn-danger"  @click="deleteClient(props.row)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
    name:'allClient',
    data() {
        return {
          
            columns: [
            {
              label: 'Name',
              field: 'name', 
              filterable: true,
            },
             {
              label: 'NATIONAL ID',
              field: 'nid',  
              filterable: true,
            },
             {
              label: 'Compte',
              field: 'compte',  
              filterable: true,
            },
             {
              label: 'Date',
              field: 'date',  
              filterable: true,
            },
             {
              label: 'Telephone',
              field: 'telephone',  
              filterable: true,
            },
             {
              label: 'District',
              field: 'district',  
              filterable: true,
            },
             {
              label: 'Sector',
              field: 'sector',  
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
         this.getAllClient();
    },
    methods: {
       getAllClient(){
            var self = this;
            var new1=[];
            axios.get('/admin/AllClient')
                .then(response => (
             self.rows=response.data.clients))
             },
        deleteClient(client){
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
                     axios.put('/admin/clients/delete', {
                    params:{id:client.id} 
                })
                    .then(response => (
                        this.getAllClient(),
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