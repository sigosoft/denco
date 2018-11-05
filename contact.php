<?php


require 'admin/db/config.php';

if(isset($_POST['submit']))
{

    $Name=$_POST['Name']; 
    $Email=$_POST['Email']; 
    $Phone=$_POST['Phone']; 
    $Subject=$_POST['Subject']; 
    $Message=$_POST['Message']; 
    
    $count=strlen($Phone);
    
    if($count==10)
    {
    

      $insert="INSERT INTO enquiry(Name, Email, Subject, Message, Phone) VALUES ('$Name', '$Email', '$Subject', '$Message', '$Phone')";

    

     if (mysqli_query($conn, $insert))
    {
     
    echo "<script> alert('Enquiry Successfull');window.location.href = 'contact.php';</script>";
   
    
    
    } 

    else 
    {

    echo "<script> alert('Error');window.location.href = 'contact.php';</script>";
    
    }
    
    }
    else
    {
        
      echo "<script> alert('Invalid Number');window.location.href = 'contact.php';</script>";  
        
    }
    

};


?>


<!DOCTYPE html>
<html lang="en">
<!--[endif]-->

<head>
    <meta charset="utf-8" />
    <title>Contact Us | Denco</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Denco Dentals" />
    <meta name="keywords" content="Denco Dentals" />
    <meta name="author" content="sigosoft" />
    <meta name="MobileOptimized" content="320" />
    <!-- style -->
   <!--  <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!-- favicon link-->
    <link rel="shortcut icon" type="image/icon" href="images/Iconpic.png" />
</head>

