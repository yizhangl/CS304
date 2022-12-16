<!DOCTYPE html>
<html>
	<head>
		<title>Join</title>
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
			<h1>Races</h1>
			<p>Select a location from the list below to view the races it contains.</p>

			<form method="GET" action="join.php">
				<input type="hidden" id="joinRequest" name="joinRequest">
				<select id="dropdownList" name="location">
					<option value="Germany">Germany</option>
					<option value="Japan">Japan</option>
					<option value="United States">United States</option>
					<option value="Brazil">Brazil</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="France">France</option>
					<option value="Belgium">Belgium</option>
				<input style="margin-left:10px" type="submit" id="submitButton" value="Submit" name="joinSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_GET['joinSubmit'])) {
					handleGETRequest();
				}
			?>
		</main>
	</body>
</html>