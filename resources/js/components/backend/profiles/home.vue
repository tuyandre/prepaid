<template>
    <div class="home-content">
        <div class="home-title">
            <h3 v-if="auth">Welcome  {{auth.name}}</h3>
        </div>
    </div>
</template>
<script>
export default {
    name:'home',
    data() {
        return {
                 auth:null,
        }
    },
created () {
 axios.get('/auth/user/data')
                .then(response => (
                  this.auth = response.data))
    
    }
}
</script>
<style scoped>
.home-title{
    background: burlywood;
    text-align: center;
    padding-top: 20px;
    height: 60px;
}
.home-title h3{
    font-family: "Arial Black", Gadget, sans-serif;
    font-style: normal; 
    font-size: 14px;
    text-decoration: solid;
}
</style>