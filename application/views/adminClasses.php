
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-12 text-center">
					<h1>Manage Classes</h1>        			
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-lg-12">
        			<button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#addClassModal">Add class</button>
        		</div>
        	</div>
        	<br>
	        <div class="body well">
	        	<div class="table-responsive">
	        		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                <thead>
		                    <tr>
		                        <th>Class Code</th>
		                        <th>Instructor</th>
		                        <th>Number Of Students</th>
		                    </tr>
		                </thead>
		                <tbody>
  		                  <?php foreach ($classes as $class): ?>
                          <tr>
                              <td><?php echo $class['classCode'] ?></td>
                              <td><?php echo $class['firstName'] . $class['middleName'] . $class['lastName'] ?></td>
                              <td></td>
                          </tr>
                        <?php endforeach ?>
		                </tbody>
		            </table>
	        	</div>
	        </div>
        </div>
    </section>
    <!-- Courses Section End -->

<div class="modal" tabindex="-1" role="dialog" id="addClassModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="the-message">
          
      </div>
      <div class="modal-body form-horizontal">
        <form method="POST" action="<?php echo base_url('admin/addClass') ?>" id="addClassForm">
        	<div class="form-group">
        		<label for="classcode" class="col-lg-3 control-label">Class Code:</label>
        		<div class="col-lg-9">
        			<input type="text" class="form-control col-lg-9" name="classcode" id="classcode">
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="classInstructor" class="col-lg-3 control-label">Class Instructor:</label>
        		<div class="col-lg-9">
              <select class="form-control" id="classInstructor" name="classInstructor">
                <option disabled hidden selected>Choose Class Instructor..</option>
                <?php foreach ($instructors as $instructor): ?>
                  <option value="<?php echo $instructor['instructorID'] ?>"><?php echo $instructor['firstName'] . $instructor['middleName'] . $instructor['lastName'] ?></option>
                <?php endforeach ?>
              </select>
        		</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="addClassForm" type="submit" class="btn btn-danger">Save changes</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
