<?php
session_start();
unset($_SESSION['student_id']);
?>
<!-- Modal -->
<div id="student" class="modal fade" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Login Student!</strong>&nbsp;Please Enter Your Details Below.
            </div>
            <form role="form" class="form-horizontal" method="post">
                <?php
                if (isset($_POST['btnStudentLogin'])) {
                    function clean($str) {
                        $str = @trim($str);
                        if (get_magic_quotes_gpc()) {
                            $str = stripslashes($str);
                        }
                        return mysql_real_escape_string($str);
                    }

                    $studentID = clean($_POST['txtStudentMatric']);
                    $password = clean($_POST['txtStudentPassword']);

                    $query1 = mysql_query("select * from student where student_id='$studentID' and password='$password'") or die(mysql_error());
                    $count1 = mysql_num_rows($query1);

                    if ($count1 > 0) {
                        session_start();
                        session_regenerate_id();
                        $row1 = mysql_fetch_array($query1);
                        $_SESSION['student_id'] = $row1['student_id'];
                        $_SESSION['student_name'] = $row1['fullname'];
                        $_SESSION['student_dept_id'] = $row1['dept_id'];
                        header('location:student/index.php');
                        session_write_close();
                        exit();
                    } else {
                        session_write_close();
                        echo '<script language="javascript">';
                        echo 'alert("Error! Invalid MatricNo or Password")';
                        echo '</script>';
                        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
                    }
                }
                //ob_end_flush();
                ?>

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <label  class="col-sm-2 control-label" for="txtStudentMatric">MatricNo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" required name="txtStudentMatric"
                        id="txtStudentMatric" placeholder="Enter Your MatricNo"/>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="form-group">
                    <div class="col-md-1"></div>
                    <label  class="col-sm-2 control-label" for="txtStudentPassword">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" required name="txtStudentPassword"
                        id="txtStudentPassword" placeholder="Enter Your Password"/>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" name="btnStudentLogin" class="btn btn-primary">
                        <span class="glyphicon glyphicon-log-in">&nbsp;Login</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>