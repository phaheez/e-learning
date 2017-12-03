<!-- Modal -->
<div id="assignment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Assignment</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="ddlCourse">Course:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" id="ddlCourse" name="ddlCourse" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $query5 = mysql_query("select * from course");
                                        while ($row5 = mysql_fetch_array($query5)) {
                                            ?>
                                            <option value="<?php echo $row5['course_id']; ?>"><?php echo $row5['code']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtAssignment">Assignment:</label>
                                <div class="col-sm-8 col-md-8">
                                    <textarea class="form-control" required name="txtAssignment" cols="40" rows="3"
                                    id="txtAssignment" placeholder="Enter Assignment Description"></textarea>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtDueDate">Due Date:</label>
                                <div class="col-sm-8 col-md-8">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" name="txtDueDate" placeholder="Pick Assignment Due Date" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="btnAddAssignment" class="btn btn-primary">
                            Add Assignment
                        </button>

                        <?php
                        if (isset($_POST['btnAddAssignment'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $cour_id = clean($_POST['ddlCourse']);
                            $assignment = clean($_POST['txtAssignment']);
                            $lecturer_id = $_SESSION['lecturer_id'];
                            $dueDate = clean($_POST['txtDueDate']);

                            $sql = mysql_query("SELECT assignments_id FROM assignments WHERE(course_id='$cour_id' && assignment='$assignment' && lecturer_id='$lecturer_id')");

                            if (mysql_num_rows($sql)> 0) {
                                ?>
                                <script>
                                alert('Error: You have already added this assignment.');
                                window.location.href='assignment.php';
                                </script>
                                <?php
                            } else {
                                mysql_query("INSERT INTO assignments(course_id,assignment,lecturer_id,added_date,due_date) VALUES('$cour_id','$assignment','$lecturer_id',NOW(),'$dueDate')") or die(mysql_error());
                                ?>
                                <script>
                                alert('Assignment successfully added!');
                                window.location.href='assignment.php';
                                </script>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->