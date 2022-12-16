<!DOCTYPE html>
<html>
	<head>
		<title>Insert</title>
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
			<h1>Tournament Creator</h1>
			<p>Enter text for the name and trophy of the tournament.</p>

			<form method="POST" action="insert.php">
				<input type="hidden" id="insertRequest" name="insertRequest">
				<label for="name">Name: <input type="text" id="name" name="name"><br><br>
				<label for="trophy">Trophy: <input type="text" name="trophy"><br><br>
				<p>Select races from the list below to include in the tournament.</p>
				<?php
					require_once('insert_handler.php');
					createCheckbox();
				?>
				<br>
				<input type="submit" id="submitButton" value="Create" name="insertSubmit">
			</form>

			<?php
				require_once('request_handler.php');

				if (isset($_POST['insertSubmit'])) {
					handlePOSTRequest();
				}
			?>
		</main>
	</body>
</html> 