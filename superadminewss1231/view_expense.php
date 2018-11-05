<?php

session_start();

if(!isset($_SESSION['admin']))
 {
   header('location:index.php');
 };


$current = date('Y-m-d');

$Admin=$_SESSION['admin'];
$AdminName=$Admin['AdminName'];
$AdminImage=$Admin['AdminImage'];
include "db/config.php";

$query="SELECT * FROM expense_table";
$result=mysqli_query($conn,$query);


$Total_query=mysqli_query($conn,"SELECT (SELECT SUM(Amount) FROM expense_table) AS Total");

$total_row=mysqli_fetch_assoc($Total_query);


$Grand=$total_row['Total'];



 if(isset($_POST['submit']))
 {

 $from = $_POST['from'];
 $to = $_POST['to'];

 $sql="SELECT * FROM expense_table WHERE (expense_date >= '$from' AND expense_date <= '$to')";

 $result=mysqli_query($conn,$sql);
 
 
$Total_query=mysqli_query($conn,"SELECT (SELECT SUM(Amount) FROM expense_table WHERE (expense_date >= '$from' AND expense_date <= '$to')) AS Total");

$total_row=mysqli_fetch_assoc($Total_query);



$tot=$total_row['Total'];

if(empty($tot))
{
$Grand=0;
}
else
{

$Grand=$tot;

}

 };
 
 
 
 if(isset($_POST['submit1']))
 {
    $agent = $_POST['agent']; 
    $from = $_POST['from'];
    $to = $_POST['to'];
 
    $sql1="SELECT * FROM expense_table WHERE AgentID='$agent' AND expense_date >= '$from' AND expense_date <= '$to'";
    $result=mysqli_query($conn,$sql1);
   
   $Total_query1=mysqli_query($conn,"select SUM(Amount) as Total FROM expense_table WHERE AgentID='$agent' AND expense_date >= '$from' AND expense_date <= '$to'");

$total_row1=mysqli_fetch_assoc($Total_query1);



$tot1=$total_row1['Total'];

if(empty($tot1))
{
$Grand=0;
}
else
{

$Grand=$tot1;

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
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">


 <?php require 'partials/sidebar.php'; ?>



<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Payment Collection</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div style="padding-bottom: 10px;">
            <form method="POST">
            <label class="m-left">From</label>
            <input type="Date" name="from" class="a">
            <label class="m-left">To</label>
            <input type="Date" name="to" class="a">
            <button type="submit" name="submit" class="btn btn-success m-left">SUBMIT</button>
            </form>
            </div>
            
            <div style="padding-bottom: 10px;">
            <form method="POST">
            <label class="m-left">Select Agent</label>
            <select name="agent" class="a">
                <option value="<?php echo "0"; ?>">SELECT AGENT</option>
                <?php
                $Agent_name=mysqli_query($conn,"SELECT * FROM agent_table");
                          while($row1=mysqli_fetch_assoc($Agent_name))
                      {
                ?>
                <option value="<?php echo $row1['AgentID']; ?>"><?php echo $row1['AgentName']; ?></option>
                <?php } ?>
            </select>
            
            <label class="m-left">From</label>
            <input type="Date" name="from" class="a">
            <label class="m-left">To</label>
            <input type="Date" name="to" class="a">
            
            <button type="submit" name="submit1" class="btn btn-success m-left">SUBMIT</button>
            </form>
            </div> 


            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payment Collection</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Payment ID</th>
                          <th>Agent</th>       
                          <th>Expense Category</th>       
                          <th>Expense Description</th>       
                          <th>Amount</th>
                          <th>Expense Date</th>
                          <th>Expense Time</th>
                          
                         
                          
                        
                        </tr>
                      </thead>


                      <tbody>
    

                        
                       <?php while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                        
                       <tr>
                         
                          <td><?php echo $row['ExpenseID']; ?></td>
                          
                          
                          <td><?php
                          $AgentIDT=$row['AgentID'];

                          $Agent_namet=mysqli_query($conn,"SELECT * FROM agent_table WHERE AgentID='$AgentIDT'");
                          $agent_rowt=mysqli_fetch_assoc($Agent_namet);
                          echo $agent_rowt['AgentName']; ?></td>
                          
                          
                          <td><?php echo $row['ExpenseCategoryName']; ?></td>
                          <td><?php echo $row['ExpenseDescription']; ?></td>
                          <td><?php echo $row['Amount']; ?></td>
                          <td><?php 
       $expense_date=$row['expense_date'];
       echo date("jS F, Y", strtotime("$expense_date")); ?></td>
                       
                            <td><?php $expense_time =  $row['expense_time'];
      echo date('h:i a' , strtotime($expense_time)); ?></td>
                         
                    

                         
                             
                      
                        </tr>

                       <?php }; ?> 
                        
                        
                        
                      </tbody>
                      
                    
                    </table>
                     <h4>Total Expense: <?php echo $Grand; ?> INR</h4>
                  </div>
                </div>
              </div>
 

        </div>
        </div>
        </div>       

              
          
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
         Powered By <a href="">Denco Dentals</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>