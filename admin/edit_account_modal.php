<!-- Modal -->
<div id="edit-account<?php echo $admin_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Account</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label  class="col-sm-3 col-md-3 control-label" for="txtAdminUsername">Username:</label>
                            <div class="col-sm-8 col-md-8">
                                <input type="hidden" name="txtId" id="txtId" value="<?php echo $admin_id; ?>"/>
                                <input type="text" class="form-control" required name="txtAdminUsername"
                                id="txtAdminUsername" value="<?php echo $admin_username; ?>"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-3 col-md-3 control-label" for="txtAdminPassword">Password:</label>
                            <div class="col-sm-8 col-md-8">
                                <input type="text" class="form-control" required name="txtAdminPassword"
                                id="txtAdminPassword" value="<?php echo $admin_password; ?>"/>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btnChangeProfile" class="btn btn-primary" style="width:100px">
                                Submit
                            </button>

                            <?php
                            if (isset($_POST['btnChangeProfile'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $id = clean($_POST['txtId']);
                                $usname = clean($_POST['txtAdminUsername']);
                                $pword = clean($_POST['txtAdminPassword']);

                                mysql_query("UPDATE admin SET username='$usname',password='$pword' WHERE id='$id'") or die(mysql_error());
                                $_SESSION['username'] = $usname;
                                ?>
                                <script>
                                alert('Profile Successfully Changed!');
                                window.location.href='profile.php';
                                </script>
                                <?php
                            }
                            ob_end_flush();
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->