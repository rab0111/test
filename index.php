<?php
ob_start();
session_start();
require './application.php';
$ob_app = new Application();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8">
        <title>Blood Donation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/favicon.png" />
        <!-- The styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#datepicker").datepicker();
            });
        </script>

    <body> 
        <!--  HEADER -->
        <?php include './pages/header_content.php'; ?>
        <!-- end main-header  -->

        <!--  HOME SLIDER BLOCK  -->
        <?php
        if (isset($pages)) {
            if ($pages == 'blood-donor-content') {
                include './contentPage/find_donor_content.php';
            } else if ($pages == 'blood-request') {
                include './contentPage/blood_request_content.php';
            } else if ($pages == 'gallery-content') {
                include './contentPage/gallery_content.php';
            } else if ($pages == 'all-campaign-content') {
                include './contentPage/all_campaign_content.php';
            } else if ($pages == 'signle-campaign') {
                include './contentPage/single_campaign_content.php';
            }
        } else {
            require './pages/main_content.php';
        }
        ?>
        <!-- START FOOTER  -->
        <footer>            
            <!--  end .footer-widget-area  -->
            <!--FOOTER CONTENT  -->

            <section class="footer-contents">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-md-6 col-sm-12">
                            <p class="copyright-text"> Copyright © 2017, All Right Reserved - by xenioushk </p>

                        </div>  <!-- end .col-sm-6  -->

                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="footer-nav">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Causes</a>
                                        </li>
                                        <li>
                                            <a href="donate.html">Events</a>
                                        </li>
                                        <li>
                                            <a href="blog-with-sidebar.html">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="campaign-grid.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> <!--  end .footer-nav  -->
                        </div> <!--  end .col-lg-6  -->

                    </div> <!-- end .row  -->                                    

                </div> <!--  end .container  -->

            </section> <!--  end .footer-content  -->

        </footer>

        <!-- END FOOTER  -->

        <!-- Back To Top Button  -->

        <a id="backTop">Back To Top</a>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <script src="js/custom-scripts.js"></script>

    </body>
    <!-- Mirrored from templates.bwlthemes.com/blood_donation/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Dec 2017 18:38:15 GMT -->
</html>