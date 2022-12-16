<!DOCTYPE html>
<html>
	<head>
		<title>Aggregation with having</title>
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
			<h1>Car Stats</h1>
			<p>Select a car stat and press submit to determine its maximum value for each car class with at least 2 cars</p>
			
			<form method="GET" action="aggregation_with_having.php">
				<input type="hidden" id="aggregationWithHavingRequest" name="aggregationWithHavingRequest">
				<select id="dropdownList" name="option">
                    <option value = Speed> Speed</option>
                    <option value = Handling> Handling</option>
                    <option value = Acceleration> Acceleration</option>
                    
				<input style="margin-left:10px" type="submit" id="submitButton" value="Submit" name="aggregationWithHavingSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_GET['aggregationWithHavingSubmit'])) {
					handleGETRequest();
				}
			?>
		</main>
	</body>
</html>