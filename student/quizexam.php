<?php
include('header-student.php');
include('functions/session.php');

$student_id = $_SESSION['student_id'];
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		
		<div class="row">
			<div class="col-md-10">
				<div class="alert alert-info">
					<strong><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Quiz Question(s)</strong>
				</div>
			</div>
			<div class="col-md-2">
				<div class="alert alert-warning">
					<strong><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Time : <span id="timer"></span></strong>
				</div>
			</div>
		</div>

		<?php 
		$get_quiz_id = $_GET['quiz_id'];
		$query = mysql_query("SELECT * FROM quiz WHERE quiz_id='$get_quiz_id'") or die(mysql_error());
		while ($row = mysql_fetch_array($query)) {
			$course_id = $row['course_id'];
			$title = $row['title'];
			$totalQuestion = $row['noOfQuestion'];
			$min = $row['minute'];
			$minute = $min ." minutes";

			$query1 = mysql_query("SELECT code FROM course WHERE course_id='$course_id'") or die(mysql_error());
			while ($row1 = mysql_fetch_array($query1)) {
				$code = $row1['code'];

				?>
				<div class="row">
					<div class="col-md-12">
						<div style="font-size:14px">
							<p><strong>Course: </strong>&nbsp;<span><?php echo $code; ?></span></p>
							<p><strong>Quiz Title: </strong>&nbsp;<span><?php echo $title; ?></span></p>
							<p><strong>Total Question: </strong>&nbsp;<span><?php echo $totalQuestion; ?></span></p>
							<p><strong>Minute(s): </strong>&nbsp;<span><?php echo $minute; ?></span></p>
							<p><input type="hidden" id="txtMinute" value="<?php echo $min; ?>"></p>
						</div>
					</div>
				</div><br>

				<!--Question Start Here-->
				<form class="form-horizontal" role="form" id='quiz_form' method="post" action="quiz-result.php">
					<?php
					$q = mysql_query("SELECT result_id FROM result WHERE (quiz_id='$get_quiz_id' && student_id='$student_id')") or die(mysql_error());
					$c = mysql_num_rows($q);
					while ($r = mysql_fetch_array($q)) {
						$res_id = $r['result_id'];
					}
					
					if ($c !== 1) {
						mysql_query("INSERT INTO result(quiz_id,student_id,status,result_date) VALUES('$get_quiz_id','$student_id','UnFinished',NOW())") or die(mysql_error()); 
						$_SESSION['result_id'] = mysql_insert_id();

						$results = array();
						$number_question = 1;
						$query2 = mysql_query("SELECT * FROM questions WHERE quiz_id='$get_quiz_id' ORDER BY RAND() LIMIT 10") or die(mysql_error());
						$rowCount = mysql_num_rows($query2);
						$remainder = $rowCount/$number_question;

						while ($row2 = mysql_fetch_assoc($query2)) {
							$results['questions'][] = $row2;
						}

						$i = 0; $j = 1; $k = 1;

						foreach ($results['questions'] as $result) {
							if ($i == 0) 
								echo "<div style='background-color: white;padding: 10px;' class='cont' id='question_splitter_$j'>";
							?>
							<div id='question<?php echo $k;?>' style='font-size:18px'>
								<p class='questions' id="qname<?php echo $j;?>"> 
									<strong><?php echo $k?>. <?php echo $result['question']; ?></strong>
								</p>
								<div style="margin-left:30px;">
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option1']; ?>"><?php echo $result['option1']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option2']; ?>"><?php echo $result['option2']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option3']; ?>"><?php echo $result['option3']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option4']; ?>"><?php echo $result['option4']; ?><br>
									<input type="radio" checked="checked" style="display:none" value="quiz_exam" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>">
								</div>
							</div>
							<?php

							$i++;
							if (( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 )) {
								echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
								echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
								echo "</div></div></div>";
								echo "</div>";
							} elseif ( $rowCount > $number_question  ) {
								if ( $j == 1 && $i == $number_question ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-primary' type='button'>Next&nbsp;<span class='glyphicon glyphicon-chevron-right'></span></button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;           
								} elseif ( $k == $rowCount ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<button id='".$j."' class='previous btn btn-primary' type='button'><span class='glyphicon glyphicon-chevron-left'></span>&nbsp;Previous</button>
									<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;
								} elseif ( $j > 1 && $i == $number_question ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<button id='".$j."' class='previous btn btn-primary' type='button'><span class='glyphicon glyphicon-chevron-left'></span>&nbsp;Previous</button>
									<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-primary' type='button'>Next&nbsp;<span class='glyphicon glyphicon-chevron-right'></span></button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;
								}
							}
							$k++;
						}
					} else {
						$_SESSION['result_id'] = $res_id;

						$results = array();
						$number_question = 1;
						$query2 = mysql_query("SELECT * FROM questions WHERE quiz_id='$get_quiz_id' ORDER BY RAND() LIMIT 10") or die(mysql_error());
						$rowCount = mysql_num_rows($query2);
						$remainder = $rowCount/$number_question;

						while ($row2 = mysql_fetch_assoc($query2)) {
							$results['questions'][] = $row2;
						}

						$i = 0; $j = 1; $k = 1;

						foreach ($results['questions'] as $result) {
							if ($i == 0) 
								echo "<div style='background-color: white;padding: 10px;' class='cont' id='question_splitter_$j'>";
							?>
							<div id='question<?php echo $k;?>' style='font-size:18px'>
								<p class='questions' id="qname<?php echo $j;?>"> 
									<strong ><?php echo $k?>. <?php echo $result['question']; ?></strong>
								</p>
								<div style="margin-left:30px;">
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option1']; ?>"><?php echo $result['option1']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option2']; ?>"><?php echo $result['option2']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option3']; ?>"><?php echo $result['option3']; ?><br>
									<input type="radio" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>" value="<?php echo $result['option4']; ?>"><?php echo $result['option4']; ?><br>
									<input type="radio" checked="checked" style="display:none" value="quiz_exam" id="answer<?php echo $result['question_id']; ?>" name="<?php echo $result['question_id']; ?>">
								</div>
							</div>
							<?php

							$i++;
							if (( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 )) {
								echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
								echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
								echo "</div></div></div>";
								echo "</div>";
							} elseif ( $rowCount > $number_question  ) {
								if ( $j == 1 && $i == $number_question ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-primary' type='button'>Next&nbsp;<span class='glyphicon glyphicon-chevron-right'></span></button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;           
								} elseif ( $k == $rowCount ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<button id='".$j."' class='previous btn btn-primary' type='button'><span class='glyphicon glyphicon-chevron-left'></span>&nbsp;Previous</button>
									<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;
								} elseif ( $j > 1 && $i == $number_question ) {
									echo "<div class='row'><div class='col-md-12'><div class='pull-right'>";
									echo "<button id='".$j."' class='previous btn btn-primary' type='button'><span class='glyphicon glyphicon-chevron-left'></span>&nbsp;Previous</button>
									<a href='quiz.php' role='button' class='btn btn-danger'>Cancel</a>
									<button id='".$j."' class='next btn btn-primary' type='button'>Next&nbsp;<span class='glyphicon glyphicon-chevron-right'></span></button>";
									echo "</div></div></div>";
									echo "</div>";
									$i = 0;
									$j++;
								}
							}
							$k++;
						}
					}
					?>
				</form>

				<?php
			}
		}
		?>


		<?php include('footer-student.php'); ?>
	</div>
