<?php
require_once('executor.php');
require_once('table_creator.php');

/**
 * Handles the request for selection
 *
 * @param       resource  $db_conn   connection identifier
 */
function handleSelectionRequest($db_conn)
{
    $query = "SELECT DISTINCT " .$_GET['attribute']. " FROM " .$_GET['table']. " WHERE " .$_GET['condition'];

    $statement = executePlainSQL($query, $db_conn);
    OCICommit($db_conn);

    $cols = array($_GET['attribute']);
    createTable($statement, $cols);
}
