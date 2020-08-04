<template>
    <div class="row">
        <div class="bg-image"></div>
        <div class="home-page" >
            <header>
                <a href="/" >
                    <img src="/data/assets/logo.jpg" alt="Quincy Larson's profile picture" class="profile-thumbnail">
                </a>

                <div class="follow-btn" v-if="!auth" >
                    <a href="/user/login" class="signin" @mouseover="hoverButton(true)" @mouseout="hoverButton(false)"><span>Sign In</span></a>
                    <!-- <button>Follow</button> -->
                </div>
                <div class="follow-btn" v-else >
                    <img v-if="auth.photo" class="plays-image" v-bind:src="'/profiles/'+auth.photo" alt="image"  @click="logged()"/>

                    <span v-else v-text="getCreatorName(auth.name)"  class="creator-name" @click="logged()"></span>
                </div>
            </header>

            <div class="ct-sidenav" v-if="isToggled">
                <div class="ct-sidenav-header" v-if="auth">
                    <img v-if="auth.photo" class="plays-image" v-bind:src="'/profiles/'+auth.photo" alt="image"/>

                    <span v-else v-text="getCreatorName(auth.name)"  class="creator-name"></span>
                    <div class="header-info">
                        <span>{{auth.name}}</span>
                        <span>{{auth.email}}</span>
                    </div>
                </div>
                <ul class="list-unstyled ct-sidenav-list">
                    <li>
                        <a href="#"> <i class="fa fa-upload " aria-hidden="true" ></i> Start Upload</a>
                    </li>
                    <li>
                        <a href="/customer"> <i class="fa fa-cog " aria-hidden="true" ></i> Setting</a>
                    </li>
                    <li>
                        <a href="#">   <i class="fa fa-bell" aria-hidden="true"></i> Subscriptions</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                    </li>
                    <li>
      <span  @click="logout()">
        <i class="fa fa-power-off" aria-hidden="true"></i> Sign Out
        </span>
                    </li>
                </ul>
            </div>


            <div class="inner">
                <div class="inner-content">
                    <h3> Water prepaid bill System</h3>
                    <h4>Enter the water meter for getting your historical data</h4>
                </div>
                <div class="searchbox" >
                    <input class="is-field" type='text'    v-model="searchInput"  placeholder="Search..." />
                    <div class="is-icon" ><i class="fas fa-search fa-1x"></i></div>
                </div>
                <!-- <hr> -->
            </div>
            <!-- <SearchResult :search="searchInput"></SearchResult> -->
            <!--<Result :search="searchInput"></Result>-->



        </div>
    </div>
</template>
<script>
    export default {
        name:'welcome',
        data() {
            return {
                isSelected:false,
                isToggled:false,
                searchInput: '',
                search:'',
                auth:null,
            }
        },
//        created () {
//            axios.get('/api/auth/user/data')
//                .then(response => (
//                    this.auth = response.data))
//        },
//        mounted () {
//            axios.get('/api/auth/user/data')
//                .then(response => (
//                    this.auth = response.data))
//        },
        methods: {
            logout(){
                axios
                    .get('/creators/logout')
                    .then(response => (
                        this.auth=null,
                            window.location = "/",
                            console.log(this.auth)
                    ))
            },
            logged(){
                console.log(this.isToggled)
                if(this.isToggled==false)
                    this.isToggled=true
                else
                    this.isToggled=false
            },
            getCreatorName(name){
                let string1=name.split(" ");
                let photo_name="";
                for(let i=0;i<string1.length;i++){
                    photo_name +=string1[i].charAt(0).toUpperCase();

                }
                return photo_name;
            },
            hoverButton(hover) {
                this.isSelected=hover
            },
            classToggle() {
                const navs = document.querySelectorAll('.Navbar__Items')

                navs.forEach(nav => nav.classList.toggle('Navbar__ToggleShow'));
            }
        },
        watch: {

            msg() {
                this.search=this.searchInput;
            }

        },

    }
