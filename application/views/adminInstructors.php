
    <!-- Activity Area Start -->
    <section class="activity-area section">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Manage Instructors</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#addInstructorModal">Add Instructor</button>
                </div>
            </div>
            <br>
            <div class="body well">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
        </div>

    </section>
    <!-- Courses Section End -->
<div id="addInstructorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Instructor</h4>
            </div>
            <div id="the-message">
                
            </div>
            <div class="modal-body form-horizontal">
                <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/addInstructor') ?>" id="addNewInstructorForm" autocomplete="off">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="instructorIdNumber">ID Number:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instructorIdNumber" id="instructorIdNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="instructorFname">First Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instructorFname" id="instructorFname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="instructorMname">Middle Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instructorMname" id="instructorMname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="instructorLname">Last Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instructorLname" id="instructorLname">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-danger" type="submit" form="addNewInstructorForm">Add</button>
                <button class="btn btn-lg btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>