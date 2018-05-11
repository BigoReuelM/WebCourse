

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
	    				<a class="btn btn-block btn-success" href="<?php echo base_url('welcome/setServletLessonID') ?>">Servlets</a>				    	
						<form method="POST" action="<?php echo base_url('welcome/setServletLessonID') ?>">
							<?php
								foreach ($servlets as $servlet) {		
							?>

								<button type="submit" name="topicContent" value="<?php echo $servlet['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $servlet['title'] ?></button>

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
			            	<h1>JAVA WEB SERVLETS</h1>
			            	<p>Java Servlets are programs that run on an Web Application server and act as a middle layer between a request coming from a Web browser or other HTTP client and databases or applications on the HTTP server.Servlets can be created using the javax.servlet and javax.servlet.http packages , which are a standard part of the Java's enterprise edition, an expanded version of the Java class library that supports large-scale development projects</p>

			            	<h4>Servlet Processing</h4>
          					</div>
          					<p><li>Client sends a request to a web server URL that is mapped to a servlet. Web server passes on the request to the servlet container.</li></p>
         					<p><li>Servlet container checks if servlet is already loaded.</li></p>
         					<p> <li>If it is not yet loaded, servlet container loads the servlet class and instantiates the servlet, and calls its init method.</li></p>
        					<p><li>Servlet container invokes the servlet's service method, passing request and response objects as arguments.</li></p>
        					<p><li>Servlet processes the request using the response object to create the response, which is returned by the servlet container to the web server, which in turn sends the response to the client.</li></p>
        					<p><li>Subsequent request to the servlet will not require servlet re-instantiation, unless the servlet has been unloaded; before a servlet is unloaded, the servlet container invokes its destroy method.</li></p>

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

