

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
	    				<a class="btn btn-block btn-success" href="<?php echo base_url('welcome/setPHPLessonID') ?>">PHP</a>				    	
						<form method="POST" action="<?php echo base_url('welcome/setPHPLessonID') ?>">
							<?php
								foreach ($phps as $php) {		
							?>

								<button type="submit" name="topicContent" value="<?php echo $php['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $php['title'] ?></button>

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
			            	<h1>PHP</h1>
			            	<p>PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.PHP is a widely-used, free, and efficient alternative to competitors such as Microsoft's ASP. It is also used as a general-purpose programming language.</p>

			            	<li><b><a>Superglobals</a></b></li>	
							<p> Superglobals are available in all scopes throughout a script. There is no need to do global $variable; to access them within functions or methods.</p>
							<ul>
							<li data-toggle="collapse" data-target="#global" class="li"><b><a>$GLOBALS</a></b></li>
							<div id="global" class="collapse">
							References all variables available in global scope
							</div>
							<li data-toggle="collapse" data-target="#server" class="li"><b><a>$_SERVER</a></b></li>
							<div id="server" class="collapse">
							Server and execution environment information
							</div>
							<li data-toggle="collapse" data-target="#get" class="li"><b><a>$_GET</a></b></li>
							<div id="get" class="collapse">
							HTTP GET variables
							</div>					
							<li data-toggle="collapse" data-target="#posts" class="li"><b><a>$_POST</a></b></li>
							<div id="posts" class="collapse">
								HTTP POST variables
							</div>					
							<li data-toggle="collapse" data-target="#filu" class="li"><b><a>$_FILES</a></b></li>
							<div id="filu" class="collapse">
							HTTP File Upload variables
							</div>					
							<li data-toggle="collapse" data-target="#cookies" class="li"><b><a>$_COOKIE</a></b></li>
							<div id="cookies" class="collapse">
							HTTP Cookies
							</div>				
							<li data-toggle="collapse" data-target="#sessions" class="li"><b><a>$_SESSION</a></b></li>
							<div id="sessions" class="collapse">
							Session variables
							</div>
							<li data-toggle="collapse" data-target="#request" class="li"><b><a>$_REQUEST</a></b></li>
							<div id="request" class="collapse">
							HTTP Request variables
							</div>					
							<li data-toggle="collapse" data-target="#env" class="li"><b><a>$_ENV</a></b></li>
							<div id="env" class="collapse">
							Environment variables
							</div>					
							</ul>
							</div>
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
