<?php include('session.php'); ?>  
    <!-- Header area wrapper Starts -->
    <header id="header-wrap">
      <!-- Roof area Starts -->
      <div id="roof" class="hidden-xs">
        <div class="container">
          <div class="quick-contacts pull-right">
            <?php if ($userRole === "admin"): ?>
              <span class="text-muted">Admin</span>
            <?php endif ?>
            <?php if ($userRole === "instructor"): ?>
              <span class="text-muted">Instructor</span>
            <?php endif ?>
            <?php if ($userRole === "student"): ?>
              <span class="text-muted">Student</span>
            <?php endif ?>
            <?php if ($userLogedin): ?>
              <span><?php echo $userName ?></span>
              <span><a href="process/userLogout.php"><i class="fa fa-user"></i> Logout</a></span>
            <?php endif ?>
            <?php if (!$userLogedin): ?>
              <span><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i> Login</a></span>
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
              <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt=""></a>
            </div>
            <!-- Brand End -->

            <!-- Collapse Navbar -->
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-toggle">
                  <a class="active" href="index.php">Home</a>
                  <ul class="dropdown-menu">  
                  </ul>                        
                </li>
                <li class="dropdown dropdown-toggle">
                  <a href="#" data-toggle="dropdown">Topics<i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="servletsMainPage.php">Java Web Servlets</a></li>    
                    <li><a href="jspMainPage.php">Java Server Pages (JSP)</a></li>  
                    <li><a href="phpMainPage.php">PHP</a></li>
                    <li><a href="nodeMainPage.php">Node.js</a></li>  
                    <li><a href="webSecurityMainPage.php">Web Application Security</a></li> 
                  </ul>                        
                </li>
                <?php if ($userRole === "admin"): ?>
                  <li class="dropdown dropdown-toggle">
                    <a href="#" data-toggle="dropdown">Actions<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="adminActivities.php">Add Activities</a></li>
                      <li><a href="adminLessons.php">Add Lessons</a></li>
                      <li><a href="adminInstructors.php">Add Instructors</a></li>
                      <li><a href="adminStudents.php">Add Students</a></li>
                    </ul>
                  </li>
                <?php endif ?>
                <?php if ($userRole === "instructor"): ?>
                  <li><a href="instructorRecords.php">Records</i></a></li>
                  <li><a href="instructorReports.php">Reports</a></li>
                <?php endif ?>
                <?php if ($userRole === "student"): ?>
                  <li><a href="studentActivities.php">Activities</i></a></li>
                  <li><a href="studentLessonsAnnouncements.php">Announcements</a></li>
                <?php endif ?>
                <li class="dropdown dropdown-toggle">
                  <a href="#">Sources</i></a>                       
                </li>              
                <li><a href="#">Team</a></li>
              </ul>
            </div>    

            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
              <li>
                <a class="active" href="index.php">Home</a>                       
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
              <li><a href="#">Team</a></li>
            </ul>
            <!-- Mobile Menu End -->

          </div>
      </nav>
      <!-- Navbar End -->

    </header>
    <!-- Header area wrapper End -->


<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Webtek</h4>
      </div>
      <div class="modal-body">
        <form id="userLogin" class="form-signin" action="process/userLogin.php" method="POST" target="_blank">
          <h2 class="form-signin-heading text-center">Please sign in</h2>
          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        </form>
      </div>
      <div class="modal-footer">
          <button form="userLogin" class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
      </div>
    </div>

  </div>
</div>