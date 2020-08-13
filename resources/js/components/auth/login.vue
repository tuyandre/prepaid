<template>
    <div class="row">
        <div class="bg-login"></div>
        <a class="logo-brand" href="/" ><img class="logo-image"  style="max-height: 40px;max-width: 40px;border-radius: 50%;" src="/data/assets/logo.jpg" alt="image"/></a>

        <div class="content-login"  >

            <div class="item2">
                <div class="titlea ">  <span class="title">Welcome Back</span></div>
                <form  role="form" @submit.prevent="login" @keydown="form.onKeydown($event)" >
                    <div class="message"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="emailId">Email</label>
                            <input type="text" class="form-control" id="emailId" placeholder="Ex:email@... or Ex:0788..." v-model="form.email" required name="email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="passId">Password </label>
                            <input type="password" class="form-control" id="passId" placeholder="********" v-model="form.password" required name="password" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer form-group">
                    <span>
                        Don’t have account ??<br/>
                        <router-link to="#" class="signupp">Contact Admin Support </router-link>it’s free!!!
                    </span>

                        <button  type="submit" :disabled="is_disable"  class="btn loginnn" >Sign In</button>

                    </div>
                </form>
                <div class="message"  v-if="message">{{message}}</div>

            </div>

        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'

    export default {

        name:'Login',
        data(){
            return{
                form: new Form({
                    email:'',
                    password:'',
                    remember: false
                }),
                message:'',
                is_disable:false,
            }
        },
        methods: {
            login () {
                this.is_disable=true
                this.form.post('/prepaid/login')
                    .then(({ data }) => {
//                        console.log(data.auth)
                        if (data.auth=="ok"){

                            // this.getLogin()
                            window.location = "/home";
                            //  window.location = "/creators";

                        }else if(data.auth=='not') {
                            this.message="Email or Password Credential Incorrect"
                            Swal.fire({
                                title: 'Credential Incorrect!',
                                text: 'Email or Password Credential Incorrect',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                            this.is_disable=false
                        }else
                        {
                            this.message="Server Error please try again"
                            Swal.fire({
                                title: 'Server Error!',
                                text: 'Server Error please try again',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                            this.is_disable=false
                        }

                    })
            },

        }
    }
</script>

<style scoped>
    .bg-login{

        /* z-index: 1; */
        display: block;
        /* background-image:url('/clients/assets/bglogin.jpg'); */
        background:#09283E;
        width: 100%;
        min-height: 100vh;
        -webkit-filter: blur(3px);
        /* transform: translate(-50%, -50%); */
        -moz-filter: blur(3px);
        -o-filter: blur(3px);
        -ms-filter: blur(3px);
        filter: blur(2px);

        background-repeat:no-repeat;
        background-size: cover;
    }
    .logo-brand{
        position: absolute;
        top: 20px;
        left: 30px;
    }
    .content-login{
        position: absolute;
        top: 20%;
        left: 35%;

    }
    .message span{
        color: red;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 15px;
        line-height: 14px;
    }
    .message{
        background: #565454;
        width: 80%;
        margin: 20px 20px;
        color: red;
    }


    .item2{

        /* background: #06275B; */
        background: #DDEAF5;
        border: solid;
        border-radius: 3px;
        border-radius: 3px;
        /* text-align: center; */
    }


    .loginnn{
        position: absolute;
        right: 20px;
        /* right: 8%; */
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        /* background:#06275B; */
        background:#DD1B1B;
        box-shadow: 3px 1px 4px rgba(148, 143, 143, 0.25);
        border-radius: 8px;
        color: #FFFFFF;
    }

    .card-footer{
        display: flex;
        flex-direction: row;
    }
    .card-footer span{
        width: 140px;
        height: 14px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 10px;
        line-height: 14px;
        /* identical to box height */


        color: #06275B;
        margin-right: 150px;

    }
    .signupp{
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        /* identical to box height */


        color: rgb(202, 12, 12);
        /* width: 37px; */
        /* height: 14px; */
    }
    .item2 label{
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 19px;
        /* identical to box height */


        color: #06275B;

    }
    .titlea{
        text-align: center;
        padding-top: 20px;
    }
    .title{
        margin-top: 20px;
        margin-bottom: 20px;
        max-width: 58px;
        max-height: 22px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        /* identical to box height */

        color: #06275B;
    }

    @keyframes donut-spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    .loading {
        display: inline-block;
        border: 4px solid rgba(0,0,0,.2);
        border-left-color: red;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: donut-spin 1.2s linear infinite;
    }
    @media only screen and (max-width: 938px) {
        .content-login{
            position: absolute;
            top: 20%;
            left: 30%;

        }
    }
    @media only screen and (min-width: 939px) {


    }
    @media only screen and (max-width: 639px) {
        .content-login{
            position: absolute;
            top: 20%;
            left: 6%;

        }
    }

</style>
