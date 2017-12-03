<!-- Modal -->
<div id="edit-assign<?php echo $assign_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Assigned Course</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateLecturer">Lecturer:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtAssignID" id="txtAssignID" value="<?php echo $assign_id; ?>"/>
                                        <select class="form-control" id="ddlUpdateLecturer" name="ddlUpdateLecturer" required>
                                            <?php
                                            $lectId = $row['lecturer_id'];
                                            $query2 = mysql_query("select * from lecturer where lecturer_id='$lectId'");
                                            while ($row2 = mysql_fetch_array($query2)) {
                                                $t = $row2['title'];
                                                $n = $row2['fullname'];
                                                $dId = $row2['dept_id'];
                                                $query3 = mysql_query("select code from department where dept_id='$dId'");
                                                while ($row3 = mysql_fetch_array($query3)) {
                                                    $c = $row3['code'];
                                                    $displ = $lectId ."-". $c ."(". $t ." ". $n .")";
                                                    ?>
                                                    <option value="<?php echo $row['lecturer_id']; ?>"><?php echo $displ; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>

                                            <option value="">Please Select</option>

                                            <?php
                                            $query3 = mysql_query("select * from lecturer");
                                            while ($row4 = mysql_fetch_array($query3)) {
                                                $lId = $row4['lecturer_id'];
                                                $titl = $row4['title'];
                                                $nam = $row4['fullname'];
                                                $deId = $row4['dept_id'];
                                                $query4 = mysql_query("select code from department where dept_id='$deId'");
                                                while ($row5 = mysql_fetch_array($query4)) {
                                                    $co = $row5['code'];
                                                    $dis = $lId ."-". $co ."(". $titl ." ". $nam .")";
                                                    ?>
                                                    <option value="<?php echo $row4['lecturer_id']; ?>"><?php echo $dis; ?></option>
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <select class="form-control" id="ddlUpdateCourse" name="ddlUpdateCourse" required>
                                            <?php
                                            $cId = $row['course_id'];
                                            $query5 = mysql_query("select code from course where course_id='$cId'");
                                            while ($row6 = mysql_fetch_array($query5)) {
                                                ?>
                                                <option value="<?php echo $row['course_id']; ?>"><?php echo $row6['code']; ?></option>
                                                <?php
                                            }
                                            ?>
                                            <option value="">Please Select</option>

                                            <?php
                                            $query6 = mysql_query("select * from course");
                                            while ($row7 = mysql_fetch_array($query6)) {
                                                ?>
                                                <option value="<?php echo $row7['course_id']; ?>"><?php echo $row7['code']; ?></option>
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
                            <button type="submit" name="btnUpdate" class="btn btn-primary" style="width:100px">
                                Update
                            </button>

                            <?php
                            if (isset($_POST['btnUpdate'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $assID = clean($_POST['txtAssignID']);
                                $lecID = clean(strtoupper($_POST['ddlUpdateLecturer']));
                                $corID = clean($_POST['ddlUpdateCourse']);

                                mysql_query("update course_assign set lecturer_id='$lecID',course_id='$corID' where assign_id='$assID'") or die(mysql_error());
                                header('location:assigncourse.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->