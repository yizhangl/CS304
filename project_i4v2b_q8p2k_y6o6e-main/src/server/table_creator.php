<!-- 
	Citation: table CSS learned from
	https://www.w3schools.com/css/css_table.asp
 -->
<style>
	table {
		border-collapse: collapse;
		margin-top: 35px;
		margin-bottom: 10px;
		table-layout: fixed;
		width: 100%;
	}
	td, th {
		border: 1px solid grey;
		padding: 10px;
	}
	th {
		background-color: black;
		color: white;
		text-align: left;
		font-weight: bold;
	}
	tr:hover {
		background-color: lightskyblue;
	}
</style>
<?php
	/**
	 * Creates a dynamic table
	 *
	 * @param       resource  $result   statment from oci_parse
	 * @param       array     $cols     array of column names
	 */
	function createTable($result, $cols) {
		// do not create table if result is invalid
		if (!$result) {
			return;
		}

		$ncols = count($cols);

		echo "<table>";

		// create headers
		echo "<tr>";
		for ($i = 0; $i < $ncols; $i++) {
			echo "<th>" . $cols[$i] . "</th>"; 
		}
		echo "</tr>";
		// create rows
		while ($row = oci_fetch_array($result, OCI_BOTH)) {
			echo "<tr>";
			for ($i = 0; $i < $ncols; $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "</tr>";
		}

		echo "</table>";
	}
?>