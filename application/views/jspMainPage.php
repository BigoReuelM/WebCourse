

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
	    				<a class="btn btn-block btn-success" href="<?php echo base_url('welcome/setPHPLessonID') ?>">JSP</a>				    	
						<form method="POST" action="<?php echo base_url('welcome/setPHPLessonID') ?>">
							<?php
								foreach ($jsps as $jsp) {		
							?>

								<button type="submit" name="topicContent" value="<?php echo $jsp['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $jsp['title'] ?></button>

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
			            		<h3>Content:</h3>
			            		<p><?php echo $lessonData['body'] ?></p>
			            		<h3>Example:</h3>
			            		<p><?php echo $lessonData['sample'] ?></p>
			            	<?php
			            		}else{
			            	?>
			            	<h1>JAVA SERVER PAGES (JSP)</h1>
			            	<p>It is simply an HTML web page that contains additional bits of code that execute application logic to generate dynamic content and helps software developers create dynamically generated web pages based on HTML, XML, or other document types. </p>
			            	<h4>Features</h4>
          					</div>
          					<p><li>Text-based document capable of generating both static and dynamic content (typically intermixed).</li></p>
         					<p><li>Mark-up based document syntax (JSP-style or XML-style), combining (X) HTML elements as well as standard and custom JSP elements; thus, web page authors can feel right "at home" with the mark-up syntax.</li></p>
         					<p> <li>Embedded Java Coding support via “scriptlets.</li></p>
        					<p><li>Template text are converted into JSPWriter.</li></p>
			            	<?php 
				            	}
			            	?>
			            </div>
	            	</div>
	    		</div>
	    	</div>
        </div>
    </section>
    <div class="panel-footer">
			            	<div class="row">
	
			            	</div>
			            </div>
    <!-- Courses Section End -->

