<!-- 
	Citation: functions taken from sample project on
	https://www.students.cs.ubc.ca/~cs-304/resources/php-oracle-resources/php-setup.html
 -->
<?php
    require_once('config.php');

    $show_debug_alert_messages = False; // Set to True for debugging

    /**
     * Connects to the database using the credentials specified in config.php
     */
    function connectToDB() {
        $config = getConfig();
        $db_conn = OCILogon($config['db_username'], $config['db_password'], $config['db_host']);

        if ($db_conn) {
            debugAlertMessage("Database is Connected");
            return $db_conn;
        } else {
            debugAlertMessage("Cannot connect to Database");
            $e = OCI_Error(); // For OCILogon errors pass no handle
            echo htmlentities($e['message']);
            return false;
        }
    }

    /**
     * Disconnects from the database
     */
    function disconnectFromDB($db_conn) {
        debugAlertMessage("Disconnect from Database");
        OCILogoff($db_conn);
    }

    /**
     * Prints a debug alert message to the screen
     */
    function debugAlertMessage($message) {
        global $show_debug_alert_messages;

        if ($show_debug_alert_messages) {
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
    }
?>