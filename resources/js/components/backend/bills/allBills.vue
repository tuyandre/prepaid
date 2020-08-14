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
                    <li class="breadcrumb-item active">Water Bills</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>


     <CRow>
        <CCol sm="12" md="12" lg="12">
        <CCard>
          <CCardHeader>
            <span>Water Bills  Record</span>
            <CBadge class="float-right">
               <router-link :to="'/addBills'" class="btn btn-info" > <i class="fa fa-plus-square" aria-hidden="true"></i>Add New</router-link> </CBadge>
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
                         <!-- <router-link :to="{ name: 'editClient', params: { id: props.row.id } }" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i>Edit</router-link>
                       
                      <button class="btn btn-danger"  @click="deleteClient(props.row)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> -->
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
              field: 'client.name', 
              filterable: true,
            },
             {
              label: 'Compte',
              field: 'client.compte',  
              filterable: true,
            },
             {
              label: 'Date',
              field: 'date',  
              filterable: true,
            },
             {
              label: 'Cash/Frw',
              field: 'cash',  
            },
             {
              label: 'Quantity(m3/litre)',
              field: 'quantity', 
            },
             {
              label: 'Previous Balance',
              field: 'balance',  
            },
             {
              label: 'Total',
              field: 'total',  
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
         this.getAllWaterBills();
    },
    methods: {
       getAllWaterBills(){
            var self = this;
            var new1=[];
            axios.get('/admin/waterBills')
                .then(response => (
             self.rows=response.data.bills))
             },
      
    },
}
</script>
<style scoped>

</style>