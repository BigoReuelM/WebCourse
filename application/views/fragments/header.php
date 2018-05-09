
    <!-- Header area wrapper Starts -->
    <header id="header-wrap">
      <!-- Roof area Starts -->
      <div id="roof" class="hidden-xs">
        <div class="container">
          <div class="quick-contacts pull-right">
            <?php if ($session['userRole'] === "admin"): ?>
              <span class="text-muted">Admin</span>
            <?php endif ?>
            <?php if ($session['userRole'] === "instructor"): ?>
              <span class="text-muted">Instructor</span>
            <?php endif ?>
            <?php if ($session['userRole'] === "student"): ?>
              <span class="text-muted">Student</span>
            <?php endif ?>
            <?php if ($session['userLogedin']): ?>
              <span><?php echo $session['userName'] ?></span>
              <span><a href="<?php echo base_url('user/logoutUser') ?>"><i class="fa fa-user"></i> Logout</a></span>
            <?php endif ?>
            <?php if (!$session['userLogedin']): ?>
              <span><a href="<?php echo base_url('user/index') ?>"><i class="fa fa-user"></i> Login</a></span>
            <?php endif ?>
          </div>
        </div>
      </div>
      <!-- Roof area End -->

      <!-- Navbar Start -->
      <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url('welcome/index') ?>"><img src="<?php echo base_url() ?>/public/assets/img/logo.png" alt=""></a>
            </div>
            <!-- Brand End -->

            <!-- Collapse Navbar -->
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-toggle">
                  <a href="<?php echo base_url('welcome/index') ?>">Home</a>
                  <ul class="dropdown-menu">  
                  </ul>                        
                </li>
                <li class="dropdown dropdown-toggle">
                  <a href="#" data-toggle="dropdown">Topics<i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('welcome/loadServlets') ?>">Java Web Servlets</a></li>    
                    <li><a href="<?php echo base_url('welcome/loadJSP') ?>">Java Server Pages (JSP)</a></li>  
                    <li><a href="<?php echo base_url('welcome/loadPHP') ?>">PHP</a></li>
                    <li><a href="<?php echo base_url('welcome/loadNode') ?>">Node.js</a></li>  
                    <li><a href="<?php echo base_url('welcome/loadWebSecurity') ?>">Web Application Security</a></li> 
                  </ul>                        
                </li>
                <?php if ($session['userRole'] === "admin"): ?>
                  <li class="dropdown dropdown-toggle">
                    <a href="#" data-toggle="dropdown">Actions<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('admin/loadInstructorsPage') ?>">Add Instructors</a></li>
                      <li><a href="<?php echo base_url('admin/loadStudentsPage') ?>">Add Students</a></li>
                      <li><a href="<?php echo base_url('admin/loadActivitiesPage') ?>">Manage Activities</a></li>
                      
                    </ul>
                  </li>
                <?php endif ?>
                <?php if ($session['userRole'] === "instructor"): ?>
                  <li><a href="instructorRecords.php">Records</i></a></li>
                  <li><a href="instructorReports.php">Reports</a></li>
                  <li><a href="<?php echo base_url('admin/loadLessonsPage') ?>">Lessons</a></li>
                <?php endif ?>
                <?php if ($session['userRole'] === "student"): ?>
                  <li><a href="studentActivities.php">Activities</i></a></li>
                  <li><a href="studentLessonsAnnouncements.php">Announcements</a></li>
                <?php endif ?>
                <li class="dropdown dropdown-toggle">
                  <a href="<?php echo base_url('welcome/loadSources') ?>">Sources</i></a>                       
                </li>              
              </ul>
            </div>    

            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
              <li>
                <a href="home.php">Home</a>                       
              </li>
              <li>
                <a href="#">Topics</a>
                <ul>
                  <li><a href="servletsMainPage.php">Java Web Servlets</a></li>    
                  <li><a href="jspMainPage.php">Java Server Pages (JSP)</a></li>  
                  <li><a href="phpMainPage.php">PHP</a></li>
                  <li><a href="nodeMainPage.php">Node.js</a></li>  
                  <li><a href="webSecurityMainPage.php">Web Application Security</a></li>    
                </ul>                        
              </li>
              <li>
                <a href="#">Sources</a>                       
              </li>              
            </ul>
            <!-- Mobile Menu End -->

          </div>
      </nav>
      <!-- Navbar End -->

    </header>
