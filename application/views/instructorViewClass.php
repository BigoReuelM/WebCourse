
    <!-- Activity Area Start -->
    <section class="activity-area section">
        <div class="container">
          <div class="row">
            <div class="panel-info well">
              <div class="panel-heading" align="center">
                <h1>View Classes</h1>
                <div class="row" align="center">
                  <form method="POST" action="<?php echo base_url('instructor/setClassCode') ?>">
                    <div class="form-group">
                        <label for="classCode">Select Classcode: </label>
                          <select name="classCode" id="classCode">
                            <option selected disabled hidden>Choose Code</option>
                            <?php foreach ($classes as $class): ?>
                              <option value="<?php echo $class['classID'] ?>"><?php echo $class['classCode'] ?></option>
                            <?php endforeach ?>
                          </select>
                    </div>
                    <button type="submit" class="btn-primary">Go</button>
                  </form>
                </div>
            </div>
            <div class="panel-body">
              <div class="body well">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                          <thead>
                            <tr>
                                <th>Class Code</th>
                                <th>Student Name</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($students as $student): ?>
                              <tr>
                                <td><?php echo $student['classCode'] ?></td>
                                <td><?php echo $student['firstName'] . " " . $student['middleName'] . " " . $student['lastName'] ?></td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
            <div class="pannel-footer">
              
            </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Courses Section End -->
