<!-- Navigation -->
<nav class="navbar navbar-inverse">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#">CHMSC E-LEARNING SYSTEM</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="dropdown">
                    <div class="btn-group" style="margin:9px 0 0 12px;">
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-log-in">&nbsp;Login</span>
                        </button>
                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#student" role="button"  data-toggle="modal"><span class="glyphicon glyphicon-user"></span>&nbsp;Student</a></li>
                            <li><a href="#lecturer" role="button"  data-toggle="modal"><span class="glyphicon glyphicon-user"></span>&nbsp;Lecturer</a></li>
                        </ul>
                    </div>
                    <!--Student & Lecturer Login Modal-->
                    <?php
                    include('student_modal.php');
                    include('lecturer_modal.php');
                    ?>
                    <!--<?php  ?>-->
                </li>
            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="images/head.png" style="background-color:white;width:100%;height:80px">
        </div>
    </div>
</div>




