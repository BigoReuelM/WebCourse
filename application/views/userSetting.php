
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="panel-info">
            	<div class="panel-heading">
            		<div class="row">
						<div class="col-lg-12">
							<h1 class="pull-left">User Settings</h1>
						</div>
						       
            		</div>
            	</div>
            	<div class="panel-body">
            		<div class="row">
            			<div class="col-lg-6 text-right">
            				<p>First Name:</p>
            				<p>Middle Name:</p>
            				<p>Last Name:</p>
            			</div>
            			<div class="col-lg-6">
            				<p> <?php echo $userDetails->firstName ?></p>
		            		<p> <?php echo $userDetails->middleName ?></p>
		            		<p> <?php echo $userDetails->lastName ?></p>
		            	</div>
            		</div>
            	</div>
            	<div class="panel-footer">
            		<div class="row">
            			<div class="col-lg-12">
            				<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#changePassModal">Change Password</button>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </section>
    <!-- Courses Section End -->
<!-- Modal -->
<div id="changePassModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Change Password</h4>
			</div>
			<div id="pass-message">
				
			</div>
			<div class="modal-body form-horizontal">
				<form method="POST" action="<?php echo base_url('user/passwordChange') ?>" id="changePassForm">
					<div class="form-group">
						<label for="currentPassword" class="control-label col-sm-3">Current Password:</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" name="currentPassword" id="currentPassword">
						</div>
					</div>
					<div class="form-group">
						<label for="newPassword" class="col-sm-3 control-label">New Password:</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" name="newPassword" id="newPassword">
						</div>
					</div>
					<div class="form-group">
						<label for="passwordConfirmation" class="control-label col-sm-3">Confirm Password:</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" form="changePassForm" class="btn btn-danger">Confirm</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>