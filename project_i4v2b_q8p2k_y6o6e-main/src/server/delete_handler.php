<?php
	require_once('executor.php');
	require_once('table_creator.php');

	/**
	 * Handles the request for delete
	 *
	 * @param       resource  $db_conn   connection identifier
	 */
	function handleDeleteRequest($db_conn) {
		$tuple = array (
			":bind1" => $_POST['character'],
		);

		$alltuples = array (
			$tuple
		);

		$query = "DELETE FROM Characters WHERE Name = :bind1";

		executeBoundSQL($query, $alltuples, $db_conn);
		OCICommit($db_conn);

 		$statement = executePlainSql("SELECT * FROM Characters", $db_conn);
		$cols = array ("Characters");
		createTable($statement, $cols);
	}
?>
