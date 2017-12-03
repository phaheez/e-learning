<!-- Modal -->
<div id="add-question<?php echo $quiz_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-success" id="myModalLabel">Add Quiz Question</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="lblCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" class="form-control" name="txtQuizId"
                                        id="txtQuizId" value="<?php echo $quiz_id; ?>" />
                                        <label class="control-label" id="lblCourse" name="lblCourse" style="font-weight:500"><?php echo $code; ?></label>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="lblTitle">Quiz Title:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <label class="control-label" id="lblTitle" name="lblTitle" style="font-weight:500"><?php echo $row['title']; ?></label>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtQuestion">Question:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea class="form-control" required name="txtQuestion" cols="40" rows="3"
                                        id="txtQuestion" placeholder="Enter Question"></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtOption1">Option 1:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtOption1"
                                        id="txtOption1" placeholder="Enter Quiz Option 1"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtOption2">Option 2:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtOption2"
                                        id="txtOption2" placeholder="Enter Quiz Option 2"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtOption3">Option 3:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtOption3"
                                        id="txtOption3" placeholder="Enter Quiz Option 3"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtOption4">Option 4:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtOption4"
                                        id="txtOption4" placeholder="Enter Quiz Option 4"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtAnswer">Answer:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtAnswer"
                                        id="txtAnswer" placeholder="Enter Correct Answer"/>
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
                            <button type="submit" name="btnAddQuestion" class="btn btn-primary">
                                Add Question
                            </button>

                            <?php
                            if (isset($_POST['btnAddQuestion'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $quiID = clean(strtoupper($_POST['txtQuizId']));
                                $lecturer_id = $_SESSION['lecturer_id'];
                                $questn = clean($_POST['txtQuestion']);
                                $opt1 = clean($_POST['txtOption1']);
                                $opt2 = clean($_POST['txtOption2']);
                                $opt3 = clean($_POST['txtOption3']);
                                $opt4 = clean($_POST['txtOption4']);
                                $ans = clean($_POST['txtAnswer']);

                                $sql6 = mysql_query("SELECT noOfQuestion FROM quiz WHERE(quiz_id='$quiID')");
                                while ($row6 = mysql_fetch_array($sql6)) {
                                    $count = $row6['noOfQuestion'];

                                    $sql7 = mysql_query("SELECT question_id FROM questions WHERE(quiz_id='$quiID')");
                                    if (mysql_num_rows($sql7) === intval($count)) {
                                        echo '<script language="javascript">';
                                        echo 'alert("Error: Question maximum number reached!")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=quiz.php" />';
                                    } else {
                                        mysql_query("INSERT INTO questions(quiz_id,lecturer_id,question,option1,option2,option3,option4,answer) VALUES('$quiID','$lecturer_id','$questn','$opt1','$opt2','$opt3','$opt4','$ans')") or die(mysql_error());
                                        echo '<script language="javascript">';
                                        echo 'alert("Question Added.")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=quiz.php" />';
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