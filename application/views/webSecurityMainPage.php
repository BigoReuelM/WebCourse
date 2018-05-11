

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
	    				<a class="btn btn-block btn-success" href="<?php echo base_url('welcome/setWebSecurityLessonID') ?>">Web Security</a>				    	
						<form method="POST" action="<?php echo base_url('welcome/setWebSecurityLessonID') ?>">
							<?php
								foreach ($waps as $wap) {		
							?>

								<button type="submit" name="topicContent" value="<?php echo $wap['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $wap['title'] ?></button>

							<?php			
									
								}
							?>
						</form>				    	
	    			</div>
	    		</div>
	    		<div class="col-lg-9">
	    			<div class="panel form-horizontal well">
			            <div class="panel-body">
			            	
			            	<?php 
			            		if ($lessonData) {
			            			
			            	?>
			            		<h1><?php echo $lessonData['title'] ?></h1>
			            		<h2><?php echo $lessonData['heading'] ?></h2>
			            		<p><?php echo $lessonData['body'] ?></p>
			            		<p><?php echo $lessonData['sample'] ?></p>
			            	<?php
			            		}else{
			            	?>
			            	<h1>Web Security</h1>
			            	<p>Web Security is also known as "Cyber security" which involves protecting information by preventing, detecting, and responding to attacks.</p>
			            	
			            	<?php 
				            	}
			            	?>
			            </div>
			            <div class="panel-footer">
			            	<div class="row">
	
			            	</div>
			            </div>
	            	</div>
	    		</div>
	    	</div>
        </div>
    </section>
    <!-- Courses Section End -->
