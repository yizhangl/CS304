<!DOCTYPE html>
<html>
	<head>
		<title>Main Menu</title>
		<meta charset="utf-8" />
		<style>
			#page {
				display: grid;
				width: 100vw;
				height: 100vh;
				grid-template-areas: 
					"header"
					"main";
				grid-template-rows: 50px 1fr;
				margin: 0px;
				padding: 0px;
			}
			#menu {
				display: grid;
				grid-template-columns: repeat(4, 1fr);
				grid-template-rows: repeat(4, 1fr);
				gap: 0.5rem;
				margin: 10px;
			}
			#item1 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item1:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item2 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item2:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item3 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item3:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item4 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item4:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item5 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item5:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item6 {
				background-color: lightgray;
				border: 1px solid;
				grid-column: span 2;
			}
			#item6:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item7 {
				background-color: lightgray;
				border: 1px solid;
			}
			#item7:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item8 {
				background-color: lightgray;
				border: 1px solid;
			}
			#item8:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item9 {
				background-color: lightgray;
				border: 1px solid;
			}
			#item9:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			#item10 {
				background-color: lightgray;
				border: 1px solid;
			}
			#item10:hover {
				background-color: lightskyblue;
				transition: background-color 2s;
			}
			ul {
				list-style-type: none;
			}
			#menu > a {
				display: block;
				color: black;
				text-decoration: none;
				font-size: xx-large;
				font-weight: bold;
				padding: 5px;
				border: 2px solid lightskyblue;
			}
			#navbar {
				list-style-type: none;
				overflow: hidden;
				background-color: black;
				padding: 0px;
				margin: 0px;
			}
			li {
				float: left;
			}
			li a {
				display: block;
				color: white;
				text-decoration: none;
				font-size: x-large;
				font-weight: bold;
				padding: 10px;
			}
			li a:hover {
				text-decoration: underline;
				text-decoration-color: lightskyblue;
				transition: text-decoration-color 1.5s;
			}
		</style>
	</head>
	<body id="page">
		<ul id="navbar">
			<li><a href="title.php">Motorsport</a></li>
		</ul>
		<main id="menu">
			<a id="item1" href="insert.php">Tournament Creator</a>
			<a id="item2" href="delete.php">Character Deletion</a>
			<a id="item3" href="update.php">Tuning shop</a>
			<a id="item4" href="selection.php">Search</a>
			<a id="item5" href="projection.php">Garage</a>
			<a id="item6" href="join.php">Races</a>
			<a id="item7" href="aggregation_with_group_by.php">Character Stats</a>
			<a id="item8" href="aggregation_with_having.php">Car Stats</a>
			<a id="item9" href="nested_aggregation.php">Power-up Stats</a>
			<a id="item10" href="division.php">Tournament Stats</a>
		</main>
	</body>
	<?php
	?>
</html>