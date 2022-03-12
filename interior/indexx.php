<?php
  ob_start();
  $conn =mysqli_connect("localhost","root","","db_resrv");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  session_start();

  $loggedUser = $_SESSION["login"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Re.Srv Homepage</title>
    <!-- modal -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="admin/modal/css/ionicons.min.css">
    <link rel="stylesheet" href="admin/modal/css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favico.png" type="image/png">

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
    <link rel="stylesheet" href="assets/css/dropdown.css">

    <!-- modal -->


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER ENDS START ======-->

    <!--====== HEADER PART START ======-->

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

        <div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#project">Projects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                </ul> <!-- navbar nav -->
                            </div>
                            <div class="navbar-btn ml-20 d-none d-sm-block">
                                <!-- <a class="main-btn" type="button" href="login.php"><?php echo $loggedUser; ?></a> -->
                              <div class="dropdown"> <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style" text-align: center;"> <span>My Account</span> <i class="fa fa-caret-down"></i> </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <li><a type="button" class="dropdown-item" data-toggle='modal' data-target='#updateUser'>Edit Account</a></li>
                                      <!-- <li><a class="dropdown-item" href="#">View my bookings</a></li> -->
                                      <li><a class="dropdown-item" href="#">Logout</a></li>
                                  </ul>
                              </div>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation bar -->

        <div class="header-banner d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <div class="banner-content">
                            <h4 class="sub-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Welcome to</h4>
                            <h1 class="banner-title mt-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2s"><span>Re.Srv</span> MEETING ROOM & EVENT SPACES</h1>
                            <!-- <a class="banner-contact mt-25 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2.3s" href="#contact">Log-in and Book Now</a> -->
                              <a class="main-btn" type="button" href="bookingForm.php">Book Now</a>
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="banner-image bg_cover" style="background-image: url(assets/images/banner/1bg.jpg)"></div>
        </div> <!-- header banner -->

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-80 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image mt-50 clearfix">
                        <div class="single-image float-left">
                            <img src="assets/images/about/about1.jpg" alt="About">
                        </div> <!-- single image -->
                        <div data-aos="fade-right" class="about-btn">
                            <a class="main-btn" href="#"><span>27</span> Years Experience</a>
                        </div>
                        <div class="single-image image-tow float-right">
                            <img src="assets/images/about/about2.jpg" alt="About">
                        </div> <!-- single image -->
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-45">
                        <h4 class="about-welcome">About Us </h4>
                        <h3 class="about-title mt-10">Reasons to choose</h3>
                        <p class="mt-25">"KAY BUGNAW AMO ROOM DI MO MAGMAHAY!" All our rooms are perfectly fitted with the latest technology of air conditioning system. If you want to breathe in nature's fresh air, we also have the conference rooms available for you. Your priority is our top concern. Your goal is to pick out a room where you can conduct your meetings with a calm and relaxing ambience. The rooms that we provide are equipped with the latest security technology to provide safety for our clients. Our objective is to provide you the room that you exactly need while keeping you safe and sound.
                            <br> <br>You want your room with a whitewall and futuristic design, equipped with the latest technology for meetings and conferences? We've got it for you! So don't hesitate, don't delay, book now at Re.Srv. Your safety is our top priority.</p>
                        <a class="main-btn mt-25" href="#">learn more</a>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="services-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Our Services</h5>
                        <h2 class="title">What We Do?</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-icon">
                            <i class="lni-paint-roller"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Interior Design</h4>
                            <p class="mt-20">You can pick the designs you want from the rooms provided or contact our consultant if you want to add interior accessories.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <i class="lni-blackboard"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Design Consultancy</h4>
                            <p class="mt-20">Our consultant will provide you with the information you need to know about our available rooms.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="services-icon">
                            <i class="lni-home"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Residential Design</h4>
                            <p class="mt-20">We have conference rooms that has mini home appliance, equipped with a mini kitchen for thos who want to stay long hours.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-icon">
                            <i class="lni-briefcase"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Commercial Design</h4>
                            <p class="mt-20">We offer business-appropriate meeting/conference rooms and other with more safety features such as soundproofing and bulletproofed glass windows/doors.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <i class="lni-handshake"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Hospitality Design</h4>
                            <p class="mt-20">All the rooms Re.Srv has to offer gives a calm ambience for our clients. We offer top quality rooms with great and approachable staff.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="services-icon">
                            <i class="lni-grow"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Co-working Space Design</h4>
                            <p class="mt-20">Our rooms offer a large space wherein lot of your co-workers can interact and work with large projects without the restriction of a constricted space.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== PROJECT PART START ======-->

    <section id="project" class="project-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-50">
                        <h5 class="sub-title mb-15">Featured Rooms</h5>
                        <h2 class="title">Perfect For Your Important Meetings</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div>
        <div class="container-fluid">
            <div class="row project-active">
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p1.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(A) Classy City View</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p2.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(B) Dim Interior</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p3.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(C) Glass & Nature</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p4.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(D) Wood Aesthetic</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p5.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(E) Whitewall Marble</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p6.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(F) Abstract Interior</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="assets/images/project/p7.jpg" alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="#">(G) Blue Mirror</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PROJECT PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    <section id="team" class="team-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Meet The Team</h5>
                        <h2 class="title">Our Expert Designers</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="team-image">
                            <img src="assets/images/team/1.png" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Niño John Almasa</a></h4>
                            <span class="sub-title">CEO & Founder</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="team-image">
                            <img src="assets/images/team/2.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Geross Rosales</a></h4>
                            <span class="sub-title">Chief Designer</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="team-image">
                            <img src="assets/images/team/3.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Angelerina Singson</a></h4>
                            <span class="sub-title">Consultant</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="team-image">
                            <img src="assets/images/team/team4.png" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Peter Parker</a></h4>
                            <span class="sub-title">Intern</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->

    <section id="testimonial" class="testimonial-area pt-130 pb-130">
        <div class="shape shape-one">
            <img src="assets/images/testimonial/shapes.png" alt="testimonial">
        </div>
        <div class="shape shape-tow">
            <img src="assets/images/testimonial/shapes.png" alt="testimonial">
        </div>
        <div class="shape shape-three">
            <img src="assets/images/testimonial/shapes.png" alt="testimonial">
        </div>
        <div class="container">
            <div class="testimonial-bg bg_cover pt-80 pb-80" style="background-image: url(assets/images/testimonial/testimonial-bg-1.jpg)">
                <div class="row">
                    <div class="col-xl-4 offset-xl-7 col-lg-5 offset-lg-6 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                        <div class="testimonial-active">
                            <div class="single-testimonial text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/testimonial/t1.jpg" alt="Testimonial">
                                    <div class="quota">
                                        <i class="lni-quotation"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content mt-20">
                                    <p>"The meeting rooms were phenomenal. My team really felt at peace while we were discussing our plans for the company. I never thought there would be rooms like this one. I completely recommend."</p>
                                    <h5 class="testimonial-name mt-15">Alfred</h5>
                                    <span class="sub-title">Random Customer</span>
                                </div>
                            </div> <!-- single-testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/testimonial/t2.jpg" alt="Testimonial">
                                    <div class="quota">
                                        <i class="lni-quotation"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content mt-20">
                                    <p>"It was like living the dream while working. A lot of my co-workers enjoyed their time. The amenities also hit the spot. I really recommend trying this experience for you won't regret it."</p>
                                    <h5 class="testimonial-name mt-15">Aliana</h5>
                                    <span class="sub-title">Tesla Motors</span>
                                </div>
                            </div> <!-- single-testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/testimonial/t3.jpg" alt="Testimonial">
                                    <div class="quota">
                                        <i class="lni-quotation"></i>
                                    </div>
                                </div>
                                <div class="testimonial-content mt-20">
                                    <p>"Working on such a place was like having a luxurios experience. The ambience of nature in Glass & Nature was a serene one. Our topic on the meeting was the downsides of the new product being developed, yet we still felt the calm embrace of nature and forgot our troubles."</p>
                                    <h5 class="testimonial-name mt-15">Celina</h5>
                                    <span class="sub-title">CEO, Alo</span>
                                </div>
                            </div> <!-- single-testimonial -->
                        </div> <!--  testimonial active -->
                    </div>
                </div> <!-- row -->
            </div> <!-- testimonial bg -->
        </div> <!-- container -->
    </section>

    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Contact us</h5>
                        <h2 class="title">Get In touch</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contact-form" action="assets/contact.php" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="name" placeholder="Your Name" data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="email" name="email" placeholder="Your Email" data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="subject" placeholder="Subject" data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="phone" placeholder="Phone" data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <textarea placeholder="Your Mesaage" name="message" data-error="Please,leave us a message." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group text-center">
                                        <button type="submit" class="main-btn">send message</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== MAP PART START ======-->

    <section id="map" class="map-area">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
        <div class="map-bg bg_cover d-none d-lg-block" style="background-image: url(assets/images/map/map-bg-1.jpg)"></div>
    </section>

    <!--====== MAP PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-80 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <a href="#">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>
                            <ul class="footer-info">
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>+1880 123 456 789</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>angelerina.singson@cit.edu</p>
                                            <p>geross.rosales@cit.edu</p>
                                            <p>ninojohn.almasa@cit.edu</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>1234 Avenue Cebu City, Philippines</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                            <ul class="footer-social mt-20">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-google"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Essential Links</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#about">About</a></li>
                                <li><a href="#project">Projects</a></li>
                                <li><a href="#team">Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Services</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Office Management</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-8">
                        <div class="footer-newsleter mt-45">
                            <div class="f-title">
                                <h4 class="title">Newsletter</h4>
                            </div>
                            <p class="mt-15">Your safety is our utmost concern.</p>
                            <form action="#">
                                <div class="newsleter mt-20">
                                    <input type="email" placeholder="info@contact.com">
                                    <button><i class="lni-angle-double-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p><a href="admin/login.php" rel="nofollow">Admin Login</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- copyright-area -->
    </footer>

  <?php
    $sql = "SELECT * FROM tbl_client WHERE email = '$loggedUser' ";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    // $user = $row2['email'];

    echo "<div id='updateUser' class='modal fade'tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' >
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>

          </div>
          <div class='modal-body'>


            <div class='modal-body p-4 py-5 p-md-5'>
              <h3 class='text-center mb-3'>Edit Account</h3>
              <br>
              <form class='signup-form'  method='POST'>
                  <input type='text' class='form-control' value='". $row["userID"] ."' name='user_ID' hidden>
                <div class='form-group mb-2'>
                  <label for='name'>First Name</label>
                  <input type='text' class='form-control' value='". $row["firstname"] ."' name='fName'>
                </div>
                <div class='form-group mb-2'>
                  <label for='name'>Last Name</label>
                  <input type='text' class='form-control' value='". $row["lastname"] ."' name='lName'>
                </div>
                <div class='form-group mb-2'>
                  <label for='email'>Email</label>
                  <input type='text' class='form-control' value='". $row["email"] ."' name='Email' >
                </div>
                <div class='form-group mb-2'>
                  <label >Password</label>
                  <input type='text' class='form-control' value='". $row["password"] ."' name='Password'>
                </div>
                <div class='form-group mb-2'>
                  <label >Phone</label>
                  <input type='text' class='form-control' value='". $row["phone"] ."' name='Phone'>
                </div>
                <br>
                <div class='form-group mb-2'>
                  <button type='submit' class='form-control btn btn-primary rounded submit px-3' name='btnUpdateUser'>Upate User</button>
                </div>
              </form>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>";
  ?>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->
    <!-- modal -->
    <script src="admin/modal/js/jquery.min.js"></script>
    <script src="admin/modal/js/popper.js"></script>
    <script src="admin/modal/js/bootstrap.min.js"></script>
    <script src="admin/modal/js/main.js"></script>

    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->

    <!--====== WOW js ======-->
    <script src="assets/js/wow.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>

    <!--====== Aos js ======-->
    <script src="assets/js/aos.js"></script>


    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

</body>

</html>

<?php

  if(isset($_POST['btnUpdateUser'])){

        $fName=$_POST['fName'];
        $user=$_POST['user_ID'];
        $lName=$_POST['lName'];
        $Email=$_POST['Email'];
        $Pwd=$_POST['Password'];
        $Phone=$_POST['Phone'];

        $sql3 = mysqli_query($conn,"UPDATE tbl_client set firstname='$fName',lastname='$lName',email='$Email',password='$Pwd',phone='$Phone' where userID = $user");
        $_SESSION['login']=$Email;
        header("Location: indexx.php");

    }
  ?>
