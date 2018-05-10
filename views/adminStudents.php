   <!-- Activity Area Start -->
    <section class="activity-area section">

        <!-- Main Container -->
    <div id="page-content-wrapper">
        <div class="container">
            <table class="table table-striped table-bordered">
                <h1 align="center">Add Student</h1>
            </table>


                <table class="table table-striped table-bordered">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Students</button>
                </table>

                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    </a>
                        </div>
                        <div class="body">
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Student</h4>
                            </div>
                            <div class="modal-body">
                                <form action="admin/addInstructor" method="POST">
								<input type='hidden' name="issueAcnt" readonly value='<?php  echo $_SESSION['username']; ?>'>

									<p>Id Number</p>
                                    <input type="text" class="form-control" maxlength="25" name="First">
                                    
                                    <p>Firstname</p>
                                    <input type="text" class="form-control" maxlength="25" name="First">
									
                                    <p>Middle Name</p>
                                    <input type="text" class="form-control" maxlength="25" name="Middle" required>

                                    <p>Last Name</p>
                                    <input type="text" class="form-control" maxlength="25" name="Last" required>
									
                                    
                                        <div class="modal-footer">
                                            <input name="" type="button" class="btn btn-info btn-lg" value=" Submit " />
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses Section End -->
