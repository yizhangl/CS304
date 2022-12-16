<!DOCTYPE html>
<html>
    <head>
        <title>Delete</title>
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
            <h2>Character Deletion</h2>
            <p>Select a character from the list below to delete it.</p>

            <form method="POST" action="delete.php"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteRequest" name="deleteRequest">
                <select id="dropdownList" name="character">
                    <option value = "Aloy"> Aloy</option>
                    <option value = "Cloud Strife"> Cloud Strife</option>
                    <option value = "Crash Bandicoot"> Crash Bandicoot</option>
                    <option value = "Isabelle"> Isabelle</option>
                    <option value = "Mario"> Mario</option>
                    <option value = "Master Chief"> Master Chief</option>
                    <option value = "Princess Zelda"> Princess Zelda</option>
                    <option value = "Solid Snake"> Solid Snake</option>
                    <option value = "Sonic the Hedgehog"> Sonic the Hedgehog</option>
                <input style="margin-left:10px" type="submit" id="submitButton" value="Delete" name="deleteSubmit">
            </form>

            <?php
                require_once('request_handler.php');

                 if (isset($_POST['deleteSubmit'])) {
                    handlePOSTRequest();
                 }
            ?>
        </main>
    </body>
</html> 