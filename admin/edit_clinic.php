<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };

date_default_timezone_set('Asia/Kolkata');
$current = date('Y-m-d');

$Admin=$_SESSION['admin'];
$AdminName=$Admin['AdminName'];
$AdminImage=$Admin['AdminImage'];


include "db/config.php";

$ClinicID=$_GET['id'];

$clinic_details=mysqli_query($conn,"SELECT * FROM clinics WHERE ClinicID='$ClinicID'");
$row=mysqli_fetch_assoc($clinic_details);


if(isset($_POST['submit']))
{




$ClinicName=$_POST['ClinicName'];
$DoctorName=$_POST['DoctorName'];
$KeyPersonName=$_POST['KeyPersonName'];
$DoctorPhone=$_POST['DoctorPhone'];
$OfficePhone=$_POST['OfficePhone'];
$Email=$_POST['email'];

$Street=$_POST['street'];
$City=$_POST['city'];

$Longitude=$_POST['longitude'];
$Status=$_POST['Status'];



$query="UPDATE clinics SET ClinicName='$ClinicName', DoctorName='$DoctorName', KeyPersonName='$KeyPersonName', DoctorPhone='$DoctorPhone', OfficePhone='$OfficePhone', Email='$Email', Street='$Street', City='$City', Latitude='$Latitude', Longitude='$Longitude', StatusC='$Status' WHERE ClinicID='$ClinicID'";

if (mysqli_query($conn, $query))
 {
    echo "<script> alert('Clinic Modified Successfully');window.location.href = 'manage_clinics.php';</script>";
 } 

else 
{


    echo "<script> alert('Error');window.location.href = 'manage_clinics.php';</script>";
}


};



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Denco Dentals | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">


  <?php require 'partials/sidebar.php'; ?>

     


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Clinic</h3>
              </div>

          
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clinic Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ClinicName"> Clinic Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ClinicName" class="form-control col-md-7 col-xs-12" value="<?php echo $row['ClinicName']; ?>" name="ClinicName" placeholder="Clinic Name" required="required" type="text">
                        </div>
                      </div>



                            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DoctorName"> Doctor's Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="DoctorName" class="form-control col-md-7 col-xs-12" name="DoctorName" value="<?php echo $row['DoctorName']; ?>" placeholder="Doctor's Name" required="required" type="text">
                        </div>
                      </div>
                      
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="KeyPersonName">Keyperson's Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="KeyPersonName" name="KeyPersonName" value="<?php echo $row['KeyPersonName']; ?>" placeholder="Keyperson's Name"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="DoctorPhone">Doctor's Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="DoctorPhone" class="form-control col-md-7 col-xs-12" name="DoctorPhone" value="<?php echo $row['DoctorPhone']; ?>" placeholder="Doctor's Phone" required="required" type="number" onblur="docmob();" onKeyPress="if(this.value.length==10) return false;">
                        <p id="div1" style="display: none;color:red">Invalid Number</p> 
                          
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="OfficePhone">Office Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                        <input id="OfficePhone" class="form-control col-md-7 col-xs-12" name="OfficePhone" value="<?php echo $row['OfficePhone']; ?>" placeholder="Office Phone" required="required" type="number" onblur="offmob();" onKeyPress="if(this.value.length==10) return false;">
                        <p id="div2" style="display: none;color:red">Invalid Number</p>
                        
                        </div>
                      </div>
                      
                  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" value="<?php echo $row['Email']; ?>" name="email" placeholder="Email" type="email">
                        </div>
                      </div>

                     

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="street">Street <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="street" value="<?php echo $row['Street']; ?>" name="street" required="required" placeholder="Street" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="city" value="<?php echo $row['City']; ?>" name="city" required="required" placeholder="City" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="latitude">Latitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="latitude" value="<?php echo $row['Latitude']; ?>" name="latitude" placeholder="Latitude" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="longitude">Longitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="longitude" value="<?php echo $row['Longitude']; ?>" name="longitude" placeholder="Longitude" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                           <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"> Status <span class="required">*</span>
                        </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">          
                   <select class="form-control"  name="Status">
                   <option value="<?php echo $row['StatusC']; ?>" class="active"><?php echo $row['StatusC']; ?></option>
         
                   <option value="Active">Active</option>
                   <option value="Blocked">Blocked</option>

                   </select>


                          
                    </div>
                    </div>
         

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" onClick="window.location.reload()" class="btn btn-primary">Cancel</button>
                          <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        </div>
                      </div>
                    </form>

                 
                  </div>
                </div>
              </div>
            </div>

 


           
           


     
          </div>
        </div>



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered By <a href="">Denco Dentals</a>
          </div>
          <div class="clearfix"></div>
        </footer>
    
    <script>
    function docmob()
    {
      var ph = document.getElementById('DoctorPhone').value;
      var n = ph.length;
  
     if (n!=10) {
     
       document.getElementById('div1').style.display ='block';
     
    }
    else
    {
    
    document.getElementById('div1').style.display = 'none';
    
    }
    }
       
      

    function offmob()
    {
      var ph = document.getElementById('OfficePhone').value;
      var n = ph.length;
  
     if (n!=10) {
     
       document.getElementById('div2').style.display ='block';
     
    }
    else
    {
    
    document.getElementById('div2').style.display = 'none';
    
    }
    }
       
      
    </script>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgres->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  
  </body>
</html>
