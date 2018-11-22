<!DOCTYPE html>
<?php
	include "head.php";
	include "database.php";
?>
<?php
	/*
	* Get Total Questions
	*/

	$query = "SELECT * FROM questions_tak";
	
	//Get results
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
?>

<html>
<body>
	<main>
		<div class="container">
			<h2>Das Quiz des Technik AK!</h2>
			<p>Teste dein technisches Wissen mit dem Multiple-Choice-Quiz des Technik AK</p>
			<ul>
				<li><strong>Anzahl der Fragen: </strong><?php echo $total; ?></li>
				<li><strong>Art des Quiz: </strong>Multiple-Choice</li>
				<li><strong>Voraussichtliche Zeit: </strong><?php echo $total * .5; ?> Minute(n)</li>
			</ul>
			<a href="question.php?n=1" class="start">Quiz starten</a>
		</div>
	</main>

<?php
	include "footer.php";
?>

</body>
</html>