<!-- Modal -->
<div id="password<?php echo $student_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Change Password</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label  class="col-sm-3 col-md-3 control-label" for="txtOldPassword">Old Password:</label>
                            <div class="col-sm-8 col-md-8">
                                <input type="text" class="form-control" name="txtOldPassword"
                                id="txtOldPassword" value="<?php echo $password; ?>" disabled />
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-3 col-md-3 control-label" for="txtNewPassword">New Password:</label>
                            <div class="col-sm-8 col-md-8">
                                <input type="hidden" name="txtStudentID" id="txtStudentID" value="<?php echo $student_id; ?>"/>
                                <input type="text" class="form-control" required name="txtNewPassword"
                                id="txtNewPassword" placeholder="Enter Your New Password"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-3 col-md-3 control-label" for="txtConfirm">Confirm New Password:</label>
                            <div class="col-sm-8 col-md-8">
                                <input type="text" class="form-control" required name="txtConfirm"
                                id="txtConfirm" placeholder="Confirm New Password"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btnChange" class="btn btn-primary" style="width:100px">
                                Submit
                            </button>

                            <?php
                            if (isset($_POST['btnChange'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $studentID = clean($_POST['txtStudentID']);
                                $new = clean($_POST['txtNewPassword']);
                                $confirm = clean($_POST['txtConfirm']);
                                if ($new !== $confirm) {
                                    ?>
                                    <script>
                                    alert('Error: Password Do Not Match!!!');
                                    window.location.href='profile.php';
                                    </script>
                                    <?php
                                } else {
                                    mysql_query("UPDATE student SET password='$new' WHERE student_id='$studentID'") or die(mysql_error());
                                    ?>
                                    <script>
                                    alert('Password Successfully Changed!');
                                    window.location.href='profile.php';
                                    </script>
                                    <?php
                                }
                            }
                            ob_end_flush();
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->