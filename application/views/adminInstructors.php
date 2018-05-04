
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Instructors</h1>
                    <div class="well">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $colIndex = 1;
                                foreach ($instructors as $instructor) {
                                    
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $colIndex ?></th>
                                        <th><?php echo $instructor['firstName'] ?></th>
                                        <th><?php echo $instructor['middleName'] ?></th>
                                        <th><?php echo $instructor['lastName'] ?></th>
                                    </tr>
                                <?php 
                                $colIndex++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="text-center">Add Instructor</p>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/addInstructor') ?>" id="addNewInstructorForm">
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
    </section>
    <!-- Courses Section End -->

<div class="modal" tabindex="-1" role="dialog" id="confirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirm Add Instructor?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" form="addNewInstructorForm" name="addInstructorConfirm" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
