
    <!-- Activity Area Start -->
    <section class="activity-area section">

            <div id="page-content-wrapper">
                <div class="containers">
                    <table class="table table-striped table-bordered">
                        <h1 align="center">Add Activity</h1>
                    </table>

                        <center><select name="acctype" onchange="javascript:viewIssuance(this.value);" required>
        					<option value="1" selected="true" disabled="disabled">How many multiple choice questions?</option>
        					<option value="1">10</option>
        					<option value="2">20</option>
        					<option value="3">30</option>
                            <option value="3">40</option>
                            <option value="3">50</option>
        				</select><center>
                        <!--This is the div to show issuance-->
                        <div id="issuanceDiv">
                        </div>
        </div>
    </section>
    <!-- Courses Section End -->
