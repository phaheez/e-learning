<!-- Modal -->
<div id="edit-assignment<?php echo $assignments_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Assignment</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlEditCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtAssignmentID" id="txtAssignmentID" value="<?php echo $assignments_id; ?>"/>
                                        <select class="form-control" id="ddlEditCourse" name="ddlEditCourse" required>
                                            <?php
                                            $cId = $row['course_id'];
                                            $query2 = mysql_query("select code from course where course_id='$cId'");
                                            while ($row2 = mysql_fetch_array($query2)) {
                                                ?>
                                                <option value="<?php echo $row['course_id']; ?>"><?php echo $row2['code']; ?></option>
                                                <?php
                                            }

                                            ?>
                                            <option value="">Please Select</option>

                                            <?php
                                            $query3 = mysql_query("select * from course");
                                            while ($row3 = mysql_fetch_array($query3)) {
                                                ?>
                                                <option value="<?php echo $row3['course_id']; ?>"><?php echo $row3['code']; ?></option>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditAssignment">Assignment:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea class="form-control" required name="txtEditAssignment" cols="40" rows="3"
                                        id="txtEditAssignment" placeholder="Enter Assignment Description"><?php echo $row['assignment']; ?></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditDueDate">Due Date:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type='text' class="datetimepicker2 form-control" name="txtEditDueDate" 
                                        placeholder="Pick Assignment Due Date" id="txtEditDueDate" value="<?php echo $row['due_date']; ?>" required/>
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
                            <button type="submit" name="btnUpdateAssignment" class="btn btn-primary">
                                Update Assignment
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateAssignment'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $assignmentID = clean($_POST['txtAssignmentID']);
                                $courseID = clean($_POST['ddlEditCourse']);
                                $assgmnt = clean($_POST['txtEditAssignment']);
                                $dueDate = clean($_POST['txtEditDueDate']);

                                mysql_query("UPDATE assignments SET course_id='$courseID',assignment='$assgmnt',due_date='$dueDate' WHERE assignments_id='$assignmentID'") or die(mysql_error());
                                header('location:assignment.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
$(function () {
    $('.datetimepicker2').datetimepicker();
});

</script>