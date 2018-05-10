
    <!-- Activity Area Start -->
    <section class="activity-area section">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
				    	<form action="">
				    		<?php foreach ($topics as $topic): ?>
				    			<div class="row">
				    				<button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#<?php echo $topic ?>">
				    					<?php  
				    						if ($topic === "servlets") {
				    							echo "Java Servlets";
				    						}elseif ($topic === "jsp") {
				    							echo "Java Server Pages";
				    						}elseif ($topic === "php") {
				    							echo "PHP";
				    						}elseif ($topic === "nodejs") {
				    							echo "Node.js";
				    						}elseif ($topic === "websecurity") {
				    							echo "Web Application Security";
				    						}
				    					?>
				    				</button>
				    				<div id="<?php echo $topic ?>" class="collapse">
				    					<ul>
				    						<?php

				    							foreach ($contents as $content) {
				    								if ($topic === $content['topic']) {
				    						?>
				    							<li>
				    								<button type="button" id="topicContent" data-toggle="modal" data-target="#deleteLesson" value="<?php echo $content['contentID'] . ',' . $content['title'] ?>" class="btn btn-block btn-info lessonDeleteButton"><?php echo $content['title'] ?></button>
				    							</li>
				    						<?php			
				    								}
				    							}
				    						?>
				    					</ul>
				    				</div>
				    			</div>
				    		<?php endforeach ?>
				    	</form>
	    			</div>
	    		</div>
	    		<div class="col-lg-9">
	    			<div class="panel form-horizontal well">
			            <div class="panel-body">
			            	<form method="POST" action="<?php echo base_url('instructor/addLesson') ?>" id="addLessonForm" autocomplete="off">
			            		<div class="form-group">
			            			<label for="topic" class="col-lg-2 control-label">Select Topic:</label>
									<div class="col-lg-10">
										<select class="form-control" name="topic" id="topic">
											<option selected disabled hidden>Choose..</option>
									    	<option value="servlets">Java Web Servlets</option>
									    	<option value="jsp">Java Server Pages</option>
									    	<option value="php">PHP</option>
									    	<option value="nodejs">Nodejs</option>
									    	<option value="websecurity">Web Application Security</option>
									  	</select>
									</div>	  	
			            		</div>
			            		<div class="form-group">
			            			<label for="title" class="col-lg-2 control-label">Title:</label>
			            			<div class="col-lg-10">
			            				<input type="text" name="title" class="form-control" id="title">
			            			</div>
			            		</div>
			            		<div class="form-group">
			            			<label for="heading" class="col-lg-2 control-label">Heading:</label>
			            			<div class="col-lg-10">
			            				<input type="text" name="heading" class="form-control" id="heading">
			            			</div>
			            		</div>
			            		<div class="form-group">
			            			<label for="body" class="col-lg-2 control-label">Body:</label>
			            			<div class="col-lg-10">
			            				<textarea name="body" class="form-control" id="body" rows="30"></textarea>
			            			</div>
			            		</div>
			            		<div class="form-group">
			            			<label for="sample" class="col-lg-2 control-label">Sample:</label>
			            			<div class="col-lg-10">
			            				<textarea name="sample" class="form-control" id="sample" rows="30"></textarea>
			            			</div>
			            		</div>
			            	</form>
			            </div>
			            <div class="panel-footer">
			            	<div class="row">
			            		<button form="addLessonForm" type="submit" class="btn btn-primary pull-right">Add Lesson</button>	
			            	</div>
			            </div>
	            	</div>
	    		</div>
	    	</div>
	    </div>
    </section>
    <!-- Courses Section End -->



<div class="modal" tabindex="-1" role="dialog" id="deleteLesson">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="lessonNameModal"></p>

      </div>
      <div class="modal-footer">
      	<form action="" method="POST">
      		<input type="text" name="lessonID" id="lessonID" hidden>
      		<button type="submit" class="btn btn-primary">Delete</button>
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
      	</form>
     
      </div>
    </div>
  </div>
</div>

