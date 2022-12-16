<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
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
        <h1>Tuning shop</h1>

        <form method="POST" action="update.php">
            <input type="hidden" id="updateRequest" name="updateRequest">
            <?php
                require_once('update_handler.php');
                createOriginalTable();
            ?>
            
            <br>

            <p>Enter the make and model of the car to tune.</p>
            Make: <input type="text" name="make"><br><br>
            Model: <input type="text" name="model"><br><br>

            <p>Enter text for each of the attributes.</p>

            Colour: <input type="text" name="colour"><br><br>
            Speed: <input type="int" name="speed"><br><br>
            Handling: <input type="int" name="handling"><br><br>
            Acceleration: <input type="int" name="acceleration"><br><br><br>
            <input type="submit" id="submitButton" value="Update" name="updateSubmit">
        </form>

        <?php
            require_once('request_handler.php');

            if (isset($_POST['updateSubmit'])) {
                handlePOSTRequest();
            }
        ?>
    </main>
</body>

</html>