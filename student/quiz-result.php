<?php 
include('header-student.php');
include('user.php');

if( !empty( $_POST )){
	try {
		$user = new Cl_User();
		$result = $user->getAnswers( $_POST );
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	} 
}else{
	header('location: quiz.php');
	exit;
}
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<strong>
					<h1 class="text-center">Your Quiz Results:</h1>
				</strong>
			</div>
			<div class="col-md-3"></div>
		</div><br>

		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal">
					<div class="form-group mg-b50">
						<p class="col-md-6 col-sm-7 control-label">Correct Answers:</p>
						<div class="col-md-6 col-sm-5">
							<span class="well ans">
								<?php echo isset($result['right_answer'])? $result['right_answer']:''; ?>
							</span>
						</div>
					</div>
					<div class="form-group mg-b50">
						<p class="col-md-6 col-sm-7 control-label">Wrong Answers:</p>
						<div class="col-md-6 col-sm-5">
							<span class="well ans"> 
								<?php echo isset($result['wrong_answer'])? $result['wrong_answer']:''; ?>
							</span>
						</div>
					</div>
					<div class="form-group mg-b50">
						<p class="col-md-6 col-sm-7 control-label">Unanswered Questions:</p>
						<div class="col-md-6 col-sm-5">
							<span class="well ans"> 
								<?php echo isset($result['unanswered'])? $result['unanswered']:''; ?>
							</span> 
						</div>
					</div>
					<div class="form-group mg-b">
						<p class="col-md-6 col-sm-7 control-label">Score(s):</p>
						<div class="col-md-6 col-sm-5">
							<span class="ans"> 
								<?php echo isset($result['score'])? $result['score']:''; ?>
							</span> 
						</div>
					</div>
					<div class="form-group mg-b">
						<p class="col-md-6 col-sm-7 control-label">Percentage:</p>
						<div class="col-md-6 col-sm-5">
							<span class="ans"> 
								<?php echo isset($result['percentage'])? $result['percentage']:''; ?>
							</span> 
						</div>
					</div>
					<div class="form-group mg-b">
						<p class="col-md-6 col-sm-7 control-label">Grade:</p>
						<div class="col-md-6 col-sm-5">
							<span class="ans"> 
								<?php echo isset($result['grade'])? $result['grade']:''; ?>
							</span> 
						</div>
					</div>
				</form>
				<div class="text-center">
					<a href="quiz.php" class="btn btn-success" style="height:50px;padding-top:15px">Start New Quiz</a>
				</div>
			</div>
		</div>
	</div>
</body>

