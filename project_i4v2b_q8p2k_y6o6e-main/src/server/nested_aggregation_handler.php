<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for nested aggregation with group by
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleNestedAggregationRequest($db_conn) {
		$tuple = array (
			":bind1" => $_GET['numRaces'],
		);

		$alltuples = array (
			$tuple
		);

		$query = "SELECT P2.Type, ROUND(AVG(P1.Duration),2) as average
			FROM PowerUps_1 P1, PowerUps_2 P2
			WHERE P1.Effect = P2.Effect AND :bind1 <= ( SELECT COUNT(*)
													    FROM RacesHavePowerUps R
													    WHERE R.PowerUpName = P1.Name)
			GROUP BY P2.Type";

		$statement = executeBoundSQL($query, $alltuples, $db_conn);
		OCICommit($db_conn);

		$cols = array ("Type", "Average Duration [s]");
		createTable($statement, $cols);
	}
?>