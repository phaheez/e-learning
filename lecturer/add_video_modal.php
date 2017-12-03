<!-- Modal -->
<div id="add-video<?php echo $subject_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Upload Course Video</strong>
                    </div>

                    <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtVideoCourse">Course:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <?php
                                        $q2 = mysql_query("SELECT course_id FROM subject WHERE subject_id='$subject_id'");
                                        while ($r2 = mysql_fetch_array($q2)) {
                                            $coVId = $r2['course_id'];
                                            $query6 = mysql_query("SELECT code FROM course WHERE course_id='$coVId'");
                                            $row6 = mysql_fetch_array($query6);
                                            ?>
                                            <input type="text" class="form-control" name="txtVideoCourse"
                                            id="txtVideoCourse" value="<?php echo $row6['code']; ?>" disabled/>
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtVideoSubject">Subject:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <?php
                                        $q3 = mysql_query("SELECT description FROM subject WHERE subject_id='$subject_id'");
                                        while ($r3 = mysql_fetch_array($q3)) {
                                            ?>
                                            <textarea class="form-control" name="txtVideoSubject" cols="40" rows="3"
                                            id="txtVideoSubject" disabled><?php echo $r3['description']; ?></textarea>
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="video">Upload Video:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="hidden" class="form-control" name="txtVideoSubjectId"
                                        id="txtVideoSubjectId" value="<?php echo $subject_id; ?>" />
                                        <input type="file" id="video" name="video" class="form-control" required>
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
                                        <i>Upload only (.mp4 file)<br>
                                            Maximum file size <strong>200MB</strong>
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
                            <button type="submit" name="btnUploadVideo" class="btn btn-primary" style="width:100px">
                                Upload Video
                            </button>

                            <?php
                            if (isset($_POST['btnUploadVideo'])) {
                                $videoname = $_FILES['video']['name'];
                                $videoname = preg_replace("/[^a-zA-Z0-9.]/", "-", $videoname);
                                $videoname = rand(1000,100000)."-".$videoname;
                                $videoname_loc = $_FILES['video']['tmp_name'];
                                $videoname_size = $_FILES['video']['size'];
                                $videoname_type = $_FILES['video']['type'];
                                $videoLocation = "videos/";

                                if ($videoname_type == "video/mp4") {
                                    $new_video = strtolower($videoname);
                                    if ($videoname_size > (209715200)) {
                                        ?>
                                        <script>
                                        alert('Error: Video size must not exceed 200MB.');
                                        window.location.href='subject.php';
                                        </script>
                                        <?php
                                    } else {
                                        $new_video_name = str_replace(' ', '-', $new_video);

                                        $extVideo = pathinfo($new_video_name, PATHINFO_EXTENSION); //file extension

                                        $lecturer_id = $_SESSION['lecturer_id']; //lecturerID
                                        $videoSubID = $_POST['txtVideoSubjectId'];

                                        $videoname_size_mb = $videoname_size/1048576;
                                        $videoMB = number_format($videoname_size_mb, 2, '.', ',') ."MB";

                                        if (move_uploaded_file($videoname_loc, $videoLocation.$new_video_name)) {
                                            mysql_query("INSERT INTO video(subject_id,lecturer_id,video_name,format,size,added_date) VALUES('$videoSubID','$lecturer_id','$new_video_name','$extVideo','$videoMB',NOW())");
                                                ?>
                                                <script>
                                                alert('Video successfully uploaded');
                                                window.location.href='video.php';
                                                </script>
                                                <?php
                                            } else {
                                                ?>
                                                <script>
                                                alert('Error while uploading video');
                                                window.location.href='subject.php';
                                                </script>
                                                <?php
                                            }
                                        }

                                    } else {
                                        ?>
                                        <script>
                                        alert('Error: Only (mp4) video format required!');
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