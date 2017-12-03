<!-- Modal -->
<div id="assign-course" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Assign Course to Lecturer</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="ddlLecturer">Lecturer:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" id="ddlLecturer" name="ddlLecturer" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $query = mysql_query("select * from lecturer");
                                        while ($row = mysql_fetch_array($query)) {
                                            $id = $row['lecturer_id'];
                                            $title = $row['title'];
                                            $name = $row['fullname'];
                                            $deptId = $row['dept_id'];
                                            $query1 = mysql_query("select code from department where dept_id='$deptId'");
                                            while ($row1 = mysql_fetch_array($query1)) {
                                                $code = $row1['code'];
                                                $display = $id ."-". $code ."(". $title ." ". $name .")";
                                                ?>
                                                <option value="<?php echo $row['lecturer_id']; ?>"><?php echo $display; ?></option>
                                                <?php
                                            }
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
                                <label  class="col-sm-3 col-md-3 control-label" for="ddlCourse">Course:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" id="ddlCourse" name="ddlCourse" required>
                                        <option value="">Please Select</option>
                                        <?php
                                        $query = mysql_query("select * from course");
                                        while ($row = mysql_fetch_array($query)) {
                                            $id = $row['course_id'];
                                            ?>
                                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['code']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
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
                        <button type="submit" name="btnAssign" class="btn btn-primary">
                            Assign Course
                        </button>

                        <?php
                        if (isset($_POST['btnAssign'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $lect = clean(strtoupper($_POST['ddlLecturer']));
                            $cour = clean(strtoupper($_POST['ddlCourse']));

                            $sql1 = mysql_query("select lecturer_id,course_id from course_assign where(lecturer_id='$lect' && course_id='$cour')");

                            if (mysql_num_rows($sql1)> 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Error: Course already assigned for this Lecturer")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=assigncourse.php" />';
                            } else {
                                mysql_query("insert into course_assign(lecturer_id,course_id) values('$lect','$cour')") or die(mysql_error());
                                header('location:assigncourse.php');
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