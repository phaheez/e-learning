<!-- Modal -->
<div id="edit-department<?php echo $dept_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Edit Department</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateName">Name:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="hidden" id="txtDeptID" name="txtDeptID" value="<?php echo $dept_id; ?>" />
                                    <input type="text" class="form-control" required name="txtUpdateName"
                                    id="txtUpdateName" value="<?php echo $row['name']; ?>"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateCode">Code:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtUpdateCode"
                                    id="txtUpdateCode" value="<?php echo $row['code']; ?>"/>
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
                        <button type="submit" name="btnUpdate" class="btn btn-primary">
                            Update Department
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

                            $deptID = clean($_POST['txtDeptID']);
                            $name = clean(strtoupper($_POST['txtUpdateName']));
                            $code = clean(strtoupper($_POST['txtUpdateCode']));

                            mysql_query("update department set name='$name',code='$code' where dept_id='$deptID'") or die(mysql_error());
                            header('location:department.php');
                        }
                        ?>
                    </div>
                </form>
            </div>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->