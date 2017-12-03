<!-- Modal -->
<div id="add-document<?php echo $subject_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Upload Course File</strong>
                    </div>

                    <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtFileCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <?php
                                        $q = mysql_query("SELECT course_id FROM subject WHERE subject_id='$subject_id'");
                                        while ($r = mysql_fetch_array($q)) {
                                            $coId = $r['course_id'];
                                            $query5 = mysql_query("SELECT code FROM course WHERE course_id='$coId'");
                                            $row5 = mysql_fetch_array($query5);
                                            ?>
                                            <input type="text" class="form-control" name="txtFileCourse"
                                            id="txtFileCourse" value="<?php echo $row5['code']; ?>" disabled/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtFileSubject">Subject:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <?php
                                        $q1 = mysql_query("SELECT description FROM subject WHERE subject_id='$subject_id'");
                                        while ($r1 = mysql_fetch_array($q1)) {
                                            ?>
                                            <textarea class="form-control" name="txtFileSubject" cols="40" rows="3"
                                            id="txtFileSubject" disabled><?php echo $r1['description']; ?></textarea>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="file">Upload File:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" class="form-control" name="txtFileSubjectId"
                                        id="txtFileSubjectId" value="<?php echo $subject_id; ?>" />
                                        <input type="file" id="file" name="file" class="form-control" required>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-3 col-md-3"></div>
                                    <div class="text-center text-danger col-sm-8 col-md-8">
                                        <i>Upload only (pdf , docx, doc, ppt, pptx file)<br>
                                            Maximum file size <strong>50MB</strong>
                                        </i>   
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
                            <button type="submit" name="btnUploadFile" class="btn btn-primary" style="width:100px">
                                Upload File
                            </button>

                            <?php
                            if (isset($_POST['btnUploadFile'])) {
                                $filename = $_FILES['file']['name'];
                                $filename = preg_replace("/[^a-zA-Z0-9.]/", "-", $filename);
                                $filename = rand(1000,100000)."-".$filename;
                                $filename_loc = $_FILES['file']['tmp_name'];
                                $filename_size = $_FILES['file']['size'];
                                $filename_type = $_FILES['file']['type'];
                                $fileLocation = "documents/";

                                if ($filename_type == "application/pdf" || $filename_type == "application/msword" || $filename_type == "application/vnd.ms-powerpoint"   || $filename_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $filename_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation") {
                                    $new_file = strtolower($filename);
                                    if ($filename_size > (52428800)) {
                                        ?>
                                        <script>
                                        alert('Error: File size must not exceed 50MB.');
                                        window.location.href='subject.php';
                                        </script>
                                        <?php
                                    }else {
                                        $new_file_name = str_replace(' ', '-', $new_file);

                                        $extFile = pathinfo($new_file_name, PATHINFO_EXTENSION); //file extension

                                        $lecturer_id = $_SESSION['lecturer_id']; //lecturerID
                                        $fileSubID = $_POST['txtFileSubjectId'];

                                        $filename_size_mb = $filename_size/1048576;
                                        $fileMB = number_format($filename_size_mb, 2, '.', ',') ."MB";

                                        if (move_uploaded_file($filename_loc, $fileLocation.$new_file_name)) {
                                            mysql_query("INSERT INTO document(subject_id,lecturer_id,filename,format,size,added_date) VALUES('$fileSubID','$lecturer_id','$new_file_name','$extFile','$fileMB',NOW())");
                                            ?>
                                            <script>
                                            alert('Document successfully uploaded');
                                            window.location.href='document.php';
                                            </script>
                                            <?php
                                        } else {
                                            ?>
                                            <script>
                                            alert('Error while uploading file');
                                            window.location.href='subject.php';
                                            </script>
                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <script>
                                    alert('Error: Only (pdf,docx,doc,ppt,pptx) file required!');
                                    window.location.href='subject.php';
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->