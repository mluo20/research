<?php
/*CONSTANTS*/

session_start();

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "research");

const DATA = array("id", "kid", "oid", "evalue", "percentcoverage", "proteinname", "location1", "location2");
const DOMAINS = array("id", "kid", "name", "location1", "location2", "description");
const KINASES = array("id", "name", "description", "sequence");
const ORGANISMS = array("id", "kingdom", "name", "description");
const AMINO_ACIDS = array("id", "did", "sequence");

/*FUNCTIONS*/

function connect() {

	$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

	if ($conn->connect_error) die("There was a problem. Please contact Miranda or Larry to fix this problem. Here is the error message: Connect error: " . $conn->connect_error);
	
	return $conn;

}

function insert($table, $tablevals, $values) {

	$tablevalsstring = "";
	$typestring = "";
	$questionmarks = "";

	unset($tablevals[0]);
	$unsetvals = $tablevals;
	$newvals = array();
	for ($i = 1; $i <= count($unsetvals); $i++) {
		$newvals[] = $unsetvals[$i];
	}

	$tablevals = $newvals;

	// $tablevals = $newvals;
	// echo count($tablevals);

	for ($i = 0; $i < count($tablevals); $i++) { 
		$tablevalsstring .= $tablevals[$i] . ", ";
		$questionmarks .= "?, ";
	}

	foreach ($values as $key => $value) {
		if (gettype($value) == "string") $typestring .= "s";
		else if (gettype($value) == "integer") $typestring .= "i";
		else if (gettype($value) == "double") $typestring .= "d";
		else $typestring .= "b";
		$value = preg_replace("/\r\n|\r|\n/",'<br>',$value);
	}

	// echo count($values);

	$tablevalsstring = substr($tablevalsstring, 0, strlen($tablevalsstring) - 2);
	$questionmarks = substr($questionmarks, 0, strlen($questionmarks) - 2);

	$type = &$typestring;

	$params = arraytoref($values);

	$conn = connect();
	$sql = "INSERT INTO $table ($tablevalsstring) VALUES ($questionmarks)";
	$stmt = $conn->prepare($sql);
	if (!$stmt) {echo "Error, ask Miranda or Larry for help: <br> $sql <br>" . $conn->error; return false;}

	call_user_func_array(array($stmt, "bind_param"), array_merge(array($type), $params));
	$stmt->execute();
	$stmt->close();

	return true;

}

function select($table, $tablevals, $options = "") {

	$tablevalsstring = "";

	// if (gettype($tablevals) == "array") {
		for ($i = 0; $i < count($tablevals); $i++) { 
			$tablevalsstring .= $tablevals[$i] . ", ";
		}
	// }

	$tablevalsstring = substr($tablevalsstring, 0, strlen($tablevalsstring) - 2);

	$conn = connect();
	$query = "SELECT $tablevalsstring FROM $table $options";
	$result = $conn->query($query);

	if (!$result) {
		echo "Error, ask Miranda or Larry for help: <br> $query <br>" . $conn->error;
	}

	$rows = $result->num_rows;

	$data = array();

	for ($i=0; $i < $rows; $i++) { 
		$result->data_seek($i);
		$data[] = $result->fetch_array(MYSQLI_ASSOC);
	}

	return $data;

}

function update($table, $tablevals, $newvals, $location) {

	$updatestring = "";

	$newvals = assoctonum($newvals);

	if (gettype($tablevals) == "array") {
		for ($i = 0; $i < count($tablevals); $i++) { 
			if (gettype($newvals[$i]) == "string") $newvals[$i] = "\"".$newvals[$i]."\"";
			$updatestring .= $tablevals[$i] . " = " . $newvals[$i] . ", ";
		}
	}
	else {
		if (gettype($newvals) == "string") $newvals = "\"$newvals\"";
		$updatestring = "$tablevals = $newvals";
	}

	$updatestring = substr($updatestring, 0, strlen($updatestring) - 2);

	$conn = connect();
	$query = "UPDATE $table SET $updatestring WHERE $location";

	$result = $conn->query($query);

	if (!$result) {
		echo "Error, ask Miranda or Larry for help: <br> $query <br>" . $conn->error;
	}

}

function delete($table, $location) {

	$conn = connect();
	$query = "DELETE FROM $table WHERE $location";
	$result = $conn->query($query);

	if (!$result) {
		echo "Error, ask Miranda or Larry for help: <br> $query <br>" . $conn->error;
	}

}

/*INCLUDES*/
require_once 'php/functions.php';
require_once 'php/Classes.php';
?>
