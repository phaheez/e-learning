<!-- Modal -->
<div id="add-student" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Student</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtName">Fullname:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtName"
                                    id="txtName" placeholder="Enter Student Fullname"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="ddlDept">Department:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" id="ddlDept" name="ddlDept" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $query = mysql_query("select * from department");
                                        while ($row = mysql_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['code']; ?></option>
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
                                <label  class="col-sm-3 col-md-3 control-label" for="txtEmail">Email:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtEmail"
                                    id="txtEmail" placeholder="Enter Student Email"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <!--<div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3 col-md-3"></div>
                                <div class="col-sm-8 col-md-8">
                                    <p style="color:green;">StudentID & Password will be sent to their Email</p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>-->

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="btnAddStudent" class="btn btn-primary" style="width:100px">
                            Add Student
                        </button>

                        <?php
                        if (isset($_POST['btnAddStudent'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $fullname = clean(strtoupper($_POST['txtName']));
                            $deptId = clean(strtoupper($_POST['ddlDept']));
                            $email = clean(strtoupper($_POST['txtEmail']));

                            //Randomized Generated StudentID
                            $len = 4;
                            $cha = mt_rand(1000,5000);
                            $matric = "11" .substr(str_shuffle($cha), 0, $len);

                            //Randomized Generated Password
                            $length = 8;
                            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            $password = substr(str_shuffle($chars), 0, $length);
                            
                            $sql1 = mysql_query("select student_id from student where student_id='$matric'");

                            if (mysql_num_rows($sql1)> 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Error: StudentID already exist")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=student.php" />';
                            } else {
                                $sql2 = mysql_query("select email from student where email='$email'");
                                if (mysql_num_rows($sql2)> 0) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Error: Email already exist")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=student.php" />';
                                } else {
                                    mysql_query("insert into student(student_id,fullname,dept_id,email,password) values('$matric','$fullname','$deptId','$email','$password')") or die(mysql_error());
                                    header('location:student.php');
                                }
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