<?php
session_start();
unset($_SESSION['lecturer_id']);
?>
<!-- Modal -->
<div id="lecturer" class="modal fade" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Login Lecturer!</strong>&nbsp;Please Enter Your Details Below.
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <?php
                        if (isset($_POST['btnLecturerLogin'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }

                            $lecturerID = clean($_POST['txtLecturerID']);
                            $pword = clean($_POST['txtLecturerPassword']);

                            $query = mysql_query("select * from lecturer where lecturer_id='$lecturerID' and password='$pword'") or die(mysql_error());
                            $count = mysql_num_rows($query);

                            if ($count > 0) {
                                session_start();
                                session_regenerate_id();
                                $row = mysql_fetch_array($query);
                                $_SESSION['lecturer_id'] = $row['lecturer_id'];
                                $_SESSION['lecturer_name'] = $row['title'] ." ". $row['fullname'];
                                $_SESSION['lecturer_dept_id'] = $row['dept_id'];
                                header('location:lecturer/index.php');
                                session_write_close();
                                exit();
                            } else {
                                session_write_close();
                                echo '<script language="javascript">';
                                echo 'alert("Error! Invalid LecturerID or Password")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=index.php" />';
                            }
                        }
                        //ob_end_flush();
                        ?>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <label  class="col-sm-2 control-label" for="txtLecturerID">LecturerID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" required name="txtLecturerID"
                                id="txtLecturerID" placeholder="Enter Your ID"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <label  class="col-sm-2 control-label" for="txtLecturerPassword">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" required name="txtLecturerPassword"
                                id="txtLecturerPassword" placeholder="Enter Your Password"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btnLecturerLogin" class="btn btn-primary">
                                <span class="glyphicon glyphicon-log-in">&nbsp;Login</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>