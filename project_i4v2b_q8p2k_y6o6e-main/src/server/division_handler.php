<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for division
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleDivisionRequest($db_conn) {
		$query = "SELECT C.Name FROM Characters C WHERE NOT EXISTS 
				(SELECT T.Name FROM Tournaments T MINUS SELECT CT.TournamentName
				FROM CharactersInTournaments CT
				WHERE CT.CharacterName = C.Name)";

		$statement = executePlainSQL($query, $db_conn);
		
		OCICommit($db_conn);

		$cols = array ("Characters");
		createTable($statement, $cols);
	}
?>