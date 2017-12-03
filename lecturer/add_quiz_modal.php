<!-- Modal -->
<div id="add-quiz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Quiz</strong>
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
                                <label  class="col-sm-3 col-md-3 control-label" for="txtTitle">Title:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtTitle"
                                    id="txtTitle" placeholder="Enter Quiz Title"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtNoOfQuestion">No. Of Question:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtNoOfQuestion"
                                    id="txtNoOfQuestion" placeholder="Enter No. Of Question"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtDuration">Duration(mins):</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtDuration"
                                    id="txtDuration" placeholder="Enter Quiz Duration in (mins)"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtQuizDate">Quiz Date:</label>
                                <div class="col-sm-8 col-md-8">
                                    <div class="input-group date" id="datetimepicker3">
                                        <input type="text" class="form-control" name="txtQuizDate" placeholder="Pick Quiz Starting Date" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
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
                        <button type="submit" name="btnAddQuiz" class="btn btn-primary" style="width:100px">
                            Add Quiz
                        </button>

                        <?php
                        if (isset($_POST['btnAddQuiz'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $cour_id = clean($_POST['ddlCourse']);
                            $title = clean($_POST['txtTitle']);
                            $questionNo = clean(intval($_POST['txtNoOfQuestion']));
                            $minute = clean(intval($_POST['txtDuration']));
                            $quizDate = clean($_POST['txtQuizDate']);
                            $lecturer_id = $_SESSION['lecturer_id'];

                            mysql_query("INSERT INTO quiz(course_id,title,minute,noOfQuestion,quiz_date,lecturer_id) VALUES('$cour_id','$title','$minute','$questionNo','$quizDate','$lecturer_id')") or die(mysql_error());
                            ?>
                            <script>
                            alert('Quiz successfully added!');
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