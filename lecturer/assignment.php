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
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Assignment</strong>
						</div>

						<div class="row">
							<div class="col-md-12">
								<a href="#assignment" title="Add New Assignment" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW ASSIGNMENT</a>
								<?php include('add_assignment_modal.php'); ?>
							</div>
						</div><br>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Assignment</th>
								<th width="160">Added Date</th>
								<th width="160">Due Date</th>
								<th width="200">Submittion</th> 
								<th width="180">Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$lecturer_id = $_SESSION['lecturer_id'];
							$query = mysql_query("select * from assignments where lecturer_id='$lecturer_id'") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$assignments_id = $row['assignments_id'];
								$course_id = $row['course_id'];

								$query1 = mysql_query("select code from course where course_id='$course_id'") or die(mysql_error());
								$row1 = mysql_fetch_array($query1);
								$code = $row1['code'];

								?>
								<tr>
									<td><?php echo $code; ?></td>
									<td><?php echo $row['assignment']; ?></td>
									<td><?php echo $row['added_date']; ?></td>
									<td><?php echo $row['due_date']; ?></td>
									<td>
										<a href="submitted-assignment.php?id=<?php echo $assignments_id; ?>" title="View Submitted Assignment" role="button" class="btn btn-primary"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Submitted Assignments</a>
									</td>
									<td>
										<a href="#edit-assignment<?php echo $assignments_id; ?>" title="Edit Assignment" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit
										</a>
										<a href="#delete-assignment<?php echo $assignments_id; ?>" title="Delete Assignment" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
										<?php
										include('edit_assignment_modal.php');
										?>
									</td>

									<!-- Delete Assignment Modal -->
									<div id="delete-assignment<?php echo $assignments_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title text-success" id="myModalLabel">Assignment Delete Confirmation?</h4>
												</div>

												<!-- Modal Body -->
												<div class="modal-body" style="font-family:tahoma">
													<p>Do you want to delete this assignment?</p>
													<!-- Modal Footer -->
													<div class="modal-footer">
														<a href="delete_assignment.php?id=<?php echo $assignments_id; ?>" class="btn btn-danger">Delete</a>
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