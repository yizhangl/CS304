<!DOCTYPE html>
<html>
	<head>
		<title>Division</title>
		<meta charset="utf-8" />
	</head>
	<style>
		<?php 
			include 'query.css';
		?>
	</style>
	<body id="page">
		<ul id="navbar">
			<li><a href="title.php">Motorsport</a></li>
			<li style="float:right"><a href="main_menu.php">Main Menu</a></li>
		</ul>
		<main>
			<h1>Tournament Stats</h1>
			<p>Press sumbit to list all the characters who have participated in all tournaments.</p>

			<form method="GET" action="division.php">
				<input type="hidden" id="divisionRequest" name="divisionRequest">
                <input type="submit" id="submitButton" value="Submit" name="divisionSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_GET['divisionSubmit'])) {
					handleGETRequest();
				}
			?>
		</main>
	</body>
</html>