

    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
            <div class="row">
	    		<div class="col-lg-3">
	    			<div class="well">
	    				<a class="btn btn-block btn-success" href="<?php echo base_url('welcome/setNodejsLessonID') ?>">Node.js</a>				    	
						<form method="POST" action="<?php echo base_url('welcome/setNodejsLessonID') ?>">
							<?php
								foreach ($nodes as $node) {		
							?>

								<button type="submit" name="topicContent" value="<?php echo $node['contentID'] ?>" class="btn btn-block btn-info topicContent"><?php echo $node['title'] ?></button>

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
			            	<h1>Node.js</h1>
			            	<p>Node.js is an open-source, cross-platform JavaScript run-time environment for executing JavaScript code server-side.Node is similar in design to, and influenced by, systems like Ruby's Event Machine or Python's Twisted. Node takes the event model a bit further. It presents an event loop as a runtime construct instead of as a library. In other systems there is always a blocking call to start the event-loop.</p>

			            	<li data-toggle="collapse" data-target="#nodemod"><b><a>Modules</a></b></li>	
							<div id="nodemod" class="collapse">
							<ul>
				
					<li data-toggle="collapse" data-target="#modulen" class="li"><b><a>Async</a></b></li>
					<div id="modulen" class="collapse">
						Async is a utility module which provides straight-forward, powerful functions for working with asynchronous JavaScript.
					</div>

					<li data-toggle="collapse" data-target="#browserify" class="li"><b><a>Browserify</a></b></li>
					<div id="browserify" class="collapse"><p>
						Browserify will recursively analyze all the require() calls in your app in order to build a bundle you can serve up to the browser in a single (script) tag.
					</div>

					<li data-toggle="collapse" data-target="#bower" class="li"><b><a>Bower</a></b></li>
					<div id="bower" class="collapse"><p>
						Bower is a package manager for the web. It works by fetching and installing packages from all over, taking care of hunting, finding, downloading, and saving the stuff you’re looking for.
					</div>

					<li data-toggle="collapse" data-target="#backbone" class="li"><b><a>Backbone</a></b></li>
					<div id="backbone" class="collapse"><p>
						 Backbone.js gives structure to web applications by providing models with key-value binding and custom events, collections with a rich API of enumerable functions, views with declarative event handling, and connects it all to your existing API over a RESTful JSON interface.
					</div>

					<li data-toggle="collapse" data-target="#csv" class="li"><b><a>CSV</a></b></li>
					<div id="csv" class="collapse"><p>
						CSV module has four sub modules which provides CSV generation, parsing, transformation and serialization for Node.js.
					</div>

					<li data-toggle="collapse" data-target="#debug" class="li"><b><a>Debug</a></b></li>
					<div id="debug" class="collapse"><p>
						Debug is a tiny node.js debugging utility modelled after node core's debugging technique.
					</div>

					<li data-toggle="collapse" data-target="#express" class="li"><b><a>Express</a></b></li>
					<div id="express" class="collapse"><p>
						Express is a fast, un-opinionated, minimalist web framework. It provides small, robust tooling for HTTP servers, making it a great solution for single page applications, web sites, hybrids, or public HTTP APIs.
					</div>

					<li data-toggle="collapse" data-target="#forever" class="li"><b><a>Forever</a></b></li>
					<div id="forever" class="collapse"><p>
						A simple CLI tool for ensuring that a given node script runs continuously (i.e. forever).
					</div>

					<li data-toggle="collapse" data-target="#grunt" class="li"><b><a>Grunt</a></b></li>
					<div id="grunt" class="collapse"><p>
						Grunt is a JavaScript Task Runner that facilitates creating new projects and makes performing repetitive but necessary tasks such as linting, unit testing, concatenating and minifying files (among other things) trivial.
					</div>

					<li data-toggle="collapse" data-target="#httpser" class="li"><b><a>Http-server</a></b></li>
					<div id="httpser" class="collapse"><p>
						Http-server is a simple, zero-configuration command-line http server. It is powerful enough for production usage, but it's simple and hackable enough to be used for testing, local development, and learning.
					</div>

					<li data-toggle="collapse" data-target="#inquirer" class="li"><b><a>Inquirer</a></b></li>
					<div id="inquirer" class="collapse"><p>
						A collection of common interactive command line user interfaces.
					</div>

					<li data-toggle="collapse" data-target="#jquery" class="li"><b><a>JQuery</a></b></li>
					<div id="jquery" class="collapse"><p>
						 JQuery is a fast, small, and feature-rich JavaScript library.
					</div>

					<li data-toggle="collapse" data-target="#jshint" class="li"><b><a>Jshint</a></b></li>
					<div id="jshint" class="collapse"><p>
						 Static analysis tool to detect errors and potential problems in JavaScript code and to enforce your team's coding conventions.
					</div>

					<li data-toggle="collapse" data-target="#koa" class="li"><b><a>Koa</a></b></li>
					<div id="koa" class="collapse"><p>
						 Koa is web app framework. It is an expressive HTTP middleware for node.js to make web applications and APIs more enjoyable to write.
					</div>

					<li data-toggle="collapse" data-target="#lodash" class="li"><b><a>Lodash</a></b></li>
					<div id="lodash" class="collapse"><p>
						 The lodash library exported as a node module. Lodash is a modern JavaScript utility library delivering modularity, performance, & extras.
					</div>

					<li data-toggle="collapse" data-target="#less" class="li"><b><a>Less</a></b></li>
					<div id="less" class="collapse"><p>
						 The less library exported as a node module.
					</div>

					<li data-toggle="collapse" data-target="#moment" class="li"><b><a>Moment</a></b></li>
					<div id="moment" class="collapse"><p>
						 A lightweight JavaScript date library for parsing, validating, manipulating, and formatting dates.
					</div>

					<li data-toggle="collapse" data-target="#mongoose" class="li"><b><a>Mongoose</a></b></li>
					<div id="mongoose" class="collapse"><p>
						 It is a MongoDB object modeling tool designed to work in an asynchronous environment.
					</div>

					<li data-toggle="collapse" data-target="#mongodb" class="li"><b><a>MongoDB</a></b></li>
					<div id="mongodb" class="collapse"><p>
						 The official MongoDB driver for Node.js. It provides a high-level API on top of mongodb-core that is meant for end users.It is a MongoDB object modeling tool designed to work in an asynchronous environment.
					</div>

					<li data-toggle="collapse" data-target="#npm" class="li"><b><a>NPM</a></b></li>
					<div id="npm" class="collapse"><p>
						 Npm is package manager for javascript.</p>
					</div>

					<li data-toggle="collapse" data-target="#nodemonno" class="li"><b><a>Nodemon</a></b></li>
					<div id="nodemonno" class="collapse"><p>
						 It is a simple monitor script for use during development of a node.js app, It will watch the files in the directory in which nodemon was started, and if any files change, nodemon will automatically restart your node application.</p>
					</div>

					<li data-toggle="collapse" data-target="#nodemailer" class="li"><b><a>Nodemailer</a></b></li>
					<div id="nodemailer" class="collapse"><p>
						 This module enables e-mail sending from a Node.js applications.</p>
					</div>

					<li data-toggle="collapse" data-target="#optimist" class="li"><b><a>Optimist</a></b></li>
					<div id="optimist" class="collapse"><p>
						 Optimist is a node.js library for option parsing with an argv hash.</p>
					</div>

					<li data-toggle="collapse" data-target="#Phantomjs" class="li"><b><a>Phantomjs</a></b></li>
					<div id="Phantomjs" class="collapse"><p>
						  An NPM installer for PhantomJS, headless webkit with JS API. It has fast and native support for various web standards: DOM handling, CSS selector, JSON, Canvas, and SVG.</p>
					</div>

					<li data-toggle="collapse" data-target="#Passport" class="li"><b><a>Passport</a></b></li>
					<div id="Passport" class="collapse"><p>
						  A simple, unobtrusive authentication middleware for Node.js. Passport uses the strategies to authenticate requests. Strategies can range from verifying username and password credentials or authentication using OAuth or OpenID.</p>
					</div>

					<li data-toggle="collapse" data-target="#Q" class="li"><b><a>Q</a></b></li>
					<div id="Q" class="collapse"><p>
						Q is a library for promises. A promise is an object that represents the return value or the thrown exception that the function may eventually provide.</p>
					</div>

					<li data-toggle="collapse" data-target="#Request" class="li"><b><a>Request</a></b></li>
					<div id="Request" class="collapse"><p>
						Request is Simplified HTTP request client make it possible to make http calls. It supports HTTPS and follows redirects by default.</p>
					</div>

					<li data-toggle="collapse" data-target="#Socket.io" class="li"><b><a>Socket.io</a></b></li>
					<div id="Socket.io" class="collapse"><p>
						 Its a node.js realtime framework server.</p>
					</div>

					<li data-toggle="collapse" data-target="#Sails" class="li"><b><a>Sails</a></b></li>
					<div id="Sails" class="collapse"><p>
						 Sails is API-driven framework for building realtime apps, using MVC conventions (based on Express and Socket.io)</p>
					</div>

					<li data-toggle="collapse" data-target="#Through" class="li"><b><a>Through</a></b></li>
					<div id="Through" class="collapse"><p>
						 It enables simplified stream construction. It is easy way to create a stream that is both readable and writable.</p>
					</div>

					<li data-toggle="collapse" data-target="#Underscore" class="li"><b><a>Underscore</a></b></li>
					<div id="Underscore" class="collapse"><p>
						  Underscore.js is a utility-belt library for JavaScript that provides support for the usual functional suspects (each, map, reduce, filter...) without extending any core JavaScript objects.</p>
					</div>

					<li data-toggle="collapse" data-target="#Validator" class="li"><b><a>Validator</a></b></li>
					<div id="Validator" class="collapse"><p>
						  A nodejs module for a library of string validators and sanitizers.</p>
					</div>

					<li data-toggle="collapse" data-target="#Winston" class="li"><b><a>Winston</a></b></li>
					<div id="Winston" class="collapse"><p>
						  A multi-transport async logging library for Node.js</p>
					</div>

					<li data-toggle="collapse" data-target="#Ws" class="li"><b><a>Ws</a></b></li>
					<div id="Ws" class="collapse"><p>
						  A simple to use, blazing fast and thoroughly tested websocket client, server and console for node.js
						  </p>
					</div>

					<li data-toggle="collapse" data-target="#Xml2js" class="li"><b><a>Xml2js</a></b></li>
					<div id="Xml2js" class="collapse"><p>
						  A Simple XML to JavaScript object converter.
						  </p>
					</div>

					<li data-toggle="collapse" data-target="#Yo" class="li"><b><a>Yo</a></b></li>
					<div id="Yo" class="collapse"><p>
						  A CLI tool for running Yeoman generators
						  </p>
					</div>

					<li data-toggle="collapse" data-target="#Zmq" class="li"><b><a>Zmq</a></b></li>
					<div id="Zmq" class="collapse"><p>
						   Bindings for node.js and io.js to ZeroMQ .It is a high-performance asynchronous messaging library, aimed at use in distributed or concurrent applications.
						  </p>
					</div>

		</article>


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
