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
            <a class="navbar-brand page-scroll" href="index.php">CHMSC LMS</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Course Material <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="document.php"><span class="glyphicon glyphicon-file"></span>&nbsp;Document</a></li>
                        <li><a href="video.php"><span class="glyphicon glyphicon-film"></span>&nbsp;Video</a></li>
                    </ul>
                </li>
                <li><a href="assignment.php">Assignment</a></li>
                <li><a href="quiz.php">Quiz</a></li>
                <!--<li><a href="#"><span class="glyphicon glyphicon-book"></span>&nbsp;Chat</a></li>
                <li><a href="message.php">Message <span class="badge">4</span></a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome: <span><?php echo $_SESSION['student_name']; ?></span></a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-cog"></span>&nbsp;Settings 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Account</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>





