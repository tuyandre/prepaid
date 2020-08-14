<template>
    <div class="search-result" v-if="search">
        <div class="result-content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <CRow>
                    <CCol sm="12" md="12" lg="12">
                    <CCard>
                    <CCardHeader>
                        <span>Water Bills  Record</span>
                        <CBadge class="float-right">
                            <span>Your Record</span>
                    </CBadge>
                    </CCardHeader>
                    <CCardBody>


                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Compte</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Previous</th>
                            <th scope="col">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr v-for="(searched,index) in search" :key="index">
                            <td >{{searched.client.name}}</td>
                            <td>{{searched.client.compte}}</td>
                            <td >{{searched.date| moment("ddd, MMM Do YYYY")}}</td>
                            <td >{{searched.cash}} Frw</td>
                            <td>{{searched.quantity}}</td>
                            <td>{{searched.balance}}</td>
                            <td>{{searched.total}}</td>
                            </tr>
                        </tbody>
                        </table>

                    </CCardBody>
                    </CCard>
                    </CCol>
                    </CRow>
                    </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                       <CRow>
                    <CCol sm="12" md="12" lg="12">
                    <CCard>
                    <CCardHeader>
                        <span>Water Usage  Record</span>
                        <CBadge class="float-right">
                            <span>Your Record</span>
                    </CBadge>
                    </CCardHeader>
                    <CCardBody>
                          <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Compte</th>
                            <th scope="col">Date</th>
                            <th scope="col">Previous</th>
                            <th scope="col">Used</th>
                            <th scope="col">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr v-for="(searchs,index) in search_usages" :key="index">
                            <td >{{searchs.client.name}}</td>
                            <td>{{searchs.client.compte}}</td>
                            <td >{{searchs.date| moment("ddd, MMM Do YYYY, h:mm:ss a")}}</td>
                            <td >{{searchs.previous}}</td>
                            <td>{{searchs.used}}</td>
                            <td>{{searchs.balance}}</td>
                            </tr>
                        </tbody>
                        </table>



                    </CCardBody>
                    </CCard>
                    </CCol>
                    </CRow>
                </div>
              
            </div>
        </div>
    </div>
</template>
<script>
import fz from 'fuzzaldrin-plus';
export default {
    name:'searchResult',
    data() {
        return {
          bills:null,
          usages:null,
          bills_result:null,
          usages_result:null,
        }
    },
    props: {
         search: {
      type: Array
    },
          search_usages: {
      type: Array
    },
    },
    methods: {

    },
    // mounted () {
    //         axios
    //             .get('/client/prepaid/searchEngine/api')
    //             .then(response => (
    //                 this.bills = response.data.bills,
    //                 this.usages=response.data.usage,
    //                 console.log(response.data)
      
    //                 ))
    // },
    computed: {
    //    queryBills() {
    //   if(!this.search) return this.bills_result;

    //   const preparedQuery = fz.prepareQuery(this.search);
    //   const scores = {};

    //   return this.bills
    //     .map((option, index) => {
    //       const scorableFields = [
    //         option.client.compte,
    //         option.cash,
    //       ].map(toScore => fz.score(toScore, this.search, { preparedQuery }));

    //       scores[option.id] = Math.max(...scorableFields);

    //       return option;
    //     })
    //     .filter(option => scores[option.id] > 1)
    //     .sort((a, b) => scores[b.id] - scores[a.id])
    //   ;
    // },
      
    //  getQueryBills(){
    //   return this.queryBills;
    // },
    // },
    // watch: {
    //    search(){
    //    this.bills_result=this.getQueryBills;
    //    console.log(this.bills_result);
    //    console.log(this.search);

    //    this.usages_result=this.getQueryUsage;
    //   }
    },
    
}
</script>
<style scoped>


.search-result{
background: #DDEAF5;
text-decoration-color:#0C589E;
border-radius: 15px;

}
.footer{
    text-align: center;
    margin-left: 4%;
    margin-bottom: 8px;
    font-family: "Arial Black", Gadget, sans-serif;
    font-style: normal;
    /* color: black; */
}
.poster{
    height: 65px;
    width: 50px;
    margin-right: 10px;
}
.video-list{
    display: flex;
    flex-direction: row;
    padding-top:5px;
    padding-left:5px;
}
.content a h4{
   font-family: "Arial Black", Gadget, sans-serif;
font-style: normal;
color: black;
}
hr{
padding-top:5px;
    padding-left:5px;    
}

@media only screen and (max-width: 938px) {
    .search-result{
         margin:0 1.5% 0 1.5%;
    }
      .footer{
        margin-left: 7%;
    }
}

@media only screen and (min-width: 939px) {
 .search-result{
    
    margin:0 2% 0 2%;
    }
  
}
@media only screen and (max-width: 639px) {
.search-result{
    border-radius: 10px;
    margin:0 1% 0 1%;
}
  .footer{
        margin-left: 9%;
    }
}
</style>