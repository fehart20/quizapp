<?php session_start(); ?>
<?php
include "head.php";
?>


<body>
	<main>
		<div class="container">
			<h2>Du hast es geschaft!</h2>
				<p>Herzlichen Gl&uuml;ckwunsch! Du hast den Test bestanden</p>
				<p>Dein Score: <?php echo $_SESSION['score']; ?></p>
				<a href="question.php?n=1" class="start">Nochmal versuchen</a>
		</div>
	</main>
<?php
include "footer.php";
?>
	
</body>
</html>
<?php session_destroy(); ?>