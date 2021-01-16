<!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?php echo base_url('assets/images/faces/face8.jpg')?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo !empty($name) ? $name['reg_first_name']." ".$name['reg_last_name']: ""; ?></p>
                  
                  <p class="designation"><?php echo !empty($role) ? $role['user_role'] : "";?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <?php
                if($_SESSION['role_id'] == 1)
                {
                ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('super_admin/dashboard');?>">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title">Dashboard</span>
                      </a>
                    </li>
            <?php
                }
                ?>
            <?php
              if($_SESSION['role_id'] == 2)
              {
              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/dashboard');?>">
                      <i class="menu-icon typcn typcn-document-text"></i>
                      <span class="menu-title">Dashboard</span>
                    </a>
                  </li>
          <?php
              }
              ?>
          <?php
              if($_SESSION['role_id'] == 3)
              {
              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('employee/dashboard');?>">
                      <i class="menu-icon typcn typcn-document-text"></i>
                      <span class="menu-title">Dashboard</span>
                    </a>
                  </li>
          <?php
              }
              ?>
            <?php
              if(isset($_SESSION['role_id']))
              { ?>
                      <?php
                          if($_SESSION['role_id'] != 3)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon typcn typcn-coffee"></i>
                            <span class="menu-title">Management</span>
                            <i class="menu-arrow"></i>
                          </a>
                          <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">

                            <?php
                              if($_SESSION['role_id'] == 1)
                              {
                            ?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('super_admin/add_admin');?>">Add Admin</a>
                                  </li>
                            <?php 
                              }?>
                            
                            <?php
                              if($_SESSION['role_id'] != 3)
                              {
                            ?>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $_SESSION['role_id'] == 1 ? base_url('super_admin/add_employee') : base_url('admin/add_employee');?>">Add Employee</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('project');?>">Manage Project</a>
                                  </li>
                        <?php }?>

                            </ul>
                          </div>
                        </li>
                    <?php }?>

            <?php
                if($_SESSION['role_id'] != 3)
                {
            ?>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION['role_id'] == 1 ? base_url('super_admin/salary') : base_url('admin/salary');?>">
                          <i class="menu-icon typcn typcn-shopping-bag"></i>
                          <span class="menu-title">Pay Salaries</span>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION['role_id'] == 1 ? base_url('super_admin/employee_profile') : base_url('admin/employee_profile');?>">
                          <i class="menu-icon typcn typcn-th-large-outline"></i>
                          <span class="menu-title">View Employee Profile</span>
                        </a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION['role_id'] == 1 ? base_url('super_admin/queries') : base_url('admin/queries');?>">
                          <i class="menu-icon typcn typcn-user-outline"></i>
                          <span class="menu-title">Check Queries</span>
                        </a>
                      </li>

            <?php
                }

                if($_SESSION['role_id'] == 1)
                {
            ?>
            
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('super_admin/project_status');?>">
                      <i class="menu-icon typcn typcn-bell"></i>
                      <span class="menu-title">View Project Status</span>
                    </a>
                  </li>
            
            <?php
                }

                if($_SESSION['role_id'] == 3)
                {
                  
            ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('employee/profile');?>">
                        <i class="menu-icon typcn typcn-bell"></i>
                        <span class="menu-title">View Profile</span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('employee/tasks');?>">
                        <i class="menu-icon typcn typcn-bell"></i>
                        <span class="menu-title">View Task</span>
                      </a>
                    </li>

              <?php
                }
              ?>
                      

                <!-- <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title"></span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('blank-page');?>"> Blank Page </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('login');?>"> Login </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('register');?>"> Register </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('error-404');?>"> 404 </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('error-500');?>"> 500 </a>
                      </li>
                    </ul>
                  </div>
                </li> -->
  <?php
      }
  ?>
          </ul>
        </nav>
