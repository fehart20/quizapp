<?php
include "head.php";
include "database.php";
?>
<?php
	if(isset($_POST['submit'])) {
		//Get post variables
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		//Choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];
		
		//Question query
		$query = "INSERT INTO `questions_tak`(question_number, text)
					VALUES('$question_number', '$question_text')";
					
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert
		if($insert_row) {
			foreach($choices as $choice => $value) {
				if($value != '') {
						if($correct_choice == $choice) {
							$is_correct = 1;
						} else {
							$is_correct = 0;
						}
						//Choice query
						$query = "INSERT INTO `choices_tak` (question_number, is_correct, text)
									VALUES ('$question_number','$is_correct','$value')";
									
						//Run query
						$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
						
						//Validate insert
						if($insert_row) {
							continue;
						} else {
							die('Fehler: ('.$mysqli->error . ') '.$mysqli->error);
						}
				}
			}
			$msg = 'Frage wurde hinzugef&uuml;gt';
		}
	}
	
	/*
	* Get total questions
	*/
	$query = "SELECT * FROM `questions_tak`";
	
	//Get the result
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
?>

<body>
	<main>
		<div class="container">
			<h2>Frage hinzuf&uuml;gen</h2>
			<?php
				if(isset($msg)) {
					echo '<p>'.$msg.'</p>';
				}
			?>
			<form method="post" action="add.php">
				<p>
					<label>Nummer der Frage: </label>
					<input type="number" value="<?php echo $next; ?>" name="question_number" />
				</p>
				<p>
					<label>Text der Frage: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Antwort #1: </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Antwort #2: </label>
					<input type="text" name="choice2" />
				</p>
				<p>
					<label>Antwort #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Antwort #4: </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Antwort #5: </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Nummer der richtigen Antwort: </label>
					<input type="number" name="correct_choice" />
				</p>
				<p>
					<input type="submit" name="submit" value="Abschicken" />
				</p>
			</form>
		</div>
	</main>
<?php
include "footer.php";
?>
	
</body>
</html>