<body>

    <!--top header start-->
    <div class="top_header_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="top_header_add">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us :</span> 0495 2 700 600</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dencodencodentals@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="top_login">
                         <ul>
                                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header menu wrapper-->
    <div class="menu_wrapper header-area hidden-menu-bar stick">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 wow bounceInDown" data-wow-delay="0.6s">
                    <div class="header_logo">
                        <a href="index.php" class="hidden-xs"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="150"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
                    <nav class="navbar hidden-xs">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse respose_nav" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav" id="nav_filter">
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="about.php">about us</a></li>
                                 <li><a href="product.php">Products</a></li>
								 <li><a href="technologies.php">Technologies</a></li>
                                 <li><a href="gallery.php">Gallery</a></li>
									<li><a href="career.php">Career</a></li>
                                 <li><a href="contact.php"  class="active">Contact us</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                    </nav>
                    <div class="rp_mobail_menu_main_wrapper visible-xs">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="gc_logo logo_hidn">
                                    <h1><a href="#"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="100"></a></h1>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div id="toggle">
                                   <i class="fas fa-align-justify"></i>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar">
                           <h1><a href="#"><img src="images/logo.png" alt="logo" title="logo" class="img-responsive" width="100"></a></h1>
                            <div id="toggle_close">&times;</div>
                            <div id="cssmenu" class="wd_single_index_menu">
                                <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="about.php">about us</a></li>
                                 <li><a href="product.php">Products</a></li>
									<li><a href="technologies.php">Technologies</a></li>
                                 <li><a href="gallery.php">Gallery</a></li>
									<li><a href="career.php">Career</a></li>
                                 <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header wrapper end-->
      <!--med_tittle_section-->
    <div class="med_tittle_section">
        <div class="med_img_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="med_tittle_cont_wrapper">
                        <div class="med_tittle_cont">
                            <h1>Contact Us</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li>Contact Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- med_tittle_section End -->
    <!--contact us section start -->
    <div class="contact_us_section med_toppadder100 med_bottompadder70">
        <div class="container">
            <div class="row">

                <form method="POST">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="choose_heading_wrapper med_bottompadder30">
                        <h1 class="med_bottompadder20">Contact us</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder20">
                    </div>
                    <div class="row cont_main_section">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1 dc_cont_div">
                                <input type="text" name="Name" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1 dc_cont_div">
                                <input type="email" name="Email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1 dc_cont_div">
                                <input type="number" id="mobile" name="Phone" placeholder="Your Contact" onblur="validatormob();" onKeyPress="if(this.value.length==10) return false;" required>
                             <p id="div1" style="display: none;color:red">Invalid Number</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="contect_form1 dc_cont_div">
                                <input type="text" name="Subject" placeholder="Your Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="contect_form4 dc_cont_div">
                                <textarea rows="5" name="Message" placeholder="Your Comments Here" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="contact_btn_wrapper med_toppadder30">
                                <ul>
                                    <li><button type="submit" name="submit">SUBMIT</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
    <!--contact us section end-->
    <!-- dc category section start-->
    <div class="category_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about cont_cat_abt">
                        <div class="icon_wrapper dc_icon_section">
                            <img src="images/icon_map.png" alt="img" class="img-responsive">
                        </div>

                        <div class="cat_txt cont_cat_txt">
                            <h1>Address</h1>
                            <p>13/496 J K Firdous Building, Vasantha Vihar Complex, Palayam, Calicut -1</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about cont_cat_abt">
                        <div class="icon_wrapper dc_icon_section">
                            <img src="images/icon_call.png" alt="img" class="img-responsive">
                        </div>


                        <div class="cat_txt cont_cat_txt">
                            <h1>Phone</h1>
                            <p>0495 2 700 600</p>
                            <p>+91 9746 478 503</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about cont_cat_abt">
                        <div class="icon_wrapper dc_icon_section">
                            <img src="images/icon_envelope.png" alt="img" class="img-responsive">
                        </div>

                        <div class="cat_txt cont_cat_txt cont_last_child">
                            <a href="#"><h1>E-Mail</h1></a>
                            <p>dencodencodentals@gmail.com</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map_main_wrapper cont_dc_map">
            <div id="map" style="width:100%; float:left; height:600px;"></div>
        </div>
    </div>
    <!-- dc category section end-->
    <!-- footer wrapper start-->
    <div class="footer_wrapper">
        <div class="container">
            <div class="box_1_wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="address_main">
                             <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Contact Us</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                            <div class="footer_box_add">
                                <ul>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address : </span>13/496 J K Firdous Building, Vasantha Vihar Complex, Palayam, Calicut -1</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><span>Call us : </span>0495 2 700 600</li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#"><span>Email :</span> dencodencodentals@gmail.com</a></li>
                                </ul>
                            </div>

                                <div class="footer_btm_icon">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer_1-->
            <div class="booking_box_div">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_main_wrapper">
                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallary_response hidden-sm">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Gallery</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_gallary">
                                    <div class="row">
                                       <ul>
                                            <li><img src="images/footer_1.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_2.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_3.jpg" alt="img" class="img-responsive"></li>
                                            <li><img src="images/footer_4.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="images/footer_5.jpg" alt="img" class="img-responsive"> </li>
                                            <li> <img src="images/footer_6.jpg" alt="img" class="img-responsive"> </li>
                                     </ul> 
                                    </div>
                                </div>
                            </div>
                            <!--footer_2-->
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 respons_footer_nav hidden-xs">
                                <div class="footer_heading footer_menu">
                                    <h1 class="med_bottompadder10">Userful</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_ul_wrapper">
                                    <ul>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="index.php">home</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="about.php">about us</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="product.php">Products</a></li>
										<li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="technologies.php">Technologies</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="gallery.php">Gallery</a></li>
                                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="contact.php">contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--footer_3-->
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 contact_last_div">
                                <div class="footer_heading">
                                    <h1 class="med_bottompadder10">Opening Hours</h1>
                                    <img src="images/line.png" class="img-responsive" alt="img" />
                                </div>
                                <div class="footer_cnct">
                                    <p>Monday – Friday ------<span>09:00-17:00</span></p>
                                    <p>Saturday -----------------<span>09:30-17:00</span></p>
                                    <p>Sunday -------------------<span>10:30-18:00</span></p>
                                </div>
                            </div>
                            <!--footer_4-->
                        </div>
                    </div>
                </div>
            </div>

                <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer_botm_wrapper">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="bottom_footer_copy_wrapper">
                                    <span>Copyright © 2018- <a href="#">DENCO</a> Powered by <a href="https://sigosoft.com/">Sigosoft.</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--footer_5-->
                </div>
        </div>
        <div class="container-fluid">
            <div class="up_wrapper">
                <a href="javascript:" id="return-to-top"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!--footer wrapper end-->
    <!--main js files-->
    
    <script>
    function validatormob()
    {
      var ph = document.getElementById('mobile').value;
      var n = ph.length;
  
     if (n!=10) {
         
         
       alert("invalid Number")     
       document.getElementById('div1').style.display ='block';
     
    }
    else
    {
    
    document.getElementById('div1').style.display = 'none';
    
    }
    }
       
      
    </script>
    <script src="js/jquery_min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/new.js"></script>
    <!--js code-->
    <script>
        function initMap() {
            var uluru = {
                lat: 11.247954,
                lng: 75.784128
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                scrollwheel: false,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmdG8C6ItElq5ipuFv6O9AE48wyZm_vqU&callback=initMap">
    </script>
    <!-- map Script-->
</body>

</html>