<!-- Modal -->
<div id="add-department" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Department</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtName">Name:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtName"
                                    id="txtName" placeholder="Enter Department Name"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtCode">Code:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtCode"
                                    id="txtCode" placeholder="Enter Department Code"/>
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
                        <button type="submit" name="btnAddDepartment" class="btn btn-primary">
                            Add Department
                        </button>

                        <?php
                        if (isset($_POST['btnAddDepartment'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $name = clean(strtoupper($_POST['txtName']));
                            $code = clean(strtoupper($_POST['txtCode']));

                            mysql_query("insert into department(name,code) values('$name', '$code')") or die(mysql_error());
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