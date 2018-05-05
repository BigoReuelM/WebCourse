
    <!-- Activity Area Start -->
    <section class="activity-area section">
        
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#list" data-toggle="tab">Instructor List</a></li>
                <li><a href="#add" data-toggle="tab">Add Instructor</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="list">

                    <div class="">
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
                <div class="tab-pane fade" id="add">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p class="text-center">Add Instructor</p>
                        </div>
                        <div id="the-message">
                            
                        </div>
                        <div class="panel-body">
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
                        <div class="panel-footer">
                            <button type="submit" form="addNewInstructorForm" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>

                </div>         
            </div>
        </div>

    </section>
    <!-- Courses Section End -->
