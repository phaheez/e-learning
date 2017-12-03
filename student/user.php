<?php
include('functions/session.php');
include('../admin/functions/connect.php');

class Cl_User
{
	public function getAnswers(array $data)
	{
		if( !empty( $data ) ){
			$right_answer=0;
			$wrong_answer=0;
			$unanswered=0;
			$keys=array_keys($data);
			$order=join(",",$keys);
			$query = "SELECT question_id, answer FROM questions WHERE question_id IN ($order) ORDER BY FIELD(question_id,$order)";
			$response = mysql_query($query) or die(mysql_error());
			
			$student_id = $_SESSION['student_id'];
			$result_id = $_SESSION['result_id'];
			
			while($result = mysql_fetch_array($response)){
				if($result['answer'] == $_POST[$result['question_id']]){
					$right_answer++;
				}else if($data[$result['question_id']]=='quiz_exam'){
					$unanswered++;
				}
				else{
					$wrong_answer++;
				}
			}

			$total = $right_answer + $wrong_answer + $unanswered;
			$p = (intval($right_answer) / intval($total)) * 100;
			$per = number_format($p, 2, '.', ',');
			$percentage = $per ."%";
			$grade = "";

			if ($per >= 80.00) {
				$grade = "Excellent";
			} else if ($per >= 60.00) {
				$grade = "Very Good";
			} else if ($per >= 40.00) {
				$grade = "Good";
			} else if ($per >= 20.00) {
				$grade = "Fair";
			} else {
				$grade = "Poor";
			}

			$sco = intval($right_answer);
			$score = "Score ". $sco ." out of ". $total;

			$results = array();
			
			$results['right_answer'] = $right_answer;
			$results['wrong_answer'] = $wrong_answer;
			$results['unanswered'] = $unanswered;

			$results['total'] = $total;
			$results['percentage'] = $percentage;
			$results['grade'] = $grade;
			$results['score'] = $score;



			$check = mysql_query("SELECT score,status FROM result WHERE (result_id='$result_id' && student_id='$student_id')") or die(mysql_error());
			$count = mysql_num_rows($check);
			while ($res = mysql_fetch_array($check)) {
				$s = $res['score'];
				$st= $res['status'];
			}
			if ($count > 0 && $s !== null && $st !== 'UnFinished') {
				?>
				<script>
				alert('Quiz Already Submitted');
				window.location.href='quiz.php';
				</script>
				<?php
			} else {
				$update_query = "UPDATE result SET score='$sco', percentage='$percentage', grade='$grade', status='Completed', result_date=NOW() WHERE (student_id='$student_id' AND result_id='$result_id')";
				mysql_query($update_query) or die(mysql_error());
				return $results;
			}
		}	
	}
}