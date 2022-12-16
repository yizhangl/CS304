<!-- 
	Citation: handlePostRequest taken from sample project on
	https://www.students.cs.ubc.ca/~cs-304/resources/php-oracle-resources/php-setup.html
 -->
<?php
    require_once('connector.php');
    require_once('insert_handler.php');
    require_once('join_handler.php');
    require_once('projection_handler.php');
    require_once('nested_aggregation_handler.php');
    require_once('aggregation_with_group_by_handler.php');
    require_once('update_handler.php');
    require_once('selection_handler.php');
    require_once('delete_handler.php');
    require_once('division_handler.php');
    require_once('aggregation_with_having_handler.php');

    /**
     * Routes POST requests to the appropriate handler
     */
    function handlePOSTRequest() {
        $db_conn = connectToDB();

        if (!$db_conn) {
            getErrorMessage();
        } else {
            if (array_key_exists('updateRequest', $_POST)) {
                handleUpdateRequest($db_conn);
            } else if (array_key_exists('insertRequest', $_POST)) {
                handleInsertRequest($db_conn);
            } else if (array_key_exists('deleteRequest', $_POST)) {
                handleDeleteRequest($db_conn);
            }

            disconnectFromDB($db_conn);
        }
    }

    /**
     * Routes GET requests to the appropriate handler
     */
    function handleGETRequest() {
        $db_conn = connectToDB();

        if (!$db_conn) {
            getErrorMessage();
        } else {
            if (array_key_exists('aggregationWithGroupByRequest', $_GET)) {
                handleAggregationWithGroupByRequest($db_conn);
            } else if (array_key_exists('aggregationWithHavingRequest', $_GET)) {
                handleAggregationWithHavingRequest($db_conn);
            } else if (array_key_exists('divisionRequest', $_GET)) {
                handleDivisionRequest($db_conn);
            } else if (array_key_exists('insertRequest', $_GET)) {
                handleInsertRequest($db_conn);
            } else if (array_key_exists('joinRequest', $_GET)) {
                handleJoinRequest($db_conn);
            } else if (array_key_exists('nestedAggregationRequest', $_GET)) {
                handleNestedAggregationRequest($db_conn);
            } else if (array_key_exists('projectionRequest', $_GET)) {
                handleProjectionRequest($db_conn);
            } else if (array_key_exists('selectionRequest', $_GET)) {
                handleSelectionRequest($db_conn);
            }

            disconnectFromDB($db_conn);
        }
    }

    /**
     * Prints an error message to the screen
     */
    function getErrorMessage() {
        echo '<script>alert("ERROR: Could not connect to the database")</script>';
    }
?>