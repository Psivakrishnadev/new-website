<?php
session_start();
include "db_conn.php";

if (isset($_POST['login'])) {
    if (isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if (empty($uname)) {
            header("Location: index.php?error=User Name is required");
            exit();
        } else if (empty($pass)) {
            header("Location: index.php?error=Password is required");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['user_name'] === $uname && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];

                    if ($row['role'] == 'employer') {
                        header('Location: company-post-jobs.php');
                        exit();
                    } elseif ($row['role'] == 'candidate') {
                        header('Location: jobs-my-resume.php');
                        exit();
                    }
                } else {
                    header("Location: login.php?error=Incorect User name or password");
                    exit();
                }
            } else {
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        }

    } else {
        header("Location: index.php");
        exit();
    }
}

?>



<!doctype html>
<html lang="en">

<!-- Mirrored from designarc.biz/demos/advotis/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 May 2020 08:31:23 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/SST-Logo.png" type="image/png">
    <title>Login</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="swc.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
    <link rel="stylesheet" href="vendors/linearicons/style.css">
    <link rel="stylesheet" href="vendors/stroke-icon/style.css">
    <!-- Rev slider css -->
    <link href="vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
    <!-- Extra Plugin CSS -->
    <link rel="stylesheet" href="vendors/owl-carousel/assets/owl.carousel.min.css">
    <link href="vendors/popup/magnific-popup.css" rel="stylesheet">
    <link href="vendors/nice-selector/css/nice-select.css" rel="stylesheet">

    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<style>
.login-wrap {
    width: 100%;
    margin: auto;
    max-width: 525px;
    min-height: 670px;
    position: relative;
    background: url(../img/Login-Image.jpg) no-repeat center;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
}

.login-html {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 60px 30px 30px 20px;
    background: rgba(40, 57, 101, .9);
}

.login-html .sign-in-htm,
.login-html .sign-up-htm {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    transform: rotateY(180deg);
    backface-visibility: hidden;
    transition: all .4s linear;
}

.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check {
    display: none;
}

.login-html .tab,
.login-form .group .label,
.login-form .group .button {
    text-transform: uppercase;
}

.login-html .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent;
}

.login-html .sign-in:checked+.tab,
.login-html .sign-up:checked+.tab {
    color: #fff;
    border-color: #1161ee;
}

.login-form {
    min-height: 345px;
    position: relative;
    perspective: 1000px;
    transform-style: preserve-3d;
}

.login-form .group {
    margin-bottom: 15px;
}

.login-form .group .label,
.login-form .group .input,
.login-form .group .button {
    width: 100%;
    color: #fff;
    display: block;
}

.login-form .group .input,
.login-form .group .button {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1);
}

.login-form .group input[data-type="password"] {
    text-security: circle;
    -webkit-text-security: circle;
}

.login-form .group .label {
    color: #aaa;
    font-size: 12px;
}

.login-form .group .button {
    background: #1161ee;
}

.login-form .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1);
}

.login-form .group label .icon:before,
.login-form .group label .icon:after {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    transition: all .2s ease-in-out 0s;
}

.login-form .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    transform: scale(0) rotate(0);
}

.login-form .group label .icon:after {
    top: 6px;
    right: 0;
    transform: scale(0) rotate(0);
}

.login-form .group .check:checked+label {
    color: #fff;
}

.login-form .group .check:checked+label .icon {
    background: #1161ee;
}

.login-form .group .check:checked+label .icon:before {
    transform: scale(1) rotate(45deg);
}

.login-form .group .check:checked+label .icon:after {
    transform: scale(1) rotate(-45deg);
}

.login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
    transform: rotate(0);
}

.login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
    transform: rotate(0);
}

.hr {
    height: 2px;
    margin: 60px 0 50px 0;
    background: rgba(255, 255, 255, .2);
}

.foot-lnk {
    text-align: center;
}
</style>

