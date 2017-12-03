<!-- Modal -->
<div id="add-course" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Course</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtTitle">Course Title:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtTitle"
                                    id="txtTitle" placeholder="Enter Course Title"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtCode">Course Code:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtCode"
                                    id="txtCode" placeholder="Enter Course Code"/>
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
                        <button type="submit" name="btnAddCourse" class="btn btn-primary">
                            Add Course
                        </button>

                        <?php
                        if (isset($_POST['btnAddCourse'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $title = clean(strtoupper($_POST['txtTitle']));
                            $code = clean(strtoupper($_POST['txtCode']));

                            mysql_query("insert into course(title,code) values('$title', '$code')") or die(mysql_error());
                            header('location:course.php');
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->