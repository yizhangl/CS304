<!DOCTYPE html>
<html>
	<head>
		<title>Projection</title>
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
			<h1>Garage</h1>
			<p>Select attributes and press submit to view all cars.</p>

			<!-- Citation: creation of checkbox learned from
			https://www.w3schools.com/tags/att_input_type_checkbox.asp -->
			<form id="user-input" method="GET" action="projection.php">
				<input type="hidden" id="projectionRequest" name="projectionRequest">
				<input type="checkbox" id="class" name="carAttribute[]" value="Class">
				<label for="class">Class</label><br>
				<input type="checkbox" id="speed" name="carAttribute[]" value="Speed">
				<label for="speed">Speed</label><br>
				<input type="checkbox" id="handling" name="carAttribute[]" value="Handling">
				<label for="handling">Handling</label><br>
				<input type="checkbox" id="acceleration" name="carAttribute[]" value="Acceleration">
				<label for="acceleration">Acceleration</label><br><br>
				<input type="submit" id="submitButton" value="Submit" name="projectionSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_GET['projectionSubmit'])) {
					handleGETRequest();
				}
			?>
		</main>
	</body>
</html>