</body>

<script type="text/javascript">

$('.cont').addClass('hide');
$('#question_splitter_1').removeClass('hide');
$(document).on('click','.next',function(){
	last=parseInt($(this).attr('id'));  console.log( last );   
	nex=last+1;
	$('#question_splitter_'+last).addClass('hide');

	$('#question_splitter_'+nex).removeClass('hide');
});

$(document).on('click','.previous',function(){
	last=parseInt($(this).attr('id'));     
	pre=last-1;
	$('#question_splitter_'+last).addClass('hide');

	$('#question_splitter_'+pre).removeClass('hide');
});

var m = parseInt($('#txtMinute').val());
var mt = (m * 60);


var c = mt;
var t;
timedCount();

function timedCount() {

	var hours = parseInt( c / 3600 ) % 24;
	var minutes = parseInt( c / 60 ) % 60;
	var seconds = c % 60;

	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);


	$('#timer').html(result);
	if(c == 0 ){
		setConfirmUnload(false);
		$("#quiz_form").submit();
	}
	c = c - 1;
	t = setTimeout(function(){ timedCount() }, 1000);
}

// Prevent accidental navigation away
setConfirmUnload(true);
function setConfirmUnload(on)
{
	window.onbeforeunload = on ? unloadMessage : null;
}
function unloadMessage()
{
	return 'Your Answered Questions are resetted zero, Please select stay on page to continue your Quiz';
}

$(document).on('click', 'button:submit',function(){
	setConfirmUnload(false);
});
</script>