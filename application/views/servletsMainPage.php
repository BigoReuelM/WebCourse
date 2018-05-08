

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">				    	
						<?php
							foreach ($servlets as $servlet) {		
						?>

							<button value="<?php echo $servlet['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $servlet['title'] ?></button>

						<?php			
								
							}
						?>				    	
	    			</div>
	    		</div>
	    		<div class="col-lg-9">
	    			<div class="panel form-horizontal well">
			            <div class="panel-body">
			            	<h1 id="title"></h1>
			            	<h1 id="heading"></h1>
			            	<p id="body"></p>
			            	<p id="sample"></p>
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