</script>
<style scoped>
    .bg-image{

        /* z-index: 1; */
        display: block;
        background-image:url('/data/assets/bghome2.jpg');
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

    .home-page{
        /* max-height: 100vh; */
        position: absolute;
        left: 0;
        min-height: 100vh;
        z-index: 1;
        width: 100%;



        /* filter: blur(8px);
       -webkit-filter: blur(8px); */
        /* background-color: rgb(0,0,0);  */
        background-color: rgba(0,0,0, 0.6); /* Black w/opacity/see-through */
    }
    header{
        padding-top: 10px;
    }
    .plays-image{
        width: 45px;
        height:45px;
        border-radius: 50%;
        margin-right: 10px;
        margin-top: 10px;
    }
    .plays-image:hover{
        cursor:pointer;
    }
    .creator-name{
        width: 45px;
        height:45px;
        border-radius: 50%;
        background:#0C589E;
        color:black;
        padding: 10px 10px;
        /* margin: 30px 6px; */
        margin-right: 10px;
        margin-top: 10px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        text-decoration: solid;
    }

    .creator-name:hover{
        cursor:pointer;
    }
    .img-play{
        height:100%;
        width: 100%;
        box-shadow: 1px 4px 10px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
    }
    header,footer {
        display: flex;
        flex-direction: row;
        z-index: 2;
    }
    header .profile-thumbnail {
        margin-top: 12px;
        width: 40px;
        height:40px;
        border-radius: 50%;
        margin-left: 30px;
    }

    header .follow-btn {
        display: flex;
        margin: 0 20px 0 auto;
    }
    header .follow-btn button {
        border: 0;
        border-radius: 3px;
        padding: 5px;
    }
    header h3, header h4 {
        display: flex;
        margin: 0;
    }

    .register{
        background: #DD1B1B;
        border-radius: 3px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 16px;
        /* identical to box height */


        color: #FFFFFF;
    }
    .register:hover{
        transform: scale(1.2);
    }
    .register.selected{
        color: #0C589E;
        background: none;
    }
    .signin{
        margin-top: 16px;
        padding-left: 15px;
        padding-top: 5px;
        height: 30px;
    }
    /* .signin:hover{
      background-color: #DD1B1B;
      color: #FFFFFF;

    } */
    .follow-btn a:hover{
        text-decoration: none;
    }
    .signin span:hover{
        background-color: #DD1B1B;
        color: #FFFFFF;
        height: 30px;
        /* padding: 3px 5px 3px 10px; */
        padding: 8px;
        border-radius: 5px;
    }
    .signin:hover ~.signup{
        color: #0C589E;
        background: none;
    }
    .signin span{
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 16px;
        /* identical to box height */
        color: #0C589E;
        padding-top: 5px;
        height: 30px;
    }
    .signup{
        margin-top: 8px;
        padding-left: 15px;
    }
    .inner{
        margin:15% 25% 0 25%;
        text-align: center;
    }
    .inner p {
        margin-bottom: 10px;
        font-size: 20px;
    }
    .inner hr {
        /* margin: 20px 0; */
        border-style: solid;
        opacity: 0.1;
    }

    footer{
        padding-bottom: 5%;
        margin:7% 20% 0 20%;
        text-align: center;
        color: #0C589E;
    }

    footer .audios {
        display: flex;
        flex-direction: column;
        font-size: 15px;
        text-align: center;
    }


    footer .audios strong {
        font-size: 18px;
    }
    footer .audios .title {
        margin-left: 10px;
    }
    footer .videos {
        display: flex;
        flex-direction: column;
        margin-left: auto;
    }
    footer .cta button {
        border: 0;
        background: transparent;
    }
    .inner-content{
        color: #389960;
        margin-bottom: 30px;
    }

    .searchbox{
        display: flex;
        flex-direction: row;
        /* margin-top: 10px; */
        text-align: center;
        width: 100%;
        height: 50px;
        border-radius: 50px;
        background: #FFFFFF;
    }

    .searchbox input {
        width: 95%;
        height: 50px;
        background: #FFFFFF;;
        /* background: rgb(73, 146, 214); */
        /* background: #E4E0E0; */
        border-radius: 50px;
        border: none;
        outline: none;
        padding-left: 30px;

        font-family: Arial, Helvetica, sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
    }
    .is-icon{
        height: 30px;
        margin-top: 15px;
    }
    .logod{
        height: 80px;
        width: 90px;
    }
    h3{
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: bold;
    }



    .ct-sidenav {
        /* width: 20.3rem; */
        height: 100%;
        position: fixed;
        z-index: 2;
        background: linear-gradient(0deg, #DAE4ED, #DAE4ED);
        padding-left: 0px;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-transition: right 0.25s ease-in-out;
        transition: right 0.25s ease-in-out;
        color: #0C589E;
    }
    .ct-sidenav-header{
        display: flex;
        padding: 10px 15px 13px 10px;
        background: rgba(0, 0, 0, 0.25);
    }
    .ct-sidenav-header .header-info{
        display: flex;
        flex-direction: column;
    }

    .ct-sidenav-list {
        padding: 5px 0 3px;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        font-weight: normal;
        color: #0C589E;
        font-size: 14px;
    }
    .ct-sidenav-list > li {
        -webkit-transition: background-color 250ms ease-in-out;
        transition: background-color 250ms ease-in-out;
    }
    .ct-sidenav-list > li > a, .ct-sidenav-list > li button {
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
    }
    .ct-sidenav-list > li > span{
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        display: inline-block;
        text-align: left;
        width: 100%;
        padding: 8px 50px 4px 10px;
        border: none;
    }
    .ct-sidenav-list > li > span:hover{
        cursor: pointer;
        background: grey;
        text-decoration: none;
    }

    .ct-sidenav-list > li > a, .ct-sidenav-list > li button {
        display: inline-block;
        text-align: left;
        width: 100%;
        padding: 8px 50px 4px 10px;
        border: none;
        background-color: transparent;
        font-family: "Arial Black", Gadget, sans-serif;
        font-style: normal;
        /* font-weight: normal; */
        color:#0C589E;
        font-size: 13px;
        -webkit-transition: all 250ms ease-in-out;
        transition: all 250ms ease-in-out;
        /* text-transform: uppercase; */
    }
    .ct-sidenav-list > li > a:hover{
        background: grey;
        text-decoration: none;
    }


    ul {
        margin-bottom: 0;
        font-size: 1.7rem;
    }







    @media only screen and (max-width: 938px) {
        footer .middle {
            display: flex;
            font-size: 15px;
            margin-left: 20%;
        }
        .inner{
            margin:25% 15% 0 15%;
            text-align: center;
        }
        header .profile-thumbnail {
            width: 55px;
            height:40px;
        }

        .ct-sidenav {
            top: 30px;
            right: 50px;
        }

    }
    @media only screen and (min-width: 939px) {
        .inner{
            margin:18% 20% 0 20%;
            text-align: center;
        }


        .ct-sidenav {
            top: 10px;
            right: 5px;
        }

    }


    @media only screen and (max-width: 639px) {
        footer .middle {
            display: flex;
            font-size: 15px;
            margin-left: 10%;
        }

        .inner{
            margin:70% 10% 0 10%;
            text-align: center;
        }
        header .profile-thumbnail {
            width: 45px;
            height:35px;
        }
        footer{
            padding-bottom: 5%;
            margin:60% 5% 0 5%;
            text-align: center;
            color: #0C589E;
        }

        .ct-sidenav {
            top: 30px;
            right: 55px;
        }
        header .follow-btn {
            display: flex;
            margin: 0 5px 0 auto;
        }
        .creator-name{
            margin-right: 0px;
            margin-top: 10px;
        }
    }
</style>
