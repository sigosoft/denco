<?php

require 'admin/db/config.php';



$query ="SELECT * FROM career";
$result= mysqli_query($conn,$query);


$queryer ="SELECT * FROM career";
$resulter= mysqli_query($conn,$queryer);


if(isset($_POST['submit']))
{

    $Name=$_POST['Name']; 
    $EmailID=$_POST['EmailID']; 
    $Phone=$_POST['Phone']; 
    $CareerID=$_POST['CareerID']; 
    $Message=$_POST['Message']; 

  $count=strlen($Phone);
    
    if($count==10)
    {
    
  
    $target_dir = "uploads/resume/"; //directory details
    
    $imageFileType = pathinfo($_FILES["Resume"]["name"],PATHINFO_EXTENSION); //image type(png or jpg etc)
    $target=$target_dir.time().'.'.$imageFileType;
    $Resume = time().'.'.$imageFileType; //full path


    if(move_uploaded_file($_FILES["Resume"]["tmp_name"], $target))

    {

    $insert="INSERT INTO job_applicant(Name, EmailID, Phone, CareerID, Message, Resume) VALUES ('$Name', '$EmailID', '$Phone', '$CareerID', '$Message', '$Resume')";

    
   

     if (mysqli_query($conn, $insert))
    {
     
    echo "<script> alert('Job Application Successfull');window.location.href = 'career.php';</script>";
   
    
    
    } 

    else 
    {

    echo "<script> alert('Error');window.location.href = 'career.php';</script>";
    
    }
    
    } 


else
{

   echo "<script> alert('Upload Error');window.location.href = 'career.php';</script>";
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
    <title>Career | Denco</title>
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
<style type="text/css">
	.panel-new {
		border: 2px solid;
    	border-color: #296b4f;
}
	.panel-heading{
		background: #fff !important;
	}
    .bs-example{
    	margin: 20px;
    }
    .panel-title .glyphicon{
		width: 27px;
		height: 27px;
        font-size: 27px;
		color:#296b4f;
		background:#ff8022;
		text-align: center;
		line-height: 27px;
		font-weight: 600;
		border-radius: 27px;
    }
	.contect_form2 input {
    width: 100%;
    height: 40px;
    margin-top: 10px;
    padding-left: 10px;
    margin-bottom: 5px;
    color: #000;
    background: transparent;
    border: 1px solid #292929;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
	.contect_formb input {
    width: 100%;
    margin-top: 10px;
    padding-left: 10px;
    margin-bottom: 5px;
    color: white;
    background: transparent;
    border: 1px solid #292929;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
	.dc_cont_div textarea {
    border: 1px solid #292929;
    margin-bottom: 0px;
    margin-top: 10px;
    color: #000;
}
</style>
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
								 <li><a href="career.php" class="active">Career</a></li>
                                 <li><a href="contact.php">Contact us</a></li>
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
                            <h1>Careers</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li>Careers</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- med_tittle_section End -->
<div class="choose_wrapper med_toppadder100">
        <div class="choose_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="choose_heading_wrapper">
                        <h1 class="med_bottompadder20">Job Opportunities</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder30">
                    </div>
<div class="bs-example">
    <div class="panel-group" id="accordion">

         <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>

        <div class="panel panel-default panel-new">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $row['Title']; ?><span class="glyphicon glyphicon-plus pull-right"></span></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p><?php echo $row['Description']; ?></p>
                </div>
            </div>
        </div>

<?php }; ?>


    </div>
</div>
</div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="choose_heading_wrapper">
                        <h1 class="med_bottompadder20">Apply For A Job</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder30">
                    </div>
                 <div class="contact-form col-default text-center">
                        <form id="ajax-contact" method="POST" enctype="multipart/form-data">
							<div class="contect_form2 dc_cont_div">
                            <input type="text" id="name" name="Name" placeholder="Full Name" required></div>
							<div class="contect_form2 dc_cont_div">
                            <input type="email" id="email" name="EmailID" placeholder="Email ID" required></div>
							<div class="contect_form2 dc_cont_div">
                            <input type="number" id="phone" name="Phone" placeholder="Phone No." onblur="valmob();" onKeyPress="if(this.value.length==10) return false;" required>
                            <p id="div1" style="display: none;color:red">Invalid Number</p> 
                            </div>
							<div class="contect_form2 dc_cont_div">
                                <select id="CareerID" name="CareerID" placeholder="Post Applied For" class="form-control" required>
                                    <option value="">----Select Job----</option>
                                     <?php while($rower=mysqli_fetch_assoc($resulter))
                                     {
                                     ?>
                              
                                     <option value="<?php echo $rower['CareerID']; ?>"><?php echo $rower['Title']; ?></option>  


                               <?php } ?>
                                </select>


						

                            </div>
							<div class="contect_form4 dc_cont_div">
                            <textarea id="message" rows="5" placeholder="Message" name="Message" required></textarea></div>
							<div class="contect_form2 dc_cont_div">
							<input type="file" id="resume" aria-required="true" name="Resume" required></div>
                            <div class="contact_btn_wrapper med_toppadder10">
                                <ul><li><button type="submit" name="submit">SUBMIT</button></button></li></ul>
                        	</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
        <!--partner wrapper start-->
    <div class="partner_wrapper med_bottompadder40 med_toppadder40">
        <div class="container">
            <div class="row">
				
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="choose_heading_wrapper">
                        <h1 class="med_bottompadder20">OUR  ASSOCIATES</h1>
                        <img src="images/line.png" alt="title" class="med_bottompadder30">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partner_slider_img">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <a target="_blank" href="http://www.lava-elite.com/"><img src="images/a1.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.bredent.com/de/bredent"><img src="images/a2.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.ivoclarvivadent.com/"><img src="images/a3.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.vident.com/"><img src="images/a4.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.renfert.com/"><img src="images/a5.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                            <div class="item">
                                <a target="_blank" href="http://www.rhein83.com/index.php/en/"><img src="images/a6.jpg" class="img-responsive" alt="story_img" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--partner wrapper end-->
    <!-- top service wrapper end-->
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
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>Address : </span>-13/496 J K Firdous Building, Vasantha Vihar Complex, Palayam, Calicut -1</li>
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
    function valmob()
    {
      var ph = document.getElementById('phone').value;
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
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
        	$(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
        });
    });
</script>
</body>

</html>