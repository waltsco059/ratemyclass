<?php

// Optionally store the parameters in variables
$server = "spring-2022.cs.utexas.edu";
$user = "cs329e_bulko_waltsco";
$pwd = "Sheer6roman5dull";
$dbName = "cs329e_bulko_waltsco";
$mysqli = new mysqli ($server,$user,$pwd,$dbName);
// If it returns a non-zero error number, print a
// message and stop execution immediately
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
}

?>
