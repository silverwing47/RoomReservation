<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login / Sign-up</title
      >

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Core theme CSS -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--====== Aos css ======-->
    <link rel="stylesheet" href="assets/css/aos.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/mydefault.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <!-- Core JS -->
    <!-- <script src="js/scripts.js"></script> -->
    <link rel="stylesheet" href="login/css/mystyle.css">

  </head>
  <body>
    <header id="home" class="header-area pt-100">

        <div class="shape header-shape-one">
            <img src="assets/images/banner/shape/shape1.png" alt="shape">
        </div> <!-- header shape one -->

        <div class="shape header-shape-tow animation-one">
            <img src="assets/images/banner/shape/shape2.png" alt="shape">
        </div> <!-- header shape tow -->

        <div class="shape header-shape-three animation-one">
            <img src="assets/images/banner/shape/shape3.png" alt="shape">
        </div> <!-- header shape three -->

        <div class="shape header-shape-fore">
            <img src="assets/images/banner/shape/shape4.png" alt="shape">
        </div> <!-- header shape three -->

        <!-- Login Form -->
        <div class="login-reg-panel">
        		<div class="login-info-box">
        			<h2>Have an account?</h2>
        			<p>Lorem ipsum dolor sit amet</p>
        			<label id="label-register" for="log-reg-show">Login</label>
        			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
        		</div>

        		<div class="register-info-box">
        			<h2>Don't have an account?</h2>
        			<p>Lorem ipsum dolor sit amet</p>
        			<label id="label-login" for="log-login-show">Register</label>
        			<input type="radio" name="active-log-panel" id="log-login-show">
        		</div>

        		<div class="white-panel">
        			<div class="login-show">
        				<h2>LOGIN</h2>
                <form action="" method="POST" >
          				<input type="text" placeholder="Email" name="logEmail">
          				<input type="password" placeholder="Password" style="margin-bottom:60px" name="logPass">
          				<input class="button-5" type="submit" value="Login" name="btnLogin"> &nbsp &nbsp &nbsp <a href="">Forgot password?</a>
                  <!-- <button type="submit" form="logForm" value="Submit">Log In</button> -->
                </form>

        			</div>
        			<div class="register-show">
        				<h2>REGISTER</h2>
                <form action="" method="POST" >
                  <input type="text" placeholder="First Name" name="fname">
                  <input type="text" placeholder="Last Name" name="lname">
          				<input type="text" placeholder="Email" name="regEmail">
          				<input type="password" placeholder="Password" name="regPass">
          				<input type="text" placeholder="Phone" name="phone">
          				<input class="button-5" type="submit" value="Register" name="btnRegister">
                </form>
        			</div>
        		</div>
        	</div>
          <a href="index.html"><button type="button" class="btn btn-danger" style="position:relative; top:60%; left:930%; font-size:22px;">Return Home</button></a>
    </header>


  </body>
</html>

<script type="text/javascript">

      $(document).ready(function(){
      $('.login-info-box').fadeOut();
      $('.login-show').addClass('show-log-panel');
  });


  $('.login-reg-panel input[type="radio"]').on('change', function() {
      if($('#log-login-show').is(':checked')) {
          $('.register-info-box').fadeOut();
          $('.login-info-box').fadeIn();

          $('.white-panel').addClass('right-log');
          $('.register-show').addClass('show-log-panel');
          $('.login-show').removeClass('show-log-panel');

      }
      else if($('#log-reg-show').is(':checked')) {
          $('.register-info-box').fadeIn();
          $('.login-info-box').fadeOut();

          $('.white-panel').removeClass('right-log');

          $('.login-show').addClass('show-log-panel');
          $('.register-show').removeClass('show-log-panel');
      }
  });

</script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
