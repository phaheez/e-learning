<!-- Modal -->
<div id="edit-subject<?php echo $subject_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Subject</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtSubjectID" id="txtSubjectID" value="<?php echo $subject_id; ?>"/>
                                        <select class="form-control" id="ddlUpdateCourse" name="ddlUpdateCourse" required>
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
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateSubject">Subject:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea class="form-control" required name="txtUpdateSubject" cols="40" rows="3"
                                        id="txtUpdateSubject" placeholder="Enter Subject Description"><?php echo $row['description']; ?></textarea>
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

                                $subjID = clean($_POST['txtSubjectID']);
                                $corID = clean($_POST['ddlUpdateCourse']);
                                $description = clean($_POST['txtUpdateSubject']);

                                mysql_query("UPDATE subject SET course_id='$corID',description='$description' WHERE subject_id='$subjID'") or die(mysql_error());
                                header('location:subject.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->