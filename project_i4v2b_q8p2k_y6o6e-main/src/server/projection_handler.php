<?php
	require_once('executor.php');
	require_once('table_creator.php');
	
	/**
	 * Handles the request for projection
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleProjectionRequest($db_conn) {
		$cols = array_merge(array('Make', 'Model'), $_GET['carAttribute']);
		$query = "SELECT " . implode(",", $cols) . " FROM CARS";
		$statement = executePlainSQL($query, $db_conn);
		OCICommit($db_conn);
		createTable($statement, $cols);
	}
?>