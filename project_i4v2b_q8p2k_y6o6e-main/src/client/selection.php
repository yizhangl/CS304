<!DOCTYPE html>
<html>
    <head>
        <title>Selection</title>
        <meta charset="utf-8"/>
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
            <h1>Search</h1>
            <p>Select the category you to search in.</p>

            <form method="GET" action="selection.php">
                <input type="hidden" id="selectionRequest" name="selectionRequest">

                <select id="dropdownList" name="table">
                    <option value="Characters">Characters</option>
                    <option value="Cars">Cars</option>
                    <option value="SpecialAbilities">Special Abilities</option>
                    <option value="Tournaments">Tournaments</option>
                    <option value="Races">Races</option>
                </select>
                
                <br><br><hr><br>
                
                <p>Here are the attributes of the categories you can choose.
                    The chosen attribute should belong to the chosen category.</p><br>
                
                <p>Cars - Make: string, Model: string, Colour: string, Class: string,
                    Speed: int, Handling: int, Acceleration: int, CharacterName: string</p>
                <p>Characters - Name: string, Number: int, SkillLevel: string</p>
                <p>SpecialAbilities - Name: string, Effect: string, CharacterName: string</p>
                <p>Tournaments - Name: string, Trophy: string</p>
                <p>Races - Name: string, Difficulty: string</p>

                <br>

                <p style="font-weight:bold">Enter the name of attribute you want to see.</p>
                <p>For example: enter the attribute Make if you choose the category Cars.</p>
                Attribute: <input type="text" name="attribute">
                
                <br><br><hr><br>

                <p style="font-weight:bold">Enter the conditions for the chosen category.</p>
                <p>For example: enter "Speed > 5" if you choose the category Cars.</p>
                <p>Multiple conditions can be entered using AND.
                For example: enter "Speed > 5 AND Colour = 'White'".</p>

                Condition: <input type="text" name="condition">
                
                <br><br><br>
                
                <input type="submit" id="submitButton" value="Submit" name="selectionSubmit">
            </form>

            <?php
                require_once('request_handler.php');

                if (isset($_GET['selectionSubmit'])) {
                    handleGETRequest();
                }
            ?>
        </main>
    </body>
</html>