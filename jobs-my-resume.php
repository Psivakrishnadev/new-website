<?php
include "db_conn.php";
if (isset($_POST['skill'])) {
    $skils = $_POST['skils'];
    // die($skils);
    $sql = "INSERT INTO resumes (skills) VALUES ('$skils');";
    $result = mysqli_query($conn, $sql);
}
if (isset($_POST['social_profile'])) {
    $social_profile_name = $_POST['social_profile_name'];
    $social_description = $_POST['social_description'];
    $social_url = $_POST['social_url'];
    // die($social_profile_name);

    $sql = "UPDATE `test_db`.`resumes` SET `social_profile_name`='$social_profile_name', `social_description`='$social_description', `social_url`='$social_url' WHERE  `id`=1;";

    $result = mysqli_query($conn, $sql);
    // die('hello');
}
if (isset($_POST['social_profile'])) {
    $social_profile_name = $_POST['social_profile_name'];
    $social_description = $_POST['social_description'];
    $social_url = $_POST['social_url'];
    // die($social_profile_name);

    $sql = "UPDATE `test_db`.`resumes` SET `social_profile_name`='$social_profile_name', `social_description`='$social_description', `social_url`='$social_url' WHERE  `id`=1;";

    $result = mysqli_query($conn, $sql);
    // die('hello');
}
if (isset($_POST['work'])) {
    $work_title = $_POST['work_title'];
    $work_url = $_POST['work_url'];
    $currently_status = $_POST['currently_status'];
    $work_description = $_POST['work_description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    // die($social_profile_name);

    // $sql = "UPDATE `test_db`.`resumes` SET `social_profile_name`='$social_profile_name', `social_description`='$social_description', `social_url`='$social_url' WHERE  `id`=1;";
    $sql = "UPDATE `test_db`.`resumes` SET `work_title`='$work_title', `work_url`='$work_url',  `currently_status`='$currently_status', `work_description`='$work_description', `start_date`='$start_date', `end_date`='$end_date' WHERE  `id`=1;";
    $result = mysqli_query($conn, $sql);
    // die('hello');
}
if (isset($_POST['paper'])) {
    $paper_title = $_POST['paper_title'];
    $paper_url = $_POST['paper_url'];
    $paper_publish_date = $_POST['paper_publish_date'];
    $paper_description = $_POST['paper_description'];
    // die($social_profile_name);

    // $sql = "UPDATE `test_db`.`resumes` SET `social_profile_name`='$social_profile_name', `social_description`='$social_description', `social_url`='$social_url' WHERE  `id`=1;";
    $sql = "UPDATE `test_db`.`resumes` SET `paper_title`='$paper_title', `paper_url`='$paper_url', `paper_publish_date`='$paper_publish_date', `paper_description`='$paper_description' WHERE  `id`=1;";
    $result = mysqli_query($conn, $sql);
    // die('hello');
}
if (isset($_POST['upload_file'])) {
    $upload_file = $_POST['upload_file'];
    // die($upload_file);
    $sql = "UPDATE `test_db`.`resumes` SET `upload_file`='$upload_file' WHERE  `id`=1;";
    // $sql = "UPDATE `test_db`.`resumes` SET `upload_file`='$upload_file' WHERE  `id`=1;";
    $result = mysqli_query($conn, $sql);
    if (isset($_FILES['upload_file'])) {
        $errors = array();
        $file_name = $_FILES['upload_file']['name'];
        $file_size = $_FILES['upload_file']['size'];
        $file_tmp = $_FILES['upload_file']['tmp_name'];
        $file_type = $_FILES['upload_file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['upload_file']['name'])));

        $extensions = array("jpeg", "jpg", "png", "zip");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
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
    <title>My Resume</title>
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

    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/templete.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
        <div class="breadcrumb_top17">
            <div class="container">
                <!--<h2></h2> -->
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#">My Resume</a></li>
                </ul>
            </div>
        </div>
    </section>


    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 candidate-info">
                        <div class="candidate-detail">
                            <div class="canditate-des text-center">
                                <a href="javascript:void(0);">
                                    <img alt="" src="images/team/pic1.jpg">
                                </a>
                                <div class="upload-link" title="update" data-toggle="tooltip" data-placement="right">
                                    <input type="file" class="update-flie">
                                    <i class="fa fa-camera"></i>
                                </div>
                            </div>
                            <div class="text-white browse-job text-left">
                                <h4 class="m-b0">John Doe
                                    <a class="m-l15 font-16 text-white" data-toggle="modal" data-target="#profilename"
                                        href="#"><i class="fa fa-pencil"></i></a>
                                </h4>
                                <p class="m-b15">Freelance Senior PHP Developer at various agencies</p>
                                <ul class="clearfix">
                                    <li><i class="ti-location-pin"></i> Sacramento, California</li>
                                    <li><i class="ti-mobile"></i> +1 123 456 7890</li>
                                    <li><i class="ti-briefcase"></i> Fresher</li>
                                    <li><i class="ti-email"></i> info@example.com</li>
                                </ul>
                                <div class="progress-box m-t10">
                                    <div class="progress-info">Profile Strength (Average)<span>70%</span></div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width: 80%" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <a href="javascript:void(0);">
                            <div class="pending-info text-white p-a25">
                                <h5>Pending Action</h5>
                                <ul class="list-check secondry">
                                    <li>Verify Mobile Number</li>
                                    <li>Add Preferred Location</li>
                                    <li>Add Resume</li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade browse-job modal-bx-info editor" id="profilename" tabindex="-1" role="dialog"
                aria-labelledby="ProfilenameModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ProfilenameModalLongTitle">Basic Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input type="email" class="form-control" placeholder="Enter Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="fresher"
                                                            name="example1">
                                                        <label class="custom-control-label"
                                                            for="fresher">Fresher</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="experienced" name="example1">
                                                        <label class="custom-control-label"
                                                            for="experienced">Experienced</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Select Your Country</label>
                                            <select>
                                                <option>India</option>
                                                <option>Australia</option>
                                                <option>Bahrain</option>
                                                <option>China</option>
                                                <option>Dubai</option>
                                                <option>France</option>
                                                <option>Germany</option>
                                                <option>Hong Kong</option>
                                                <option>Kuwait</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Select Your Country</label>
                                            <input type="text" class="form-control" placeholder="Select Your Country">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Select Your City</label>
                                            <input type="text" class="form-control" placeholder="Select Your City">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Telephone Number</label>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <input type="text" class="form-control" placeholder="Country Code">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <input type="text" class="form-control" placeholder="Area Code">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <input type="text" class="form-control" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <h6 class="m-a0 font-14">info@example.com</h6>
                                            <a href="#">Change Email Address</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="site-button" data-dismiss="modal">Cancel</button>
                            <button type="button" class="site-button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full browse-job content-inner-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 m-b30">
                            <div class="sticky-top bg-white">
                                <div class="candidate-info onepage">
                                    <ul>
                                        <li><a class="scroll-bar nav-link" href="#key_skills_bx">
                                                <span>Key Skills</span></a></li>


                                        <li><a class="scroll-bar nav-link" href="#accomplishments_bx">
                                                <span>Accomplishments</span></a></li>
                                        <li><a class="scroll-bar nav-link" href="#desired_career_profile_bx">
                                                <span>Desired Career Profile</span></a></li>
                                        <li><a class="scroll-bar nav-link" href="#personal_details_bx">
                                                <span>Personal Details</span></a></li>
                                        <li><a class="scroll-bar nav-link" href="#attach_resume_bx">
                                                <span>Attach Resume</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
                            <?php if (isset($_GET['error'])) {?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                            <?php }?>
                            <?php if (isset($_GET['success'])) {?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                            <?php }?>
                            <div id="key_skills_bx" class="job-bx bg-white m-b30">
                                <div class="d-flex">
                                    <h5 class="m-b15">Key Skills</h5>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#keyskills"
                                        class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
                                </div>
                                <div class="job-time mr-auto">
                                    <a href="javascript:void(0);"><span>Javascript</span></a>
                                    <a href="javascript:void(0);"><span>CSS</span></a>
                                    <a href="javascript:void(0);"><span>HTML</span></a>
                                    <a href="javascript:void(0);"><span>Bootstrap</span></a>
                                    <a href="javascript:void(0);"><span>Web Designing</span></a>
                                    <a href="javascript:void(0);"><span>Photoshop</span></a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade modal-bx-info editor" id="keyskills" tabindex="-1" role="dialog"
                                    aria-labelledby="KeyskillsModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="KeyskillsModalLongTitle">Key Skills</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="jobs-my-resume.php" method="post">
                                                <div class="modal-body">
                                                    <p>It is the first thing recruiters notice in your profile. Write
                                                        concisely what makes you unique and right person for the job you
                                                        are
                                                        looking for.</p>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="skils"
                                                                    class="form-control tags_input"
                                                                    placeholder="html,css,bootstrap,photoshop" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="site-button"
                                                        data-dismiss="modal">Cancel</button>
                                                    <input type="submit" name="skill" value="Save" class="site-button">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->
                            </div>

                            <div id="accomplishments_bx" class="job-bx bg-white m-b30">
                                <h5 class="m-b10">Accomplishments</h5>
                                <div class="list-row">
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">Online Profile</h6>
                                            <a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#accomplishments" class="site-button add-btn button-sm"><i
                                                    class="fa fa-pencil m-r5"></i> Edit</a>
                                        </div>
                                        <p class="m-b0">Add link to Online profiles (e.g. Linkedin, Facebook etc.).</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="accomplishments" tabindex="-1"
                                            role="dialog" aria-labelledby="AccomplishmentsModalLongTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="AccomplishmentsModalLongTitle">
                                                            Online Profiles</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="jobs-my-resume.php" method="post">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Social Profile</label>
                                                                        <input type="text" name="social_profile_name"
                                                                            class="form-control"
                                                                            placeholder="Social Profile Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input type="text" name="social_url"
                                                                            class="form-control"
                                                                            placeholder="www.google.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="social_description"
                                                                            class="form-control"
                                                                            placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <input type="submit" value="Save" name="social_profile"
                                                            class="site-button">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">Work Sample</h6>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#worksample"
                                                class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i>
                                                Edit</a>
                                        </div>
                                        <p class="m-b0">Add link to your Projects (e.g. Github links etc.).</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="worksample" tabindex="-1"
                                            role="dialog" aria-labelledby="WorksampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="WorksampleModalLongTitle">Work
                                                            Sample</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Work Title</label>
                                                                        <input type="text" name="work_title"
                                                                            class="form-control"
                                                                            placeholder="Enter Title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input type="text" name="work_url"
                                                                            class="form-control"
                                                                            placeholder="www.google.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Duration From</label>
                                                                        <input type="date" name="start_date">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Duration to</label>
                                                                        <input type="date" name="end_date">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="currently_status" id="check1"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="check1">I am currently working
                                                                                on
                                                                                this</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control"
                                                                            name="work_description"
                                                                            placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <input type="submit" value="Save" name="work"
                                                            class="site-button">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">White Paper / Research Publication / Journal Entry
                                            </h6>
                                            <a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#journalentry" class="site-button add-btn button-sm"><i
                                                    class="fa fa-pencil m-r5"></i> Edit</a>
                                        </div>
                                        <p class="m-b0">Add links to your Online publications.</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="journalentry" tabindex="-1"
                                            role="dialog" aria-labelledby="JournalentryModalLongTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="JournalentryModalLongTitle">White
                                                            Paper / Research Publication / Journal Entry</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">

                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" name="paper_title"
                                                                            class="form-control"
                                                                            placeholder="Enter Title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input type="text" name="paper_url"
                                                                            class="form-control"
                                                                            placeholder="www.google.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Published On</label>
                                                                        <div>
                                                                            <input type="date"
                                                                                name="paper_publish_date">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control"
                                                                            name="paper_description"
                                                                            placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <input type="submit" name="paper" value="Save"
                                                            class="site-button">
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">Presentation</h6>
                                            <a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#presentation" class="site-button add-btn button-sm"><i
                                                    class="fa fa-pencil m-r5"></i> Edit</a>
                                        </div>
                                        <p class="m-b0">Add links to your Online presentations (e.g. Slideshare
                                            presentation links etc.).</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="presentation" tabindex="-1"
                                            role="dialog" aria-labelledby="PresentationModalLongTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="PresentationModalLongTitle">
                                                            Presentation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Enter Title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="www.google.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control"
                                                                            placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="site-button">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">Patent</h6>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#patent"
                                                class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i>
                                                Edit</a>
                                        </div>
                                        <p class="m-b0">Add details of Patents you have filed.</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="patent" tabindex="-1"
                                            role="dialog" aria-labelledby="PatentModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="PatentModalLongTitle">Patent</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Enter Title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="www.google.com">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Patent Office</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Enter Patent Office">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6">
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="check2" name="example1">
                                                                                    <label class="custom-control-label"
                                                                                        for="check2">Patent
                                                                                        Issued</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6">
                                                                                <div
                                                                                    class="custom-control custom-radio">
                                                                                    <input type="radio"
                                                                                        class="custom-control-input"
                                                                                        id="check3" name="example1">
                                                                                    <label class="custom-control-label"
                                                                                        for="check3">Patent
                                                                                        pending</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Application Number</label>
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Enter Application Number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Published On</label>
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                <select>
                                                                                    <option>2018</option>
                                                                                    <option>2020</option>
                                                                                    <option>2016</option>
                                                                                    <option>2015</option>
                                                                                    <option>2014</option>
                                                                                    <option>2013</option>
                                                                                    <option>2012</option>
                                                                                    <option>2011</option>
                                                                                    <option>2010</option>
                                                                                    <option>2009</option>
                                                                                    <option>2008</option>
                                                                                    <option>2007</option>
                                                                                    <option>2006</option>
                                                                                    <option>2005</option>
                                                                                    <option>2004</option>
                                                                                    <option>2003</option>
                                                                                    <option>2002</option>
                                                                                    <option>2001</option>
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                                <select>
                                                                                    <option>january</option>
                                                                                    <option>february</option>
                                                                                    <option>March</option>
                                                                                    <option>April</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>July</option>
                                                                                    <option>August</option>
                                                                                    <option>September</option>
                                                                                    <option>October</option>
                                                                                    <option>November</option>
                                                                                    <option>December</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control"
                                                                            placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="site-button">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                    <div class="list-line">
                                        <div class="d-flex">
                                            <h6 class="font-14 m-b5">Certification</h6>
                                            <a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#certification" class="site-button add-btn button-sm"><i
                                                    class="fa fa-pencil m-r5"></i> Edit</a>
                                        </div>
                                        <p class="m-b0">Add details of Certification you have filed.</p>
                                        <!-- Modal -->
                                        <div class="modal fade modal-bx-info editor" id="certification" tabindex="-1"
                                            role="dialog" aria-labelledby="CertificationModalLongTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="CertificationModalLongTitle">
                                                            Certification</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Certification Name</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Certification Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Certification Body</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Certification Body">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Year Onlabel</label>
                                                                        <select>
                                                                            <option>2018</option>
                                                                            <option>2020</option>
                                                                            <option>2016</option>
                                                                            <option>2015</option>
                                                                            <option>2014</option>
                                                                            <option>2013</option>
                                                                            <option>2012</option>
                                                                            <option>2011</option>
                                                                            <option>2010</option>
                                                                            <option>2009</option>
                                                                            <option>2008</option>
                                                                            <option>2007</option>
                                                                            <option>2006</option>
                                                                            <option>2005</option>
                                                                            <option>2004</option>
                                                                            <option>2003</option>
                                                                            <option>2002</option>
                                                                            <option>2001</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="site-button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="site-button">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End -->
                                    </div>
                                </div>
                            </div>
                            <div id="desired_career_profile_bx" class="job-bx bg-white m-b30">
                                <div class="d-flex">
                                    <h5 class="m-b30">Desired Career Profile</h5>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#desiredprofile"
                                        class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade modal-bx-info editor" id="desiredprofile" tabindex="-1"
                                    role="dialog" aria-labelledby="DesiredprofileModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="DesiredprofileModalLongTitle">Desired Career
                                                    Profile </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Industry</label>
                                                                <select>
                                                                    <option>Accounting / Finance</option>
                                                                    <option>Banking / Financial Services / Broking
                                                                    </option>
                                                                    <option>Education / Teaching / Training</option>
                                                                    <option>IT-Hardware &amp; Networking</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Functional Area / Department</label>
                                                                <select>
                                                                    <option>Agent</option>
                                                                    <option>Architecture / Interior Design</option>
                                                                    <option>Beauty / Fitness / Spa Services</option>
                                                                    <option>IT Hardware / Technical Support</option>
                                                                    <option>IT Software - System Programming</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Role</label>
                                                                <select>
                                                                    <option>Creative</option>
                                                                    <option>Web Designer</option>
                                                                    <option>Graphic Designer</option>
                                                                    <option>National Creative Director</option>
                                                                    <option>Fresher</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Job Type</label>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="permanent" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="permanent">Permanent</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="contractual" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="contractual">Contractual</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Employment Type</label>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="fulltime" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="fulltime">Full Time</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="parttime" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="parttime">Part Time</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Preferred Shift</label>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input" id="day"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="day">Day</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input" id="night"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="night">Night</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input"
                                                                                id="flexible" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="flexible">Part Time</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Availability to Join</label>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <select>
                                                                            <option>2018</option>
                                                                            <option>2019</option>
                                                                            <option>2020</option>
                                                                            <option>2021</option>
                                                                            <option>2022</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <select>
                                                                            <option>january</option>
                                                                            <option>february</option>
                                                                            <option>March</option>
                                                                            <option>April</option>
                                                                            <option>May</option>
                                                                            <option>Jun</option>
                                                                            <option>July</option>
                                                                            <option>August</option>
                                                                            <option>September</option>
                                                                            <option>October</option>
                                                                            <option>November</option>
                                                                            <option>December</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Expected Salary</label>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input"
                                                                                id="usdollars" name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="usdollars">US Dollars</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input" id="rupees"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="rupees">Indian Rupees</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-6">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <select>
                                                                            <option>0 lakh</option>
                                                                            <option>1 lakh</option>
                                                                            <option>2 lakh</option>
                                                                            <option>5 lakh</option>
                                                                            <option>4 lakh</option>
                                                                            <option>5 lakh</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                                        <select>
                                                                            <option> 05 Thousand </option>
                                                                            <option> 10 Thousand </option>
                                                                            <option> 15 Thousand </option>
                                                                            <option> 20 Thousand </option>
                                                                            <option> 25 Thousand </option>
                                                                            <option> 30 Thousand </option>
                                                                            <option> 35 Thousand </option>
                                                                            <option> 40 Thousand </option>
                                                                            <option> 45 Thousand </option>
                                                                            <option> 50 Thousand </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Desired Location</label>
                                                                <select>
                                                                    <option>India</option>
                                                                    <option>Australia</option>
                                                                    <option>Bahrain</option>
                                                                    <option>China</option>
                                                                    <option>Dubai</option>
                                                                    <option>France</option>
                                                                    <option>Germany</option>
                                                                    <option>Hong Kong</option>
                                                                    <option>Kuwait</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Desired Industry</label>
                                                                <select>
                                                                    <option>Software</option>
                                                                    <option>Factory</option>
                                                                    <option>Ngo</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="site-button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" class="site-button">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->
                                <!-- Details -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Industry</label>
                                            <span class="clearfix font-13">IT-Software/Software Services</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Role</label>
                                            <span class="clearfix font-13">Web Designer</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Employment Type</label>
                                            <span class="clearfix font-13">Full Time</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Availability to Join</label>
                                            <span class="clearfix font-13">12 july</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Desired Location</label>
                                            <span class="clearfix font-13">Add Desired Location</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Functional Area</label>
                                            <span class="clearfix font-13">Design / Creative / User Experience</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Job Type</label>
                                            <span class="clearfix font-13">permanent</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Desired Shift</label>
                                            <span class="clearfix font-13">Add Desired Shift</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Expected Salary</label>
                                            <span class="clearfix font-13">1 Lakhs</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Desired Industry</label>
                                            <span class="clearfix font-13">Add Desired Industry</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Details End -->
                            </div>
                            <div id="personal_details_bx" class="job-bx bg-white m-b30">
                                <div class="d-flex">
                                    <h5 class="m-b30">Personal Details</h5>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#personaldetails"
                                        class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade modal-bx-info editor" id="personaldetails" tabindex="-1"
                                    role="dialog" aria-labelledby="PersonaldetailsModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="PersonaldetailsModalLongTitle">Personal
                                                    Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Date of Birth</label>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                                        <select>
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                            <option>6</option>
                                                                            <option>7</option>
                                                                            <option>8</option>
                                                                            <option>9</option>
                                                                            <option>10</option>
                                                                            <option>11</option>
                                                                            <option>12</option>
                                                                            <option>13</option>
                                                                            <option>14</option>
                                                                            <option>15</option>
                                                                            <option>16</option>
                                                                            <option>17</option>
                                                                            <option>18</option>
                                                                            <option>19</option>
                                                                            <option>20</option>
                                                                            <option>21</option>
                                                                            <option>22</option>
                                                                            <option>23</option>
                                                                            <option>24</option>
                                                                            <option>25</option>
                                                                            <option>26</option>
                                                                            <option>27</option>
                                                                            <option>28</option>
                                                                            <option>29</option>
                                                                            <option>30</option>
                                                                            <option>31</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                                        <select>
                                                                            <option>january</option>
                                                                            <option>february</option>
                                                                            <option>March</option>
                                                                            <option>April</option>
                                                                            <option>May</option>
                                                                            <option>Jun</option>
                                                                            <option>July</option>
                                                                            <option>August</option>
                                                                            <option>September</option>
                                                                            <option>October</option>
                                                                            <option>November</option>
                                                                            <option>December</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                                                        <select>
                                                                            <option>2018</option>
                                                                            <option>2020</option>
                                                                            <option>2016</option>
                                                                            <option>2015</option>
                                                                            <option>2014</option>
                                                                            <option>2013</option>
                                                                            <option>2012</option>
                                                                            <option>2011</option>
                                                                            <option>2010</option>
                                                                            <option>2009</option>
                                                                            <option>2008</option>
                                                                            <option>2007</option>
                                                                            <option>2006</option>
                                                                            <option>2005</option>
                                                                            <option>2004</option>
                                                                            <option>2003</option>
                                                                            <option>2002</option>
                                                                            <option>2001</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Gender</label>
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input" id="male"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="male">Male</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio"
                                                                                class="custom-control-input" id="female"
                                                                                name="example1">
                                                                            <label class="custom-control-label"
                                                                                for="female">Female</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Permanent Address</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Enter Your Permanent Address">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Hometown</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Enter Hometown">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Pincode</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Enter Pincode">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Marital Status</label>
                                                                <select>
                                                                    <option>Married</option>
                                                                    <option>Single / Unmarried</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Passport Number</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Enter Passport Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>What assistance do you need</label>
                                                                <textarea class="form-control"
                                                                    placeholder="Type Description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Work Permit for Other Countries</label>
                                                                <select>
                                                                    <option>India</option>
                                                                    <option>Australia</option>
                                                                    <option>Bahrain</option>
                                                                    <option>China</option>
                                                                    <option>Dubai</option>
                                                                    <option>France</option>
                                                                    <option>Germany</option>
                                                                    <option>Hong Kong</option>
                                                                    <option>Kuwait</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="site-button"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" class="site-button">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal End -->
                                <!-- Details -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Date of Birth</label>
                                            <span class="clearfix font-13">31 July 1998</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Gender</label>
                                            <span class="clearfix font-13">male</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Marital Status</label>
                                            <span class="clearfix font-13">Single / unmarried</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Passport Number</label>
                                            <span class="clearfix font-13">+ 123 456 7890</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Differently Abled</label>
                                            <span class="clearfix font-13">None</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Languages</label>
                                            <span class="clearfix font-13">English</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Permanent Address</label>
                                            <span class="clearfix font-13">Add Permanent Address</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Area Pin Code</label>
                                            <span class="clearfix font-13">302010</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Hometown</label>
                                            <span class="clearfix font-13">Delhi</span>
                                        </div>
                                        <div class="clearfix m-b20">
                                            <label class="m-b0">Work permit of other country</label>
                                            <span class="clearfix font-13">USA</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Details End -->
                            </div>
                            <div id="attach_resume_bx" class="job-bx bg-white m-b30">
                                <h5 class="m-b10">Attach Resume</h5>
                                <p>Resume is the most important document recruiters look for. Recruiters generally do
                                    not look at profiles without resumes.</p>
                                <form class="attach-resume" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <p class="m-auto align-self-center">
                                                        <i class="fa fa-upload"></i>
                                                        Upload Resume File size is 3 MB
                                                    </p>
                                                    <!--<input type="file" class="site-button form-control" id="customFile">-->
                                                    <input type="file" class="site-button form-control"
                                                        name="upload_file" onchange="form.submit()" id="customFile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <p class="text-center">
                                    If you do not have a resume document, you may write your brief professional profile
                                    <a class="site-button-link" href="javascript:void(0);">here</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Browse Jobs END -->
        </div>
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
                                <p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry has been the industry.</p>
                                <ul class="list-inline m-a0">
                                    <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="javascript:void(0);" class="m-r10 text-white"><i
                                                class="fa fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 p-a0">
                            <div class="lead-form browse-job text-left">
                                <form>
                                    <h3 class="m-t0">Personal Details</h3>
                                    <div class="form-group">
                                        <input type="text" value="" class="form-control" placeholder="E-Mail Address" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" value="" class="form-control" placeholder="Password" />
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
    </div>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="js/theme.js"></script>
    <script>
    $(function() {
        $('input[name="datetimes_range"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });
    });
    </script>
</body>

<!-- Mirrored from designarc.biz/demos/advotis/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 May 2020 08:33:11 GMT -->

</html>