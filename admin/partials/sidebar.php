    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-plus-circle"></i> <span> Denco Dentals</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../uploads/admin/<?php echo $AdminImage;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Dencto Dentals</span>
                <h2><?php echo $AdminName;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
               

                  <li><a href="live_task.php"><i class="fa fa-bullseye"></i> Live Tasks </a>
                  
                  <li><a href="task_history.php"><i class="fa fa-calendar-check-o"></i> Task History </a>
                 
                    
                  </li>
                  <li><a href="attendance.php"><i class="fa fa-area-chart"></i> Attendance </a></li>
                  
                  <li><a href="orders.php"><i class="fa fa-shopping-cart"></i> Orders </a>
                 
                    
                  </li>

                   <li><a href="payment_collection.php"><i class="fa fa-rupee"></i> Payment Collection </a>
                 
                    
                  </li>

                  <li><a><i class="fa fa-thumb-tack"></i> Tasks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_tasks.php">Create Tasks</a></li>
                      <li><a href="manage_task.php">Manage Tasks</a></li>
                    
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-user-plus"></i> Agents <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_agents.php">Add Agents</a></li>
                      <li><a href="manage_agents.php">Manage Agents</a></li>
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-h-square"></i>Clinics<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_clinic.php">Add Clinics</a></li>
                      <li><a href="manage_clinics.php">Manage Clinics</a></li>
                      
                    </ul>
                  </li>

                     <li><a><i class="fa fa-shopping-cart"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_category.php">Add Category</a></li>
                      <li><a href="manage_category.php">Manage Category</a></li>
                      
                    </ul>
                  </li>
                   <li><a><i class="fa fa-shopping-bag"></i> Subcategory<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_subcategory.php">Add Subcategory</a></li>
                      <li><a href="manage_subcategory.php">Manage Subcategory</a></li>
                      
                    </ul>

                    <li><a><i class="fa fa-gift"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_product.php">Add Products</a></li>
                      <li><a href="manage_product.php">Manage Products</a></li>
                      
                    </ul>
                  </li>
                 
           
                    
                  </li>


                   <li><a><i class="fa fa-shopping-cart"></i> Expense <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_expense.php">View Expense</a></li>
                      <li><a href="create_exp_category.php">Create Expense Category</a></li>
                      <li><a href="manage_exp_category.php">Manage Expense Category</a></li>
                      
                    </ul>
                  </li>


                  <li><a><i class="fa fa-picture-o"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_gallery.php">Create Gallery</a></li>
                      <li><a href="gallery_images.php">Manage Gallery</a></li>
                     
                      
                    </ul>
                  </li>


                  <li><a><i class="fa fa-film"></i> Banner <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_banner.php">Create Banner</a></li>
                      <li><a href="banner_images.php">Manage Banner</a></li>
                     
                      
                    </ul>
                  </li>

                   <li><a><i class="fa fa-bell"></i> Career <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="create_career.php">Create Career</a></li>
                      <li><a href="manage_jobs.php">Manage Career</a></li>
                      <li><a href="applied_job.php">Job Applicants</a></li>
                     
                      
                    </ul>
                  </li>
                
                
                <li><a href="manage_enquires.php"><i class="fa fa-comment"></i> Enquiry </a>

                </ul>
              </div>
        

            </div>
            <!-- /sidebar menu -->

     
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../uploads/admin/<?php echo $AdminImage;?>" alt=""><?php echo $AdminName;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  
                    <li>
                      <a href="password_change.php">
                        
                        <span>Change Password</span>
                      </a>
                    </li>
                 
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              
              </ul>
            </nav>
          </div>
        </div>