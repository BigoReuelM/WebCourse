
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-12 text-center">
					<h1>Manage Announcements</h1>        			
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-lg-12">
        			<button class="btn btn-lg btn-primary pull-right" data-toggle="modal" data-target="#addAnnouncementModal">Add Announcements</button>
        		</div>
        	</div>
        	<br>
	        <div class="body well">
	        	<div class="table-responsive">
	        		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                <thead>
		                    <tr>
		                        <th>Announcement Name</th>
		                        <th>Announcement Content</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td></td>
		                        <td></td>
		                    </tr>
		                </tbody>
		            </table>
	        	</div>
	        </div>
        </div>
    </section>
    <!-- Courses Section End -->

<div class="modal" tabindex="-1" role="dialog" id="addAnnouncementModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="the-message">
          
      </div>
      <div class="modal-body form-horizontal">
        <form method="POST" action="<?php echo base_url('admin/addAnnouncement') ?>" id="addAnnouncementForm">
        	<div class="form-group">
        		<label for="announcementName" class="col-lg-3 control-label">Announcement Name:</label>
        		<div class="col-lg-9">
        			<input type="text" class="form-control col-lg-9" name="announcementName" id="announcementName">
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="announcement" class="col-lg-3 control-label">Announcement</label>
        		<div class="col-lg-9">
        			<textarea class="form-control" name="announcement" id="announcement" cols="30" rows="10"></textarea>
        		</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="addAnnouncementForm" type="submit" class="btn btn-danger">Save changes</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
