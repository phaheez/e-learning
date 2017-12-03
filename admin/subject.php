<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-admin.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-admin.php'); ?>

	<div class="container body-content">
		<div class="row">
			<?php include('navleft-admin.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div id="responsive" class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
								<div class="alert alert-info">
									<strong><span class="glyphicon glyphicon-check"></span>&nbsp;Subject</strong>
								</div>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>Course</th>
										<th>Subject</th>
										<th>Lecturer</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php 
									$query = mysql_query("select * from subject") or die(mysql_error());
									while ($row = mysql_fetch_array($query)) {
										$subject_id = $row['subject_id'];
										$course_id = $row['course_id'];
										$lecturer_id = $row['lecturer_id'];

										$query1 = mysql_query("select code from course where course_id='$course_id'") or die(mysql_error());
										$row1 = mysql_fetch_array($query1);
										$code = $row1['code'];

										$query2 = mysql_query("select * from lecturer where lecturer_id='$lecturer_id'") or die(mysql_error());
										$row2 = mysql_fetch_array($query2);
										$title = $row2['title'];
										$name = $row2['fullname'];
										$dept_id = $row2['dept_id'];

										$query3 = mysql_query("select code from department where dept_id='$dept_id'") or die(mysql_error());
										$row3 = mysql_fetch_array($query3);
										$dept = $row3['code'];
										$display = $lecturer_id ."-". $dept ."(". $title ." ". $name .")";

										?>
										<tr>
											<td><?php echo $code; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><?php echo $display; ?></td>
											<td>
												<a href="#delete-subject<?php echo $subject_id; ?>" title="Delete Subject" role="button" class="btn btn-danger" data-toggle="modal">
													<span class="glyphicon glyphicon-trash"></span>&nbsp;Delete
												</a>
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
			</div>
		</div>

		<?php include('footer-admin.php'); ?>
	</div>
</body>