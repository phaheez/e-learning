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
				<div class="alert alert-info">
					<strong><span class="glyphicon glyphicon-envelope"></span>&nbsp;Message(s)</strong>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="responsive">
					<ul class="nav nav-tabs">
						<li role="presentation" class="active">
							<a href="#newmessage-tab" data-toggle="tab" style="font-family:tahoma"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Send New Message</a>
						</li>
						<li role="presentation">
							<a href="#sentmessage-tab" data-toggle="tab" style="font-family:tahoma"><span class="glyphicon glyphicon-send"></span>&nbsp;Sent Message</a>
						</li>
						<li role="presentation">
							<a href="#inbox-tab" data-toggle="tab" style="font-family:tahoma"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Inbox <span class="badge">5</span></a>
						</li>
					</ul>

					<!--Tab Content-->
					<div class="tab-content">
						<!--Send New Message Pane-->
						<div class="tab-pane active" id="newmessage-tab">
							<form id="messageForm" role="form" method="post" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 col-md-1 control-label" 
									for="ddSentTo">Send To:</label>
									<div class="col-sm-8 col-md-8">
										<select class="form-control" id="ddSentTo" name="ddSentTo" required>
											<option value="">Please Select</option>
											<option value="student">Student</option>
											<option value="lecturer">Lecturer</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label  class="col-sm-2 col-md-1 control-label"
									for="ddlUser">User:</label>
									<div class="col-sm-8 col-md-8">
										<select class="form-control" id="ddUser" name="ddUser" required>
											<option value="">Please Select</option>
											<option value="">Phaheez</option>
											<option value="">Dr. G.A Ganiyu</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-md-1 control-label" 
									for="txtSubject">Subject:</label>
									<div class="col-sm-8 col-md-8">
										<input type="text" class="form-control" required name="txtSubject"
										id="txtSubject" placeholder="Enter Subject"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 col-md-1 control-label" 
									for="txtMessage">Message:</label>
									<div class="col-sm-8 col-md-8">
										<textarea type="text" class="form-control" required name="txtMessage"
										id="txtMessage" placeholder="Enter Message" rows="5" cols="40"></textarea>
									</div>
								</div>

								<div class="form-group form-inline">
									<div class="col-sm-2 col-md-1"></div>
									<div class="col-sm-8 col-md-8" id="sendButton">
										<button type="submit" name="btnSend" class="btn btn-primary">
											Send Message
										</button>
										<button type="submit" style="width:100px" name="btnReset" class="btn btn-danger">
											Reset
										</button>
									</div>
								</div>
							</form>
						</div>

						<!--Sent Message Pane-->
						<div class="tab-pane" id="sentmessage-tab">
							<div id="responsive" class="table-responsive">
								<table cellpadding="0" class="table table-striped" style="font-family:tahoma;background-color:rgba(230, 230, 230, 0.65);">
									<thead>
										<tr>
											<th>Sent To</th>
											<th>Sent To User</th>
											<th>Subect</th>
											<th>Date</th> 
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>Lecturer</td>
											<td>Dr. G.A Adeyanju</td>
											<td>Introduction to C# programming language</td>
											<td>Monday, August 15, 2016</td>
											<td>
												<a title="View Message" href="#view-message" role="button" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
											</td>
										</tr>
										<tr>
											<td>Student</td>
											<td>Phaheez</td>
											<td>Introduction to C# programming language</td>
											<td>Monday, August 15, 2016</td>
											<td>
												<a title="View Message" href="#view-message" role="button" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
											</td>
										</tr>
										<?php include('view_message_modal.php'); ?>
									</tbody>
								</table>
							</div>
						</div>

						<!--Inbox Pane-->
						<div class="tab-pane" id="inbox-tab">
							<div id="responsive" class="table-responsive">
								<table cellpadding="0" class="table table-striped" style="font-family:tahoma;background-color:rgba(230, 230, 230, 0.65);">
									<thead>
										<tr>
											<th>Message From</th>
											<th>Subect</th>
											<th>Date</th> 
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>Dr. G.A Adeyanju</td>
											<td>C# programming language</td>
											<td>Monday, August 15, 2016</td>
											<td>
												<a title="View Message" href="#inbox-message" role="button" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
											</td>
										</tr>
										<tr>
											<td>Phaheez</td>
											<td>Java programming language</td>
											<td>Monday, August 15, 2016</td>
											<td>
												<a title="View Message" href="#inbox-message" role="button" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View</a>
											</td>
										</tr>
										<?php include('inbox_message_modal.php'); ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include('footer-lecturer.php'); ?>
	</div>
</body>