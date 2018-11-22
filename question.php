<?php session_start(); ?>
<?php
	include "head.php";
	include "database.php";s
?>
<?php
	//Set question number
	
	$number = (int) $_GET['n'];

	
	/*
	*	Get total questions
	*/
	$query = "SELECT * FROM `questions_tak`";
		
	//Get result
		
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
		
	/*
	*	Get Question
	*/
	
	$query = "SELECT * FROM `questions_tak`
				WHERE question_number = $number";
	
	//Get result
	
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$question = $result->fetch_assoc();
	
	
	/*
	*	Get Choices
	*/
	
	$query = "SELECT * FROM `choices_tak`
				WHERE question_number = $number";
	
	//Get choices
	
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
?>

<body>
	<main>
		<div class="container">
			<div class="current">Frage <?php echo $question['question_number']; ?> von <?php echo $total; ?></div>
			<p class="question">
				<?php echo $question['text'];?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while($row = $choices->fetch_assoc()): ?>
						<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="Absenden" />
				<input type="hidden"  name="number" value="<?php echo $number; ?>" />
			</form>
		</div>
	</main>
<?php
	include "footer.php";
?>
	
</body>
</html>