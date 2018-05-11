   <!-- Activity Area Start -->
    <section class="activity-area section">

        <!-- Main Container -->
        <div class="container">
            <div class="row">
                <h1 align="center">Add Student</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info btn-lg  pull-right" data-toggle="modal" data-target="#myModal">Add Students</button>
                </div>
            </div>
            <br>
                <div class="body well">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?php echo $student['firstName'] ?></td>
                                        <td><?php echo $student['middleName'] ?></td>
                                        <td><?php echo $student['lastName'] ?></td>
                                        <td><?php echo $student['course'] ?></td>
                                        <td><?php echo $student['year'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
</section>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Student</h4>
                            </div>
                            <div id="the-message">
                                
                            </div>
                            <div class="modal-body form-horizontal">
                                <form action="<?php echo base_url('admin/addStudent') ?>" method="POST" id="addStudentForm" autocomplete="off">
                                    <div class="form-group">
                                        <label for="idNumber" class="col-lg-3 control-label">Id Number:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="idNumber" id="idNumber" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName" class="col-lg-3 control-label">First Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="firstName" id="firstName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName" class="col-lg-3 control-label">Middle Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="middleName" id="middleName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName" class="col-lg-3 control-label">Last Name:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="lastName" id="lastName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="course" class="col-lg-3 control-label">Course:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="course" id="course" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year" class="col-lg-3 control-label">Year:</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="year" id="year" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="classCode" class="col-lg-3 control-label">Year:</label>
                                        <div class="col-lg-9">
                                            <select name="classCode" id="classCode" class="form-control">
                                                <option disabled hidden selected>Choose Code...</option>
                                                <?php foreach ($codes as $code): ?>
                                                    <option value="<?php echo $code['classID'] ?>"><?php echo $code['classCode'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-lg btn-primary" type="submit" form="addStudentForm">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses Section End -->
