<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for join
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleJoinRequest($db_conn) {
		$tuple = array (
			":bind1" => $_GET['location'],
		);

		$alltuples = array (
			$tuple
		);

		$query = "SELECT RT.LocationName, RTHR.RaceName, RT.Name FROM RaceTracks RT, RaceTracksHostRaces RTHR WHERE RT.Name = RTHR.RaceTrackName AND RT.LocationName = :bind1";

		$statement = executeBoundSQL($query, $alltuples, $db_conn);
		OCICommit($db_conn);

		$cols = array ("Location", "Race", "Race Track");
		createTable($statement, $cols);
	}
?>