<?php 
    include 'fragments/head.php';
    include 'fragments/header.php';
?>

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="well">
                        <h1 class="pull-left">Instructors</h1>
                        <?php include('process/getInstructors.php'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="text-center">Add Instructor</p>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="fragments/addInstructor.php">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorFname">First Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instructorFname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorMname">Middle Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instructorMname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorLname">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instructorLname">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </section>
    <!-- Courses Section End -->

<?php 
    include 'fragments/footer.php';
?>
