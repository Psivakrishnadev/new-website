<?php
include "db_conn.php";
if (isset($_POST['register'])) {
    if (isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
        if (empty($uname)) {
            header("Location: register.php?error=User Name is required");
            exit();
        } else if (empty($pass)) {
            header("Location: register.php?error= Password is required");
            exit();
        } else if (empty($uname)) {
            header("Location: register.php?error=Full Name is required");
            exit();
        } else {
            $sql = "INSERT INTO users (user_name, password, name,email,role) VALUES ('$uname', '$pass', '$name','$email','$role');";

            $result = mysqli_query($conn, $sql);
            header("Location: login.php?success=thank you for register");
            exit();
        }

    } else {
        header("Location: register.php");
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
    <title>Candidate</title>
    <!-- Bootstrap CSS -->
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
    <link rel="stylesheet" href="vendors/nice-selector/css/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/assets/owl.carousel.min.css">
    <link href="vendors/popup/magnific-popup.css" rel="stylesheet">
    <link href="vendors/nice-selector/css/nice-select.css" rel="stylesheet">

    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

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
                <h3>Any Technical Queries</h3>
                <span></span>
            </div>
            <div class="insight_inner">
                <div class="insight_item">
                    <p>Skills Spout Technology <br /> #82, RD Number 7, <br /> Women's Welfare Housing Society<br />
                        Jubilee Hills<br />Hyderabad - Telangana <br />500033</p>
                    <a href="tel:+91 9573828760">+91 9573828760</a>
                </div>
                <div class="insight_item">

                </div>
            </div>
        </aside>
        <aside class="left_widget button_widget">
            <a href="#"><img src="img/icon/doc-1.png" alt="">our brochure</a>
            <ul class="nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
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
                            <li class="dropdown submenu">
									<a href="clients.html" target="_blank">Clients</a>
									<!--<ul class="dropdown-menu">
										<li><a href="company-logo.html">Compnaies logo's </a></li>
										
									</ul> -->
								</li>
								<li class="dropdown submenu">
									<a href="industries.html" target="_blank">Industires</a>
									
								</li>
								
								<li class="dropdown submenu">
								<a href="register.php" target="_blank">Register</a>
									
								</li>
								
								<li class="dropdown submenu">
								<a href="login.php" target="_blank">Login</a>
								</li>
                            
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
                            
                            <!--<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Members  Register </a>
									<ul class="dropdown-menu right">
										<li><a href="#">Freelance HR Recruiters</a></li>
										<li><a href="#">Colleges or Institutes</a></li>

									</ul>
								</li> -->
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
        <div class="breadcrumb_top27">
            <div class="container">
                <!--<h2></h2> -->
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#">Candidate Register</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="get_touch_form_area contact_page p_100">
        <div class="container">
            <h2 class="single_title">CANDIDATE REGISTRATION </h2>
            <div class="row">
                <div class="col-lg-7">
                    <form class="row call_back_form" method="post">
                        <?php if (isset($_GET['error'])) {?>
                        <p class="text-danger ml-4"><?php echo $_GET['error']; ?></p>
                        <?php }?>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="FullName">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" id="name" name="uname" placeholder="Username">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email address">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Re-type Your Password">
                        </div>
                        <div class="form-group col-md-12">
                            <select class="discuss" name="role">
                                <option value disabled selected>Register For</option>
                                <option value="employer">Employer</option>
                                <option value="candidate">Candidate</option>
                                <option value="college-institutes">College/Institutes</option>
                                <option value="others">Freelance HR Recruiters</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4" style="line-height:110px">
                            <input type="submit" value="Register" name="register" class="btn submit_btn form-control"
                                style="#1a2f5f">
                        </div>
                    </form>
                </div>

                <div class="col-lg-5">

                    <img class="img-fluid" src="img/Candidate1.jpg" alt="" style="height:580px">
                </div>
            </div>
        </div>
    </section>
    <!--================Footer Area =================-->
    <footer class="footer_area footer_two">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <aside class="f_widget ab_widget">
                            <img src="img/SST-Logo.png" alt="" width="120px">
                            <p>Skills Spout Technology <br /> #82, RD Number 7, <br /> Women's Welfare Housing
                                Society<br />
                                Jubilee Hills<br />Hyderabad - Telangana <br />500033</p>

                            <a href="tel:+91 70951-16441">+91 70951-16441</a>
                        </aside>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <aside class="f_widget link_widget">
                            <div class="f_title">
                                <h3>Useful Links</h3>
                                <span></span>
                            </div>
                            <ul class="nav flex-column">
                                <li><a href="about.html">About SST</a></li>
                                <li><a href="infrastructure.html">Leadership Team</a></li>

                                <li><a href="clients.html">Clients</a></li>
                                <li><a href="industries.html">Industires</a></li>

                            </ul>
                            <ul class="nav flex-column">
                                <li><a href="current-openings.html">Current Openings </a></li>
                                <li><a href="apply-for-job.html">Apply For Job</a></li>

                                <li><a href="contact.html">Contact Us</a></li>

                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-sm-6">
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
                        <p>© DESIGNED BY GROWTH TECH INNOVATIONS.<script>
                            document.write(new Date().getFullYear());
                            </script> ALL RIGHTS RESERVED. </p>
                    </div>
                    <div class="right">

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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