<?php
	require_once('executor.php');
	require_once('connector.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for insert
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleInsertRequest($db_conn) {
		$tournament_name = $_POST['name'];

		$tuple1 = array (
			":bind1" => $_POST['name'],
			":bind2" => $_POST['trophy']
		);

		$alltuples1 = array (
			$tuple1
		);

		$tuple2 = array (
			":bind1" => $_POST['name'],
		);

		$alltuples2 = array (
			$tuple2
		);

		$race_tuples = array();
		$races_to_add = $_POST['races'];
		foreach ($races_to_add as $race) {
			array_push($race_tuples, array (
				":bind1" => $tournament_name,
				":bind2" => $race
			));
		}

		$insert_tournaments_query = "INSERT INTO Tournaments VALUES (:bind1, :bind2)";
		$insert_races_query =  "INSERT INTO TournamentsIncludeRaces VALUES (:bind1, :bind2)";
		$select_tournaments_query = "SELECT * FROM Tournaments";
		$select_races_query = "SELECT * FROM TournamentsIncludeRaces WHERE TournamentName = (:bind1)";

		executeBoundSQL($insert_tournaments_query, $alltuples1, $db_conn);
		executeBoundSQL($insert_races_query, $race_tuples, $db_conn);
		
		$tournaments_statement = executePlainSQL($select_tournaments_query, $db_conn);
		$races_statement = executeBoundSQL($select_races_query, $alltuples2, $db_conn);
		
		createTable($tournaments_statement, array ("Tournament", "Trophy"));
		createTable($races_statement, array ("Tournament", "Race"));
		OCICommit($db_conn);
	}

	/**
	 * Creates a HTML checkbox of races
	 */
	function createCheckbox() {
		$query = "SELECT Name FROM Races";
		$db_conn = connectToDB();
		$statement = executePlainSQL($query, $db_conn);
		OCICommit($db_conn);
		while ($row = oci_fetch_array($statement, OCI_BOTH)) {
			echo "<input type=\"checkbox\" id=\"race\" name=\"races[]\" value=\"" . $row[0] . "\">";
			echo "<label for=\"race\">" . $row[0] .  "</label><br>";
		}
		disconnectFromDB($db_conn);
	}
?>