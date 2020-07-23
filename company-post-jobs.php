<?php
include "db_conn.php";

if (isset($_POST['upload_jobs'])) {
    $title = $_POST['title'];
    $email = $_POST['email'];
    $tags = $_POST['tags'];
    $type = $_POST['type'];
    $experience = $_POST['experience'];
    $minimum_salary = $_POST['minimum_salary'];
    $maximum_salary = $_POST['maximum_salary'];
    $region = $_POST['region'];
    $location = $_POST['location'];
    $upload_file = $_FILES['upload_file']['name'];


    if (empty($title)) {
        header("Location: company-post-jobs.php?error=title is required");
        exit();
    } elseif (empty($email)) {
        header("Location: company-post-jobs.php?error=email is required");
        exit();
    } elseif (empty($tags)) {
        header("Location: company-post-jobs.php?error=tags is required");
        exit();
    } elseif (empty($experience)) {
        header("Location: company-post-jobs.php?error=experience is required");
        exit();
    } elseif (empty($experience)) {
        header("Location: company-post-jobs.php?error=experience is required");
        exit();
    } elseif (empty($maximum_salary)) {
        header("Location: company-post-jobs.php?error=maximum salary is required");
        exit();
    } elseif (empty($maximum_salary)) {
        header("Location: company-post-jobs.php?error=maximum salary is required");
        exit();
    } elseif (empty($region)) {
        header("Location: company-post-jobs.php?error=region is required");
        exit();
    } elseif (empty($location)) {
        header("Location: company-post-jobs.php?error=location is required");
        exit();

    } 
    $sql = "INSERT INTO jobs (title,email,tags,experience,minimum_salary,maximum_salary,region,location,upload_file) VALUES ('$title','$email','$tags','$experience','$minimum_salary','$maximum_salary','$region','$location','$upload_file');";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (isset($_FILES['upload_file'])) {
            $errors = array();
            $file_name = $_FILES['upload_file']['name'];
            $file_size = $_FILES['upload_file']['size'];
            $file_tmp = $_FILES['upload_file']['tmp_name'];
            $file_type = $_FILES['upload_file']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['upload_file']['name'])));

            $extensions = array("doc", "docx", "pdf", "jpg", "png",);

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
/// for mail
           
// Recipient 
$to = 'coo@growthtechinnovaations.com'; 
 
// Sender 
$from = 'ceo@growthtechinnovaations.com'; 
$fromName = 'Job Posting'; 
 
// Email subject 
$subject = 'Job Posting';  
 
// Attachment file 
$file = "images/".$upload_file; 
//  die($file);
// Email body content 
$htmlContent = 'Tittle :'. $title.
               'email :'.$email.
               'Tags :'.$tags.
               'Type :'.$type.
               'Experince :'.$experience.
               'Min Sal :'.$minimum_salary.
               'Max Sal :'.$maximum_salary.
               'Reg :'.$region.
               'Location :'.$location; 
 
// Header for sender info 
$headers = "From: $fromName"." <".$from.">"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 
            
            // mail('mehedihasansagor.cse@gmail.com', 'Subject Line Here', 'Body of Message Here', 'From: ceo@growthtechinnovaations.com');
            // die('email send');
        }

    }
    header("Location: company-post-jobs.php?success=Successfully submit");
    exit();
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
    <title>Post a Job</title>
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

    <!-- job profile-->
    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/templete.css">

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
                            </li>
                            
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
        <div class="breadcrumb_top24">
            <div class="container">
                <!--<h2></h2> -->
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#">Post A Job</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full bg-white p-t50 p-b20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 m-b30">
                            <div class="sticky-top">
                                <div class="candidate-info company-info">
                                    <div class="candidate-detail text-center">
                                        <div class="canditate-des">
                                            <a href="javascript:void(0);">
                                                <img alt="" src="images/logo/icon3.jpg">
                                            </a>
                                            <div class="upload-link" title="update" data-toggle="tooltip"
                                                data-placement="right">
                                                <input type="file" class="update-flie">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                        </div>
                                        <div class="candidate-title">
                                            <h4 class="m-b5"><a href="javascript:void(0);">@COMPANY</a></h4>
                                        </div>
                                    </div>
                                    <ul>
                                        <li><a href="company-profile.html">
                                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                                <span>Company Profile</span></a></li>
                                        <li><a href="company-post-jobs.html" class="active">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                <span>Post A Job</span></a></li>

                                        <li><a href="company-manage-job.html">
                                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                <span>Manage jobs</span></a></li>
                                        <li><a href="company-resume.html">
                                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                <span>Resume</span></a></li>
                                        <li><a href="jobs-change-password.html">
                                                <i class="fa fa-key" aria-hidden="true"></i>
                                                <span>Change Password</span></a></li>
                                        <li><a href="index.html">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                <span>Log Out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <div class="job-bx submit-resume">
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 pull-left text-uppercase">Post A Job</h5>
                                    <a href="company-profile.html"
                                        class="site-button right-arrow button-sm float-right">Back</a>
                                </div>
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
                                <form method="post" action="company-post-jobs.php" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="Enter Job Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Your email</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="info@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Job Tags</label>
                                                <input type="text" name="tags" class="form-control tags_input"
                                                    value="html,css,bootstrap,photoshop" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Job Type</label>
                                                <select name="type">
                                                    <option>Full Time</option>
                                                    <option>Part Time</option>
                                                    <option>Internship</option>
                                                    <option>Freelance</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <select name="experience">
                                                    <option>1 Years</option>
                                                    <option>2 Years</option>
                                                    <option>3 Years</option>
                                                    <option>4 Years</option>
                                                    <option>5 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Minimum Salary ($):</label>
                                                <input type="number" name="minimum_salary" class="form-control"
                                                    placeholder="e.g. 10000">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Maximum Salary ($):</label>
                                                <input type="text" name="maximum_salary" class="form-control"
                                                    placeholder="e.g. 20000">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Region</label>
                                                <select name="region">
                                                    <option>New York</option>
                                                    <option>London</option>
                                                    <option>Los Angeles</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    placeholder="London">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <div class="custom-file">
                                                    <p class="m-a0">
                                                        <i class="fa fa-upload"></i>
                                                        Upload File
                                                    </p>
                                                    <input type="file" name="upload_file"
                                                        class="site-button form-control" id="customFile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="Upload" name="upload_jobs" class="site-button m-b30">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Browse Jobs END -->
        </div>
    </div>
    <!-- Content END-->
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


    <script src="js/theme.js"></script>
</body>

<!-- Mirrored from designarc.biz/demos/advotis/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 May 2020 08:33:11 GMT -->

</html>


<?php
if (isset($_POST['upload_jobs'])) {
    return "hello";
}

?>