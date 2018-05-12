
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
          <div class="row">
            <div class="panel-info well">
              <div class="panel-heading" align="center">
                <h1>View Activities</h1>
                <div class="row" align="center">
                  <form method="POST" action="<?php echo base_url('instructor/setActivityID') ?>">
                    <div class="form-group">
                        <label for="activity">Select Classcode: </label>
                        <select name="activity" id="activity">
                            <option selected disabled hidden>Choose Activity</option>
                            <?php foreach ($activities as $activity): ?>
                            <option value="<?php echo $activity['activityID'] ?>"><?php echo $activity['activityDescription'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary">Go</button>
                  </form>
                </div>
            </div>
            <div class="panel-body form-horizontal">
				<?php 
					$count = 1;
					foreach ($questions as $question): ?>
					<div class="row well">
						<div class="col-lg-2">
							<h1><?php echo $count ?></h1>
						</div>
						<div class="col-lg-10">
							<div class="form-group">
								<label for="" class="col-lg-3 control-label">Question: </label>
								<div class="col-lg-9">
									<input type="text" placeholder="<?php echo $question['question'] ?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-lg-3 control-label">Answer: </label>
								<div class="col-lg-9">
									<input type="text" placeholder="<?php echo $question['answer'] ?>" class="form-control">
								</div>
							</div>
						</div>
					</div>
				<?php 
					$count++;
					endforeach ?>
            </div>
            <div class="pannel-footer">
              
            </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Courses Section End -->
