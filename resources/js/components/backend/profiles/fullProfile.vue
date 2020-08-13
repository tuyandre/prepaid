<template>
    <div class="adminProfile">
         <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Full Profile</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
         <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="banner_content">
						<div class="media">
							<div class="d-flex" v-if="auth">
								<img :src="'/profiles/'+auth.profile" alt="" v-if="auth.profile">
                                <img src="/profiles/admin.png" alt="" v-else>

							</div>
							<div class="media-body">
								<div class="personal_text" v-if="auth">
									<h3>{{auth.name}}</h3>
									<ul class="list basic_info" type="none">
										<!-- <li><a href="#"><i class="lnr lnr-calendar-full"></i> 31st December, 1992</a></li>
										<li><a href="#"><i class="lnr lnr-phone-handset"></i> 44 (012) 6954 783</a></li> -->
										<li><a href="#"><i class="lnr lnr-envelope"></i> {{auth.email}}</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        

    </div>
</template>
<script>
export default {
    name:'fullProfile',
    data() {
        return {
            auth: null,
        }
    },
  created () {
      axios.get('/auth/user/data')
                .then(response => (
                this.auth=response.data))
  },  
}
</script>
<style scoped>

.home_banner_area {
  position: relative;
  z-index: 1;
  background-image: -moz-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  background-image: -webkit-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  background-image: -ms-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  /* margin-bottom: 200px; */
   }
  .home_banner_area .box_1620 {
    min-height: 450px;
    border-radius: 15px;
    position: relative;
    /* bottom: -200px; */
    background: #fff;
    padding: 10px;
    box-shadow: 0px 20px 40px 0px rgba(153, 153, 153, 0.3); }
  .home_banner_area .banner_inner {
    position: relative;
    width: 100%;
    min-height: 450px;
    display: flex; }
    .home_banner_area .banner_inner .banner_content {
      color: #222222;
      vertical-align: middle;
      align-self: center;
      text-align: left; }
      .home_banner_area .banner_inner .banner_content .media .d-flex img{
          width: 300px !important;
          height: 300px !important;
          border-radius: 50% !important;
      }
      .home_banner_area .banner_inner .banner_content .media .d-flex {
        padding-right: 45px; 
        padding-left: 45px; }
      .home_banner_area .banner_inner .banner_content .media .media-body {
        vertical-align: middle;
        align-self: center; }

.blog_banner {
  min-height: 600px;
  position: relative;
  z-index: 1;
  overflow: hidden;
  margin-bottom: 0px; }
  .blog_banner .banner_inner {
    background: #04091e;
    position: relative;
    overflow: hidden;
    width: 100%;
    min-height: 600px;
    z-index: 1; }
    .blog_banner .banner_inner .overlay {
      background: url(/backend/assets/banner-2.jpg) no-repeat scroll center center;
      opacity: .5;
      height: 115%;
      position: absolute;
      left: 0px;
      top: 0px;
      width: 100%;
      z-index: -1; }
    .blog_banner .banner_inner .blog_b_text {
      max-width: 600px;
      margin: auto;
      color: #fff; }
      .blog_banner .banner_inner .blog_b_text h2 {
        font-size: 60px;
        font-weight: bold;
        font-family: "Heebo", sans-serif;
        line-height: 66px;
        margin-bottom: 15px;
        text-transform: uppercase; }
      .blog_banner .banner_inner .blog_b_text p {
        font-size: 16px;
        margin-bottom: 15px; }
      .blog_banner .banner_inner .blog_b_text .white_bg_btn {
        line-height: 42px;
        padding: 0px 15px;
        border-radius: 5px; }

.banner_box {
  max-width: 1620px;
  margin: auto; }

.banner_area {
  position: relative;
  z-index: 1;
  min-height: 350px;
  background-image: -moz-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  background-image: -webkit-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  background-image: -ms-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
  margin-bottom: 20px; }
  .banner_area .box_1620 {
    background: #fff;
    min-height: 360px;
    border-radius: 12px;
    position: relative;
    /* bottom: -120px; */
    box-shadow: 0px 20px 80px 0px rgba(153, 153, 153, 0.3); }
  .banner_area .banner_inner {
    position: relative;
    overflow: hidden;
    width: 100%;
    min-height: 360px;
    z-index: 1; }
    .banner_area .banner_inner .banner_content h2 {
      color: #222222;
      font-size: 48px;
      font-family: "Heebo", sans-serif;
      margin-bottom: 0px;
      font-weight: bold; }
    .banner_area .banner_inner .banner_content .page_link a {
      font-size: 14px;
      color: #222222;
      font-family: "Roboto", sans-serif;
      margin-right: 32px;
      position: relative; }
      .banner_area .banner_inner .banner_content .page_link a:before {
        content: "\e87a";
        font-family: 'Linearicons-Free';
        position: absolute;
        right: -25px;
        top: 50%;
        transform: translateY(-50%); }
      .banner_area .banner_inner .banner_content .page_link a:last-child {
        margin-right: 0px; }
        .banner_area .banner_inner .banner_content .page_link a:last-child:before {
          display: none; }
      .banner_area .banner_inner .banner_content .page_link a:hover {
        color: #766dff; }

        
.personal_text h6 {
  font-size: 14px;
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  letter-spacing: 2.1px;
  font-weight: normal;
  margin-bottom: 12px;
  color: #222222; }
.personal_text h4 {
  font-size: 16px;
  font-weight: 500;
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  margin-bottom: 20px;
  color: #222222; }
.personal_text h3 {
  font-size: 48px;
  text-transform: uppercase;
  margin-bottom: 15px;
  color: #222222; }
.personal_text p {
  font-family: "Roboto", sans-serif;
  max-width: 540px;
  color: #777777;
  margin-bottom: 20px; }
.personal_text .basic_info li {
  margin-bottom: 15px; }
  .personal_text .basic_info li a {
    position: relative;
    padding-left: 20px;
    font-size: 16px;
    color: #777777; }
    .personal_text .basic_info li a i {
      position: absolute;
      left: 0px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      color: #766dff; }
  .personal_text .basic_info li:last-child {
    margin-bottom: 0px; }
.personal_text .personal_social {
  margin-top: 25px; }
  .personal_text .personal_social li {
    display: inline-block;
    margin-right: 7px; }
    .personal_text .personal_social li:last-child {
      margin-right: 0px; }
    .personal_text .personal_social li a {
      line-height: 40px;
      width: 40px;
      background: #e8e8e8;
      border-radius: 5px;
      display: inline-block;
      text-align: center;
      color: #fff;
      font-size: 16px; }
    .personal_text .personal_social li:hover a {
      background-image: -moz-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
      background-image: -webkit-linear-gradient(0deg, #766dff 0%, #88f3ff 100%);
      background-image: -ms-linear-gradient(0deg, #766dff 0%, #88f3ff 100%); }


</style>