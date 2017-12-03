<!-- Modal -->
<div id="subject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Subject</strong>
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
                                <label  class="col-sm-3 col-md-3 control-label" for="txtSubject">Subject:</label>
                                <div class="col-sm-8 col-md-8">
                                    <textarea class="form-control" required name="txtSubject" cols="40" rows="3"
                                    id="txtSubject" placeholder="Enter Subject Description"></textarea>
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
                        <button type="submit" name="btnAddSubject" class="btn btn-primary">
                            Add Subject
                        </button>

                        <?php
                        if (isset($_POST['btnAddSubject'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $cour = clean(strtoupper($_POST['ddlCourse']));
                            $sub = clean($_POST['txtSubject']);
                            $lec_id = $_SESSION['lecturer_id'];

                            $sql6 = mysql_query("SELECT course_id,description,lecturer_id FROM subject WHERE(course_id='$cour' && description='$sub' && lecturer_id='$lec_id')");

                            if (mysql_num_rows($sql6)> 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Error: You have already added this subject.")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=subject.php" />';
                            } else {
                                mysql_query("INSERT INTO subject(course_id,description,lecturer_id) VALUES('$cour','$sub','$lec_id')") or die(mysql_error());
                                header('location:subject.php');
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