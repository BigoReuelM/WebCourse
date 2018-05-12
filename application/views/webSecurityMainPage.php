

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-5">
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
	    		<div class="col-lg-7">
	    			<div class="panel form-horizontal well">
			            <div class="panel-body">
			            	
			            	<?php 
			            		if ($lessonData) {
			            			
			            	?>
			            		<h1><?php echo $lessonData['title'] ?></h1>
			            		<h2><?php echo $lessonData['heading'] ?></h2>
			            		<h3>Content:</h3>
			            		<p><?php echo $lessonData['body'] ?></p>
			            		<h3>Example:</h3>
			            		<p><?php echo $lessonData['sample'] ?></p>
			            	<?php
			            		}else{
			            	?>
			            	<h1>Default Title</h1>
			            	<h2>Default Heading</h2>
							<h3>Content:</h3>
			            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
			            	<h3>Example:</h3>
			            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
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
