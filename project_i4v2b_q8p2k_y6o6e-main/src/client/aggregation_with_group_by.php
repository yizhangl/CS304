<!DOCTYPE html>
<html>

<head>
    <title>Aggregation with group by</title>
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
        <h2>Character Stats</h2>
        <p>Press submit to view the number of characters in each skill level.</p>

        <form method="GET" action="aggregation_with_group_by.php">
            <input type="hidden" id="aggregationWithGroupByRequest" name="aggregationWithGroupByRequest">
            <input type="submit" id="submitButton" value="Submit" name="aggregationWithGroupBySubmit">
        </form>

        <?php

        require_once('request_handler.php');

        if (isset($_GET['aggregationWithGroupBySubmit'])) {
            handleGETRequest();
        }

        ?>
    </main>
</body>

</html>