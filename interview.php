<?php
include "db_conn.php";
if (isset($_POST['interview'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $landmark = $_POST['landmark'];
    $Pincode = $_POST['Pincode'];
    $Applied = $_POST['applied'];
    $company = $_POST['company'];
    $company_address1 = $_POST['company_address1'];
    $company_address2 = $_POST['company_address2'];
    $company_landmark = $_POST['company_landmark'];
    $company_pincode = $_POST['company_pincode'];
    $interview_by = $_POST['interview_by'];
    $date = $_POST['date'];
    $approved = $_POST['approved'];

    $sql = "INSERT INTO interviews (`name`, `email`, `mobile`, `address1`, `address2`, `landmark`, `Pincode`, `Applied`, `company`, `company_address1`, `company_address2`, `company_landmark`, `company_pincode`, `interview_by`, `date`, `approved`) VALUES ('$name','$email','$mobile','$address1','$address2','$landmark','$Pincode','$Applied','$company','$company_address1','$company_address2','$company_landmark','$company_pincode','$interview_by', '$date', '$approved');";
    $result = mysqli_query($conn, $sql);
}
if (isset($_POST['download'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $landmark = $_POST['landmark'];
    $Pincode = $_POST['Pincode'];
    $Applied = $_POST['applied'];
    $company = $_POST['company'];
    $company_address1 = $_POST['company_address1'];
    $company_address2 = $_POST['company_address2'];
    $company_landmark = $_POST['company_landmark'];
    $company_pincode = $_POST['company_pincode'];
    $interview_by = $_POST['interview_by'];
    $date = $_POST['date'];
    $approved = $_POST['approved'];
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Interview</h1>
    name : ' . $name . '<br>'
        . 'email : ' . $email . '<br>'
        . 'mobile : ' . $mobile . '<br>'
        . 'address 1 : ' . $address1 . '<br>'
        . 'address 2 : ' . $address2 . '<br>'
        . 'landmark : ' . $landmark . '<br>'
        . 'Pincode : ' . $Pincode . '<br>'
        . 'Applied : ' . $Applied . '<br>'
        . 'company : ' . $company . '<br>'
        . 'company address 1 : ' . $company_address1 . '<br>'
        . 'company address 2 : ' . $company_address2 . '<br>'
        . 'company landmark : ' . $company_landmark . '<br>'
        . 'company pincode : ' . $company_pincode . '<br>'
        . 'date : ' . $date . '<br>'
        . 'interview by : ' . $interview_by . '<br>'
        . 'approved : ' . $approved . '<br>'
    );
    $mpdf->Output();

    $sql = "INSERT INTO interviews (`name`, `email`, `mobile`, `address1`, `address2`, `landmark`, `Pincode`, `Applied`, `company`, `company_address1`, `company_address2`, `company_landmark`, `company_pincode`, `interview_by`, `date`, `approved`) VALUES ('$name','$email','$mobile','$address1','$address2','$landmark','$Pincode','$Applied','$company','$company_address1','$company_address2','$company_landmark','$company_pincode','$interview_by', '$date', '$approved');";
    $result = mysqli_query($conn, $sql);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/SST-Logo.png" type="image/png">
    <title>Download</title>
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
                    <p>Skills Spout Technologies <br /> #82, RD Number 7, <br /> Women's Welfare Housing Society<br />
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

                            <li><a href="download.html" target="_blank">Download</a></li>
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
        <div class="breadcrumb_top31">
            <div class="container">
                <!--<h2></h2> -->
            </div>
        </div>
        <div class="breadcrumb_bottom">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="">Download</a></li>
                </ul>
            </div>
        </div>
    </section>


    <section class="get_touch_form_area contact_page p_100">
        <div class="container">
            <h2 class="single_title">Interview Form</h2>
            <div class="row">
                <div class="col-lg-7">
                    <form class="row call_back_form" action="" method="post">
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="FullName">
                        </div>

                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email address">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                placeholder="Phone Number">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="address" name="address1" placeholder="Address1">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="address" name="address2" placeholder="Address2">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="landmark" name="landmark"
                                placeholder="landmark ">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="Pincode" name="Pincode" placeholder="Pincode">

                        </div>
                        <div class="form-group col-md-3">
                            <label
                                style="padding: 10px 10px;background: #e0e0e0;height: 50px;font-size: 16px;width: 175px;text-align: center;">Applied
                                For</label>

                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="Applied For" name="applied" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label
                                style="padding: 10px 0px;background: #e0e0e0;height: 50px;font-size: 16px;width: 175px;text-align: center;">Company
                                Name</label>

                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="Applied For" name="company" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="address" name="company_address1"
                                placeholder="Company Address1">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="address" name="company_address2"
                                placeholder="Company Address2">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="landmark" name="company_landmark"
                                placeholder="landmark ">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="Pincode" name="company_pincode"
                                placeholder="Pincode">

                        </div>

                        <div class="form-group col-md-3">
                            <label
                                style="padding: 10px 10px;background: #e0e0e0;height: 50px;font-size: 16px;width: 175px;text-align: center;">Interview
                                By</label>

                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="Applied For" name="interview_by" placeholder="">
                        </div>




                        <div class="form-group col-md-3">
                            <label
                                style="padding: 10px 10px;background: #e0e0e0;height: 50px;font-size: 16px;width: 175px;text-align: center;">Interview
                                Date</label>

                        </div>
                        <div class="form-group col-md-9">
                            <input type="date" class="form-control" id="date" name="date" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            <label
                                style="padding: 10px 10px;background: #e0e0e0;height: 50px;font-size: 16px;width: 175px;text-align: center;">Approved
                                By</label>

                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="approved" name="approved" placeholder="">
                        </div>


                        <div class="row">

                            <div class="form-group col-md-3" style="line-height:110px">
                                <input type="submit" name="interview" value="Submit" class="btn submit_btn form-control"
                                    style="#1a2f5f">

                            </div>
                            <br />
                            <div class="form-group col-md-1" style="line-height:110px">
                            </div>
                            <div class="form-group col-md-4" style="line-height:110px">

                            </div>
                            <div class="form-group col-md-1" style="line-height:110px">
                            </div>
                            <div class="form-group col-md-3" style="line-height:110px">
                                <input type="submit" value="Download" name="download"
                                    class="btn submit_btn form-control" style="#1a2f5f">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5">
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
                            <p>Skills Spout Technologies <br /> #82, RD Number 7, <br /> Women's Welfare Housing
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