<!-- Modal -->
<div id="edit-quiz<?php echo $quiz_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Quiz</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlEditCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtQuizID" id="txtQuizID" value="<?php echo $quiz_id; ?>"/>
                                        <select class="form-control" id="ddlEditCourse" name="ddlEditCourse" required>
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
                                            <?php
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditTitle">Title:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditTitle"
                                        id="txtEditTitle" placeholder="Enter Quiz Title" value="<?php echo $row['title']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditNoOfQuestion">No. Of Question:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditNoOfQuestion"
                                        id="txtEditNoOfQuestion" placeholder="Enter No. Of Question" value="<?php echo $row['noOfQuestion']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditDuration">Duration(mins):</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditDuration"
                                        id="txtEditDuration" placeholder="Enter Quiz Duration in (mins)" value="<?php echo $row['minute']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditQuizDate">Quiz Date:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type='text' class="datetimepicker4 form-control" name="txtEditQuizDate" 
                                        placeholder="Pick Quiz Starting Date" id="txtEditQuizDate" value="<?php echo $row['quiz_date']; ?>" required/>
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

                                $quizID = clean($_POST['txtQuizID']);
                                $courseID = clean($_POST['ddlEditCourse']);
                                $tit = clean($_POST['txtEditTitle']);
                                $noQuest = clean(intval($_POST['txtEditNoOfQuestion']));
                                $dur = clean(intval($_POST['txtEditDuration']));
                                $quiDate = clean($_POST['txtEditQuizDate']);

                                mysql_query("UPDATE quiz SET course_id='$courseID',title='$tit',minute='$dur',noOfQuestion='$noQuest',quiz_date='$quiDate' WHERE quiz_id='$quizID'") or die(mysql_error());
                                ?>
                                <script>
                                alert('Quiz Updated Successfully!');
                                window.location.href='quiz.php';
                                </script>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(function () {
    $('.datetimepicker4').datetimepicker();
});

</script>