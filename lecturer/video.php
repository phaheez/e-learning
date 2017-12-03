<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-lecturer.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-lecturer.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<a title="Back to Subject" href="subject.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back to Subject
					</a>
				</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-film"></span>&nbsp;Course Material Video(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Subject</th>
								<th>Video Name</th> 
								<th width="50">Format</th>
								<th width="50">Size</th>
								<th width="155">Date Added</th>              
								<th>Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$lecturer_id = $_SESSION['lecturer_id'];
							$query = mysql_query("select * from video where lecturer_id='$lecturer_id'") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$video_id = $row['video_id'];
								$subject_id = $row['subject_id'];

								$query1 = mysql_query("select * from subject where subject_id='$subject_id'") or die(mysql_error());
								$row1 = mysql_fetch_array($query1);
								$course_id = $row1['course_id'];
								$subject = $row1['description'];

								$query2 = mysql_query("select code from course where course_id='$course_id'") or die(mysql_error());
								$row2 = mysql_fetch_array($query2);
								$subject_code = $row2['code'];

								?>
								<tr>
									<td><?php echo $subject_code; ?></td>
									<td><?php echo $subject; ?></td>
									<td><?php echo $row['video_name']; ?></td>
									<td><?php echo $row['format']; ?></td>
									<td><?php echo $row['size']; ?></td>
									<td><?php echo $row['added_date']; ?></td>
									<td>
										<a href="#delete-video<?php echo $video_id; ?>" title="Delete Video" role="button" class="btn btn-danger" data-toggle="modal">
											<span class="glyphicon glyphicon-trash"></span>&nbsp;Delete
										</a>
									</td>
									<!-- Delete Document Modal -->
									<div id="delete-video<?php echo $video_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title text-success" id="myModalLabel">Video Delete Confirmation?</h4>
												</div>

												<!-- Modal Body -->
												<div class="modal-body" style="font-family:tahoma">
													<p>Do you want to delete this video?</p>
													<!-- Modal Footer -->
													<div class="modal-footer">
														<a href="delete_video.php?id=<?php echo $video_id; ?>" class="btn btn-danger">Delete</a>
														<button type="button" class="btn btn-success" data-dismiss="modal">
															Cancel
														</button>
													</div>
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>

					<nav arial-label="..." class="pull-right">
						<ul class="pager">
							<li>
								<a href="#"><span arial-hidden="true">&larr;</span>prev</a>
							</li>
							<li>
								<a href="#">Next<span arial-hidden="true">&rarr;</span></a>
							</li>
						</ul>
					</nav>
				</div>
				
			</div>
		</div>

		<?php include('footer-lecturer.php'); ?>
	</div>
</body>