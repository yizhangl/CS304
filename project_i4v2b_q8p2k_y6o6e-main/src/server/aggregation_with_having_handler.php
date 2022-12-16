<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for aggregation with having
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleAggregationWithHavingRequest($db_conn) {
		$tuple = array (
			":bind1" => $_GET['option'],
		);

		$alltuples = array (
			$tuple
		);

        $option = htmlspecialchars(reset($tuple));

		$query = "SELECT Class, MAX($option)
                    FROM CARS
                    GROUP BY Class
                    HAVING COUNT(*) > 1";

		$statement = executeBoundSQL($query, $alltuples, $db_conn);
		OCICommit($db_conn);

        $option_str = $_GET['option'];
		$cols = array ("Class", $option_str);
		createTable($statement, $cols);
	}
?>