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
									<strong><span class="glyphicon glyphicon-tags"></span>&nbsp;Course(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<?php include('add_course_modal.php'); ?>

										<a href="#add-course" title="Add New Course" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW COURSE</a>
										
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>S/N</th>
										<th>Course Title</th>
										<th>Course Code</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("select * from course") or die(mysql_error());

									$count = 1;

									while ($row = mysql_fetch_array($query)) {
										$course_id = $row['course_id'];
										?>
										<tr>
											<td><?php echo $count++; ?></td>
											<td><?php echo $row['title']; ?></td>
											<td><?php echo $row['code']; ?></td>
											<td>
												<a href="#edit-course<?php echo $course_id; ?>" title="Edit Course" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
												<a href="#delete-course<?php echo $course_id; ?>" title="Delete Course" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

												<?php
												include('edit_course_modal.php');
												//include('delete_course_modal.php');
												?>
											</td>

											<!--Course Delete Modal-->
											<div id="delete-course<?php echo $course_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Course Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this course?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_course.php?id=<?php echo $course_id; ?>" class="btn btn-danger">Delete</a>
																<button type="button" class="btn btn-success" data-dismiss="modal">
																	Cancel
																</button>
															</div>

												        </div>
												    </div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->
											<!--End Delete Modal-->
										</tr>
										<?php
									}
									?>
									<!--<tr>
										<td>1</td>
										<td>CSE 301</td>
										<td>Introduction to C# programming language</td>
										<td>
											<a href="#edit-course" title="Edit Course" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
											<a href="#delete-course" title="Delete Course" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
										</td>
										<?php
										//include('edit_course_modal.php');
										//include('delete_course_modal.php');
										?>
									</tr>-->
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