<!-- Modal -->
<div id="edit-question<?php echo $question_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-success" id="myModalLabel">Edit Quiz Question</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label" for="txtCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" name="txtQuestionID" id="txtQuestionID" value="<?php echo $question_id; ?>"/>
                                        <input type="text" class="form-control" required name="txtCourse"
                                        id="txtCourse" value="<?php echo $code; ?>" disabled/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtTitle">Quiz Title:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtTitle"
                                        id="txtTitle" value="<?php echo $title; ?>" disabled />
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditQuestion">Question:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea class="form-control" required name="txtEditQuestion" cols="40" rows="3"
                                        id="txtEditQuestion" placeholder="Enter Question"><?php echo $row['question']; ?></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditOption1">Option 1:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditOption1"
                                        id="txtEditOption1" placeholder="Enter Quiz Option 1" value="<?php echo $row['option1']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditOption2">Option 2:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditOption2"
                                        id="txtEditOption2" placeholder="Enter Quiz Option 2" value="<?php echo $row['option2']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditOption3">Option 3:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditOption3"
                                        id="txtEditOption3" placeholder="Enter Quiz Option 3" value="<?php echo $row['option3']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditOption4">Option 4:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditOption4"
                                        id="txtEditOption4" placeholder="Enter Quiz Option 4" value="<?php echo $row['option4']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtEditAnswer">Answer:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtEditAnswer"
                                        id="txtEditAnswer" placeholder="Enter Correct Answer" value="<?php echo $row['answer']; ?>"/>
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
                            <button type="submit" name="btnUpdateQuestion" class="btn btn-primary">
                                Update Question
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateQuestion'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $questionID = clean($_POST['txtQuestionID']);
                                $quest = clean($_POST['txtEditQuestion']);
                                $opt1 = clean($_POST['txtEditOption1']);
                                $opt2 = clean($_POST['txtEditOption2']);
                                $opt3 = clean($_POST['txtEditOption3']);
                                $opt4 = clean($_POST['txtEditOption4']);
                                $ans = clean($_POST['txtEditAnswer']);

                                mysql_query("UPDATE questions SET question='$quest',option1='$opt1',option2='$opt2',option3='$opt3',option4='$opt4',answer='$ans' WHERE question_id='$questionID'") or die(mysql_error());
                                ?>
                                <script>
                                alert('Question Updated Successfully!');
                                window.location.href='view-question.php';
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