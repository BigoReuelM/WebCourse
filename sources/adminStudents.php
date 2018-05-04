<?php 
    include 'fragments/head.php';
    include 'fragments/header.php';
?>

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="well">
                        <?php include('process/getStudents.php'); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="text-center">Add Student</p>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="process/addInstructor.php" id="addNewInstructorForm">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorIdNumber">ID Number:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="instructorIdNumber">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorFname">First Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="instructorFname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorMname">Middle Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="instructorMname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="instructorLname">Last Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="instructorLname">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Add</button>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </section>    <!-- Courses Section End -->

<?php 
    include 'fragments/footer.php';
?>

<div class="modal" tabindex="-1" role="dialog" id="confirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirm Add Student?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" form="addNewStudentForm" name="addInstructorConfirm" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