<body>

    <div class="sidebar_menu">
        <div class="close_icon">
            <span>X</span>
        </div>
        <aside class="left_widget m_img_wd">
            <img class="img-fluid" src="img/menu-img.jpg" alt="">
        </aside>
        <aside class="left_widget insight_widget">
            <div class="f_title">
                <h3>Insights</h3>
                <span></span>
            </div>
            <div class="insight_inner">
                <div class="insight_item">
                    <p>Efficiently unleash fora cash cross-media information without cross-media.</p>
                    <a href="#">October 25, 2018</a>
                </div>
                <div class="insight_item">
                    <p>Efficiently unleash fora cash cross-media information without cross-media.</p>
                    <a href="#">October 25, 2018</a>
                </div>
            </div>
        </aside>
        <aside class="left_widget button_widget">
            <a href="#"><img src="img/icon/doc-1.png" alt="">our brochure</a>
            <a href="#"><img src="img/icon/doc-2.png" alt="">Report 2017</a>
        </aside>
    </div>

    <!--================Header Area =================-->
    <header class="header_area">
        <div class="header_top">
            <div class="container">
                <div class="justify-content-between d-flex">
                    <div class="left_side">
                        <h6><i class="fa fa-phone"></i>Need any help? Talk to expert : <a href="tel:+91 70951-16441">+91
                                70951-16441</a></h6>
                    </div>
                    <div class="right_side">
                        <ul class="nav">

                            <li><a href="current-openings.html" target="_blank">Current Openings </a></li>

                            <li><a href="upload.html" target="_blank">Upload Resume</a></li>
                            <li><a href="post-your-job.html" target="_blank">Post Your Job </a></li>
                            <li><a href="contact.html" target="_blank">Contact us</a></li>
                            <!--	<li>
										<select class="lan">
											<option value="1">Members  Register</option>
											<option value="2">Freelance HR Recruiters</option>
											<option value="3">Colleges or Institutes</option>
										</select>
									</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.html"><img src="img/SST-Logo.png" alt="" width="114px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="dropdown submenu active">
                            <li class="dropdown submenu ">
                                <a href="index.html">Home</a>
                                <!--<ul class="dropdown-menu">

											<li><a href="index-5.html">Home Page 5</a></li>

										</ul> -->
                            </li>

                            <li class="dropdown submenu ">
                                <a href="about.html">About Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html" target="_blank">About SST</a></li>
                                    <li><a href="infrastructure.html" target="_blank">Leadership Team</a></li>
                                    <!--<li><a href="people.html">Why People Choose us</a></li>-->

                                </ul>
                            </li>
                            <li class="dropdown submenu ">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Services</a>
                                <ul class="dropdown-menu">
                                    <li><a href="recruitment.html" target="_blank">Recruitment Process Outsourcing </a>
                                    </li>
                                    <li><a href="permanant-staffing.html" target="_blank">Permanent Staffing</a></li>
                                    <li><a href="employee-leasing.html" target="_blank">Employee Leasing</a></li>
                                    <li><a href="temporary-staffing.html" target="_blank">Temporary Staffing </a></li>
                                    <li><a href="execute-search.html" target="_blank">Executive Level Search</a></li>


                                </ul>
                                <!--<li class="dropdown submenu mega_menu tab-demo">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
										<ul class="dropdown-menu">
											<li>
												<div class="row">
													<div class="col-lg-4 tabHeader">
														<ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
															<li class="active">
																<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Our Approach</a>
															</li>
															<li>
																<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Industry Expertise</a>
															</li>
															<li>
																<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Service overview</a>
															</li>
															<li>
																<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Our Impact</a>
															</li>
														</ul>
													</div>
													<div class="col-lg-8">
														<div class="tab-content tabContent" id="v-pills-tabContent">
															<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
																<p>We engage across all levels of clients’ organizations, ensuring buy in and own-ership for the solution.</p>
																<p>We firmly believe in developing action-able solutions with equal focus on solu-tion design and subsequent implemen-tation.</p>
																<a class="product_btn" href="about-us.html">Know more about us</a>
															</div>
															<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
																<ul class="nav flex-column">
																	<li><a href="financial.html">Banking &amp; Financial</a></li>
																	<li><a href="automobile.html">Automobiles</a></li>
																	<li><a href="chemical.html">Chemicals</a></li>
																	<li><a href="consumer.html">Consumer Good &amp; Retails</a></li>
																	<li><a href="education.html">Education</a></li>
																	<li><a href="goods.html">Engineerning Goods</a></li>
																	<li><a href="health.html">Health &amp; Pharmaceuticals</a></li>
																	<li><a href="construction.html">Infrastructure &amp; Constructions</a></li>
																	<li><a href="metals.html">Metals</a></li>
																	<li><a href="other.html">others</a></li>
																</ul>
															</div>
															<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
																<ul class="nav flex-column">
																	<li><a href="strategy.html">Strategy</a></li>
																	<li><a href="business-process.html">Business Process Tranformation</a></li>
																	<li><a href="performance.html">Performance Improvement</a></li>
																	<li><a href="transformation.html">Transformation Service</a></li>
																	<li><a href="transactions.html">Transactions</a></li>
																</ul>
															</div>
															<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
																<ul class="nav flex-column">
																	<li><a href="client.html">Client Results</a></li>
																	<li><a href="client-speak.html">Client Speak</a></li>
																	<li><a href="edge.html">Company Edge Series</a></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</li> -->
                            <li class="dropdown submenu ">
                                <a href="clients.html" target="_blank">Clients</a>
                                <!--<ul class="dropdown-menu">
											<li><a href="company-logo.html">Compnaies logo's </a></li>

										</ul> -->
                            </li>
                            <li class="dropdown submenu ">
                                <a href="industries.html" target="_blank">Industires</a>
                                <!--	<ul class="dropdown-menu">
											<li><a href="automobile.html">Automobile </a></li>
											<li><a href="banking-insurance.html">Banking and  Insurance</a></li>
											<li><a href="education.html">Education</a></li>
											<li><a href="finance.html">Finance </a></li>
											<li><a href="information-technology.html">Information Technology</a></li>
											<li><a href="mining.html">Mining</a></li>
											<li><a href="ratails.html">Retails</a></li>
											<li><a href="aviation-aerospace.html">Aviation & Aerospace</a></li>
											<li><a href="bpo-kpo.html">BPO & KPO</a></li>
											<li><a href="energy.html">Energy</a></li>
											<li><a href="infrastructure.html">Infrastructure</a></li>
											<li><a href="media.html">Media</a></li>
											<li><a href="manufacturing.html">Manufacturing</a></li>
											<li><a href="telecommunication.html">Telecommunication</a></li>
										</ul> -->
                            </li>
                            <li class="dropdown submenu ">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Job Seekars</a>
                                <ul class="dropdown-menu right">
                                    <li><a href="jobs-profile.html" target="_blank">My Profile</a></li>
                                    <li><a href="#">My Resume</a></li>
                                    <li><a href="jobs-applied-job.html" target="_blank">Applied Job</a></li>
                                    <li><a href="jobs-alerts.html" target="_blank">Job Alert</a></li>
                                    <li><a href="jobs-saved-jobs.html" target="_blank">Saved Jobs</a></li>
                                    <li><a href="jobs-change-password.html" target="_blank">Change Password</a></li>

                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Employers</a>
                                <ul class="dropdown-menu right">
                                    <li><a href="company-profile.html" target="_blank">Company Profile</a></li>
                                    <li><a href="company-resume.html" target="_blank">Employer Resume</a></li>
                                    <li><a href="company-post-jobs.html" target="_blank">Post A Job</a></li>
                                    <li><a href="company-manage-job.html" target="_blank">Manage Job</a></li>


                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">Register </a>
                                <ul class="dropdown-menu right">
                                    <li><a href="corporate-register.html" target="_blank">Employer </a></li>
                                    <li><a href="college-register.html" target="_blank">Colleges / Institutes </a></li>
                                    <li><a href="candidate-register.html" target="_blank">Candidate </a></li>
                                    <li><a href="freelance-hr.html" target="_blank">Freelance HR Recruiters</a></li>

                                </ul>
                            </li>
                            <!--<li class="dropdown submenu">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Members  Register </a>
										<ul class="dropdown-menu right">
											<li><a href="#">Freelance HR Recruiters</a></li>
											<li><a href="#">Colleges or Institutes</a></li>

										</ul>
									</li> -->
                            <div class="group"
                                style="margin-top:20px;padding: 11px 33px;font-size:15px;background: #21479a;height: 52px;border-radius: 19px">
                                <a href="login.html" target="_blank">Login</a>
                            </div>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="popup-with-zoom-anim" href="#test-search"><i class="icon icon-Search"></i></a>
                            </li>
                            <li class="side_menu"><a href="#"><img src="img/icon/menu.png" alt=""></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--================End Header Area =================-->

    <section class="breadcrumb_area">
        <div class="breadcrumb_top30">
            <div class="container">
                <!--<h2></h2> -->
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </section>


    <section class="get_touch_form_area contact_page p_100">
        <div class="container">

            <div class="row">
                <div class="col-lg-7">
                    <h2 class="single_title">LOGIN</h2>
                    <form class="row call_back_form" action="login.php" method="post">
                        <?php if (isset($_GET['error'])) {?>
                        <p class="text-danger ml-4"><?php echo $_GET['error']; ?></p>
                        <?php }?>
                        <?php if (isset($_GET['success'])) {?>
                        <p class="text-success ml-4"><?php echo $_GET['success']; ?></p>
                        <?php }?>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" id="name" name="uname" placeholder="Username">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>

                        <div class="form-group col-md-12">
                            <select class="discuss">
                                <option value disabled selected>Sign in for</option>
                                <option value="select">Employer</option>
                                <option value="m">Candidate</option>
                                <option value="f">College/Institutes</option>
                                <option value="others">Freelance HR Recruiters</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4" style="line-height:110px">
                            <input type="submit" value="Login" name="login" class="btn submit_btn form-control"
                                style="#1a2f5f">
                        </div>
                    </form>
                </div>

                <div class="col-lg-5">
                    <img class="img-fluid" src="img/Login-Image.jpg" alt="" style="height:580px">
                </div>
            </div>
        </div>
    </section>





    <!-- Content END-->
    <!-- Modal Box -->
    <div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body row m-a0 clearfix">
                    <div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0"
                        style="background-image:url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
                        <div class="form-info text-white align-self-center">
                            <h3 class="m-b15">Login To You Now</h3>
                            <p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                has been the industry.</p>
                            <ul class="list-inline m-a0">
                                <li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 p-a0">
                        <div class="lead-form browse-job text-left">
                            <form>
                                <h3 class="m-t0">Personal Details</h3>
                                <div class="form-group">
                                    <input value="" class="form-control" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <input value="" class="form-control" placeholder="Mobile Number" />
                                </div>
                                <div class="clearfix">
                                    <button type="button" class="btn-primary site-button btn-block">Submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Box End -->


    <!--================Footer Area =================-->
    <footer class="footer_area footer_two">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <aside class="f_widget ab_widget">
                            <img src="img/SST-Logo.png" alt="" width="120px">
                            <p>854 Lorance Road, Rose Vallery, <br /> Orlando, New York 8564, <br /> United States.</p>
                            <h6>Talk to an expert </h6>
                            <a href="tel:18004567890">1800 456 7890</a>
                        </aside>
                    </div>
                    <div class="col-lg-5 col-sm-6">
                        <aside class="f_widget link_widget">
                            <div class="f_title">
                                <h3>Useful Links</h3>
                                <span></span>
                            </div>
                            <ul class="nav flex-column">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">All Industries</a></li>
                                <li><a href="#">Case Studies</a></li>
                                <li><a href="#">Insights</a></li>
                                <li><a href="#">Testimonials</a></li>
                            </ul>
                            <ul class="nav flex-column">
                                <li><a href="#">Meet Our Team</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Mission & Vision</a></li>
                                <li><a href="#">Our Partners</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <aside class="f_widget news_widget">
                            <div class="f_title">
                                <h3>Newsletter</h3>
                                <span></span>
                            </div>
                            <p>Get latest updates and offers.</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your email address"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><i class="fa fa-paper-plane"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <ul class="nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="justify-content-between d-flex">
                    <div class="left">
                        <p>© Copyright Advotis Firm <script>
                            document.write(new Date().getFullYear());
                            </script> . All right reserved.</p>
                    </div>
                    <div class="right">
                        <p>Created by <a href="#">DesignArc</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!--================Search Box Area =================-->
    <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
        <div class="search_box_inner">
            <h3>Search</h3>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter search keywords">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                </span>
            </div>
        </div>
    </div>
    <!--================End Search Box Area =================-->

    <!--================Contact Success and Error message Area =================-->
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals error -->

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
    <!--================End Contact Success and Error message Area =================-->


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="swc.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Rev slider js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Rev slider js -->
    <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <!-- Extra Plugin js -->
    <script src="vendors/nice-selector/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/nice-selector/js/jquery.nice-select.min.js"></script>
    <script src="vendors/counterup/jquery.waypoints.min.js"></script>
    <script src="vendors/counterup/jquery.counterup.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/contact.js"></script>


    <script src="js/theme.js"></script>
</body>

<!-- Mirrored from designarc.biz/demos/advotis/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 May 2020 08:33:11 GMT -->

</html>