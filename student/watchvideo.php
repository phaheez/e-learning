<?php 
include('header-student.php'); 
include('functions/session.php');

$get_video_id = $_GET['vid_id'];
$query4 = mysql_query("SELECT * FROM video WHERE video_id='$get_video_id'");
while ($row4 = mysql_fetch_array($query4)) {
	$vidname = $row4['video_name'];
}
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-8">
				<div class="pull-left">
					<a title="Back to Video" href="video.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back
					</a>
				</div>
				<br><br>

				<div id="box">
					<video class="video" width="100%" height="440" style="padding:10px" 
					src="<?php echo "../lecturer/videos/$vidname"; ?>" controls="controls"
					poster="../images/video_banner.jpg" preload="none"></video>
				</div>
			</div>
			<div class="col-md-4">
				<br><br>
				<div class="alert alert-success">
					<strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;Video Comment</strong>
				</div>
				<form role="form" method="post" action="">
					<div class="form-group">
						<input type="hidden" id="txtVideoID" name="txtVideoID" value="<?php echo $get_video_id; ?>">
						<textarea class="form-control" cols="45" rows="5" name="txtComment" id="txtComment"placeholder="Enter Your Comment Here..." style="font-size:17px; padding:10px;" required></textarea>
					</div>
					<button type="submit" name="btnComment" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-send">&nbsp;Comment</span>
					</button>

					<?php
					if (isset($_POST['btnComment'])) {
						function clean($str) {
							$str = @trim($str);
							if (get_magic_quotes_gpc()) {
								$str = stripslashes($str);
							}
							return mysql_real_escape_string($str);
						}

						$vID = clean($_POST['txtVideoID']);
						$std_id = $_SESSION['student_id'];
						$commt = clean($_POST['txtComment']);

						$sql6 = mysql_query("SELECT comment_id FROM video_comment WHERE(student_id='$std_id' && video_id='$vID')");

						if (mysql_num_rows($sql6)> 0) {
							echo '<script language="javascript">';
							echo 'alert("Error: You have already comment on this video!!!")';
							echo '</script>';
							echo '<meta http-equiv="refresh" content="0;url=video.php" />';
						} else {
							mysql_query("INSERT INTO video_comment(student_id,video_id,comment,comment_date) VALUES('$std_id','$vID','$commt',NOW())") or die(mysql_error());
							echo '<script language="javascript">';
							echo 'alert("Comment added successful")';
							echo '</script>';
							echo '<meta http-equiv="refresh" content="0;url=video.php" />';
						}
					}
					?>
				</form>
			</div>
		</div>

		<?php include('footer-student.php'); ?>
	</div>
</body>