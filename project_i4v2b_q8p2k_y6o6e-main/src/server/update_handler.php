<?php
	require_once('executor.php');
	require_once('connector.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for update
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleUpdateRequest($db_conn) {
		$tuple = array (
			":bind1" => $_POST['make'],
			":bind2" => $_POST['model'],
            ":bind3" => $_POST['colour'],
            ":bind4" => $_POST['speed'],
            ":bind5" => $_POST['handling'],
            ":bind6" => $_POST['acceleration'],
		);

		$alltuples = array (
			$tuple
		);

        $update_query = "UPDATE Cars
            SET Colour = :bind3, Speed = :bind4, Handling = :bind5, Acceleration = :bind6
            WHERE make = :bind1 AND model = :bind2";
		
		$select_query = "SELECT * FROM Cars WHERE make = :bind1 AND model = :bind2";

		executeBoundSQL($update_query, $alltuples, $db_conn);
		$statement = executeBoundSQL($select_query, $alltuples, $db_conn);
		
		createTable($statement, array ("Make", "Model", "Colour", "Class", "Speed", "Handling", "Acceleration", "Character"));
		OCICommit($db_conn);
	}

	function createOriginalTable() {
		$query = "SELECT * FROM Cars";
		$db_conn = connectToDB();
		$statement = executePlainSQL($query, $db_conn);
        createTable($statement, array("Make", "Model", "Colour", "Class", "Speed", "Handling", "Acceleration", "Character"));
		OCICommit($db_conn);
		disconnectFromDB($db_conn);
	}
