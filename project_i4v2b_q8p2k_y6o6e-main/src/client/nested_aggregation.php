<!DOCTYPE html>
<html>
	<head>
		<title>Nested Aggregation</title>
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
			<h1>Power-up Stats</h1>
			<p>Find the average duration for each type of power-up. Enter a value for the number of races a power-up must be included in to be included in the search.</p>
			
			<form method="GET" action="nested_aggregation.php">
				<input type="hidden" id="nestedAggregationRequest" name="nestedAggregationRequest">
				<input type="number" id="numRaces" name="numRaces" min=0>
				<input style="margin-left:10px" type="submit" id="submitButton" value="Submit" name="nestedAggregationSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_GET['nestedAggregationSubmit'])) {
					handleGETRequest();
				}
			?>
		</main>
	</body>
</html>