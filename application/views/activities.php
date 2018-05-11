
    <!-- Activity Area Start -->
    <section class="activity-area section">

        <div class="container">
            <div class="row">
                <h1 align="center">Manage Activities</h1>
            </div>
                        
            <br>
            <div class="row">

                <div class="panel-info well">
                    <div class="panel-heading" align="center">
                        <h1>Create Activity</h1>
                        <div class="row" align="center">
                            <div class="form-group">
                                <label for="questionNumber">Number of Questions: </label>
                                <input type="number" id="questionNumber">
                            </div>
                            <button class="btn-primary" id="activityButton">Go</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo base_url('instructor/addActivitie') ?>" id="addQuestionForm" class="form-horizontal">
                            <div class="form-group">
                                <label for="topicName" class="col-lg-3 control-label">Select Topic:</label>
                                <div class="col-lg-9">
                                    <select name="topic" id="topic" class="form-control" required>
                                        <option selected disabled hidden>Choose Topic for This Activity...</option>
                                        <option value="servlets">Java Web Servlets</option>
                                        <option value="jsp">Java Server Pages</option>
                                        <option value="php">PHP</option>
                                        <option value="node">Node.js</option>
                                        <option value="webSecurity">Web Application Security</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-lg-3 control-label">Activity Description:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="description" id="description" class="form-control" required>
                                </div>
                            </div>
                    
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <button type="submit" form="addQuestionForm" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </section>
    <!-- Courses Section End -->
