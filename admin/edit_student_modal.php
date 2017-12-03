<!-- Modal -->
<div id="edit-student<?php echo $student_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Student</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateName">Fullname:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtStudentID" id="txtStudentID" value="<?php echo $student_id; ?>"/>
                                        <input type="text" class="form-control" required name="txtUpdateName"
                                        id="txtUpdateName" value="<?php echo $row['fullname']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateDept">Department:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <select class="form-control" id="ddlUpdateDept" name="ddlUpdateDept" required>
                                            <?php
                                            $id = $row['dept_id'];
                                            $query2 = mysql_query("select * from department where dept_id='$id'");
                                            while ($row2 = mysql_fetch_array($query2)) {
                                                ?>
                                                <option value="<?php echo $id; ?>"><?php echo $row1['code']; ?></option>
                                                <?php
                                            }
                                            ?>

                                            <option value="">Please Select</option>

                                            <?php
                                            $query3 = mysql_query("select * from department");
                                            while ($row3 = mysql_fetch_array($query3)) {
                                                ?>
                                                <option value="<?php echo $row3['dept_id']; ?>"><?php echo $row3['code']; ?></option>
                                                <?php
                                            }
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateEmail">Email:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdateEmail"
                                        id="txtUpdateEmail" value="<?php echo $row['email']; ?>"/>
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
                            <button type="submit" name="btnUpdateStudent" class="btn btn-primary">
                                Update Student
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateStudent'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $studID = clean($_POST['txtStudentID']);
                                $f = clean(strtoupper($_POST['txtUpdateName']));
                                $d = clean($_POST['ddlUpdateDept']);
                                $e = clean(strtoupper($_POST['txtUpdateEmail']));

                                mysql_query("update student set fullname='$f',dept_id='$d',email='$e' where student_id='$studID'") or die(mysql_error());
                                header('location:student.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->