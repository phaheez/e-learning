<!-- Modal -->
<div id="assignment<?php echo $assignments_id; ?>" class="modal fade" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-info">
                        <strong>Assignment!</strong>&nbsp;Please Attach Your Assignment.
                    </div>
                    <div class="text-center text-danger">
                        <i>Upload only (pdf , docx, doc, ppt, pptx file)<br>
                            Maximum file size <strong>50MB</strong>
                        </i>   
                    </div>
                    <br>
                    <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="file">Attach File</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" id="txtAssignmentID" name="txtAssignmentID" value="<?php echo $assignments_id; ?>">
                                        <input type="hidden" id="txtAssCourse" name="txtAssCourse" value="<?php echo $code; ?>">
                                        <input type="file" id="file" name="file" class="form-control" required>
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
                            <button type="submit" name="btnSubmitAssignment" class="btn btn-primary">
                                <span class="glyphicon glyphicon-send">&nbsp;Submit</span>
                            </button>

                            <?php
                            if (isset($_POST['btnSubmitAssignment'])) {
                                $student_id = $_SESSION['student_id'];

                                $ass_course_code = $_POST['txtAssCourse'];

                                $filename = $_FILES['file']['name'];
                                $filename = preg_replace("/[^a-zA-Z0-9.]/", "-", $filename);
                                $filename = $student_id ."(". $ass_course_code .")-". rand(1000,100000)."-".$filename;
                                $filename_loc = $_FILES['file']['tmp_name'];
                                $filename_size = $_FILES['file']['size'];
                                $filename_type = $_FILES['file']['type'];
                                $fileLocation = "../lecturer/assignments/";

                                if ($filename_type == "application/pdf" || $filename_type == "application/msword" || $filename_type == "application/vnd.ms-powerpoint"   || $filename_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $filename_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                                    $new_file = strtolower($filename);
                                    if($filename_size > (52428800)){
                                        ?>
                                        <script>
                                        alert('Error: File size must not exceed 50MB.');
                                        window.location.href='assignment.php';
                                        </script>
                                        <?php
                                    }else {
                                        $new_file_name = str_replace(' ', '-', $new_file);

                                        $extFile = pathinfo($new_file_name, PATHINFO_EXTENSION); //file extension

                                        $assignmentID = $_POST['txtAssignmentID'];
                                        
                                        if (move_uploaded_file($filename_loc, $fileLocation.$new_file_name)) {
                                            mysql_query("INSERT INTO assignments_submit(assignments_id,student_id,filename,format,submitted_date) VALUES('$assignmentID','$student_id','$new_file_name','$extFile',NOW())");
                                            ?>
                                            <script>
                                            alert('Assignment Submitted.');
                                            window.location.href='assignment.php';
                                            </script>
                                            <?php
                                        } else {
                                            ?>
                                            <script>
                                            alert('Error submitting assignment');
                                            window.location.href='assignment.php';
                                            </script>
                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <script>
                                    alert('Error: Only (pdf,docx,doc,ppt,pptx) file required!');
                                    window.location.href='assignment.php';
                                    </script>
                                    <?php
                                }
                            }
                            //ob_end_flush();
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>