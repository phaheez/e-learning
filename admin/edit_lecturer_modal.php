<!-- Modal -->
<div id="edit-lecturer<?php echo $lecturer_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Lecturer</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateTitle">Title:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtLecturerID" id="txtLecturerID" value="<?php echo $lecturer_id; ?>"/>
                                        <select class="form-control" id="ddlUpdateTitle" name="ddlUpdateTitle" required>
                                            <?php 
                                            $lTitle = $row['title'];
                                            if ($lTitle != "") {
                                                ?>
                                                <option value="<?php echo $lTitle; ?>"><?php echo $lTitle; ?></option>
                                                <option value="">Please Select</option>
                                                <option value="PROF.">PROF.</option>
                                                <option value="DR.">DR.</option>
                                                <option value="MR.">MR.</option>
                                                <option value="MRS.">MRS.</option>
                                                <option value="MISS.">MISS.</option>
                                                <?php
                                            }else {
                                                ?>
                                                <option value="">Please Select</option>
                                                <option value="PROF.">PROF.</option>
                                                <option value="DR.">DR.</option>
                                                <option value="MR.">MR.</option>
                                                <option value="MRS.">MRS.</option>
                                                <option value="MISS.">MISS.</option>
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateName">Fullname:</label>
                                    <div class="col-sm-8 col-md-8">
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
                            <button type="submit" name="btnUpdateLecturer" class="btn btn-primary">
                                Update Lecturer
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateLecturer'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $lectID = clean($_POST['txtLecturerID']);
                                $t = clean($_POST['ddlUpdateTitle']);
                                $f = clean(strtoupper($_POST['txtUpdateName']));
                                $d = clean($_POST['ddlUpdateDept']);
                                $e = clean(strtoupper($_POST['txtUpdateEmail']));

                                mysql_query("update lecturer set title='$t',fullname='$f',dept_id='$d',email='$e' where lecturer_id='$lectID'") or die(mysql_error());
                                header('location:lecturer.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->