<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for aggregation with group by
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleAggregationWithGroupByRequest($db_conn) {
		$tuple = array (
		);

		$alltuples = array (
			$tuple
		);

		$query = "SELECT SkillLevel, COUNT(*)
                FROM Characters
                GROUP BY SkillLevel";

		$statement = executeBoundSQL($query, $alltuples, $db_conn);
		OCICommit($db_conn);

		$cols = array ("Skill Level", "Count");
		createTable($statement, $cols);
	}

