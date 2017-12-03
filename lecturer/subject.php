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
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Course Subject</strong>
						</div>

						<div class="row">
							<div class="col-md-12">
								<a href="#subject" title="Add New Subject" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW SUBJECT</a>
								<?php include('add_subject_modal.php'); ?>
							</div>
						</div><br>

						<thead>
							<tr style="background-color:#333; color: white">
								<th>Course</th>
								<th>Subject</th>
								<th width="220">Document</th> 
								<th>Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$lecturer_id = $_SESSION['lecturer_id'];
							$query = mysql_query("select * from subject where lecturer_id='$lecturer_id'") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$subject_id = $row['subject_id'];
								$course_id = $row['course_id'];

								$query1 = mysql_query("select code from course where course_id='$course_id'") or die(mysql_error());
								$row1 = mysql_fetch_array($query1);
								$code = $row1['code'];

								?>
								<tr>
									<td><?php echo $code; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td>
										<a href="#add-document<?php echo $subject_id; ?>" title="Add File" role="button" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add File</a>
										<a href="#add-video<?php echo $subject_id; ?>" title="Add Video" role="button" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Video</a>
										<?php
										include('add_document_modal.php');
										include('add_video_modal.php');
										?>
									</td>
									<td>
										<a href="#edit-subject<?php echo $subject_id; ?>" title="Edit Subject" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
										<a href="#delete-subject<?php echo $subject_id; ?>" title="Delete Subject" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
										<?php
										include('edit_subject_modal.php');
										//include('delete_subject_modal.php');
										?>
									</td>
									<!-- Subject Delete Modal -->
									<div id="delete-subject<?php echo $subject_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title text-success" id="myModalLabel">Subject Delete Confirmation?</h4>
												</div>

												<!-- Modal Body -->
												<div class="modal-body" style="font-family:tahoma">
													<p>Do you want to delete this subject?</p>
													<!-- Modal Footer -->
													<div class="modal-footer">

														<a href="delete_subject.php?id=<?php echo $subject_id; ?>" class="btn btn-danger">Delete</a>
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