<?php

include('includes/database.php');
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_mobile']);
if(isset($_SESSION["user_id"])){
      header("location:profile.php");
    }

$msg = "";

if (isset($_POST['submit']))
  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM  user_registration WHERE user_email = '$email' AND user_password = '$password'";

    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    //if user record is available in database then $count will be equal to 1
    if($count == 1)
    {
        $sqlt = "SELECT * FROM  user_registration WHERE user_email = '$email' AND status = 1";

        $resultt = mysqli_query($con,$sqlt);
        $countt = mysqli_num_rows($resultt);
        if ($countt == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["user_name"];
            $_SESSION['user_email'] = $row["user_email"];
            $_SESSION['user_mobile'] = $row["user_mobile"];

            header("location: profile.php");
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['email'] = $email;
            header('location: user-verify.php');
        }

      
    }
    else
    {
      $msg = "Email id and Password Does not Match. Please try again!";
    }

    
  }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DGM | Online GYM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="services.php">Search Gym</a></li>
                <!--<li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="about-us.html">About us</a></li>
                        <li><a href="class-timetable.html">Classes timetable</a></li>
                        <li><a href="bmi-calculator.html">Bmi calculate</a></li>
                        <li><a href="team.html">Our team</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog.html">Our blog</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>-->
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gym-register.php">Register GYM</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="login.php">Login</a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/DGM-01.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <!--<li><a href="classes.html">Classes</a></li>-->
                            <li><a href="services.php">Search Gym</a></li>
                            <!--<li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="class-timetable.html">Classes timetable</a></li>
                                    <li><a href="bmi-calculator.html">Bmi calculate</a></li>
                                    <li><a href="team.html">Our team</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="blog.html">Our blog</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                            </li>-->
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="gym-register.php">Register GYM</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <a href="login.php">Login</a>
                            <a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Login</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Services Section Begin -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Login</h2>
                    </div>

                    <div class="leave-comment">
                        <p class="text-danger"><?= $msg ?></p>
                        <?php
                        if (isset($_GET['reset'])) {
                            if ($_GET['reset'] == 'success') {
                            echo "<p class='text-primary'>Password changed successfully. Please login now!</p>";
                            }
                        }
                        ?>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required>
                            <p style="color: red">* Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more character</p>
                            <button type="submit" name="submit">Submit</button>
                        </form>
                        <br>
                        <h2 style="color: white; font-size: 22px"><span style="float: left">Forgot Password <a href="forgot_password.php">Click Here</span></a><span style="float: right">Create a <a href="user_registration.php"><span>New Account</span></a></h2>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>Kachauri Gali, Patna City, Bihar<br/> 800008</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>+91-7033034637</li>
                            <li>+91-9113764578</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>navjot.s.ota456@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/logo1.png" alt=""></a>
                        </div>
                        <!--<div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa  fa-envelope-o"></i></a>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Useful links</h4>
                        <ul>
                            <li><a href="about-us.php">About</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="termsConditions.php">T.&.C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div style="width: auto; margin-left: 16px">
                    <?php include('includes/subscribe.php'); ?>
                </div>
                <!--<div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h4>Tips & Guides</h4>
                        <div class="fw-recent">
                            <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                        <div class="fw-recent">
                            <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  DGM | Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <br> This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>