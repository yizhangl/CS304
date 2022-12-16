<!-- 
	Citation: functions taken from sample project on
	https://www.students.cs.ubc.ca/~cs-304/resources/php-oracle-resources/php-setup.html
 -->
<?php
    /**
     * Executes a plain (no bound variables) SQL command
     */
    function executePlainSQL($cmdstr, $db_conn) {
        $statement = OCIParse($db_conn, $cmdstr);

        if (!$statement) {
            alertError("Cannot parse the following command: " . $cmdstr);
            $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
            alertError(htmlentities($e['message']));
        }

        $result = OCIExecute($statement, OCI_DEFAULT);
        if (!$result) {
            alertError("Cannot execute the following command: " . $cmdstr);
            $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
            alertError(htmlentities($e['message']));
        }

        if (!$statement || !$result) {
            return false;
        } else {
            return $statement;
        }
    }

    /**
     * Executes SQL command containing bound variables
     */
    function executeBoundSQL($cmdstr, $list, $db_conn) {
        $statement = OCIParse($db_conn, $cmdstr);

        if (!$statement) {
            alertError("Cannot parse the following command: " . $cmdstr);
            $e = OCI_Error($db_conn);
            alertError(htmlentities($e['message']));
        }

        foreach ($list as $tuple) {
            foreach ($tuple as $bind => $val) {
                OCIBindByName($statement, $bind, $val);
                unset ($val); // DO NOT REMOVE THIS. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
            }

            $result = OCIExecute($statement, OCI_DEFAULT);
            if (!$result) {
                alertError("Cannot execute the following command: " . $cmdstr);
                $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                alertError(htmlentities($e['message']));
            }
        }

        if (!$statement || !$result) {
            return false;
        } else {
            return $statement;
        }
    }

    /**
     * Prints an alert message to the screen
     */
    function alertError($message) {
        echo "<script type='text/javascript'>alert('" . $message . "');</script>";
    }
?>