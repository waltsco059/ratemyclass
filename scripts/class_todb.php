<?php
include('db_connect.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$college_list = array(
    "ns" => "Natural Sciences",
    "la" => "Liberal Arts",
    "en" => "Engineering",
    "bu" => "Business"
);

$semester_list = array(
    "s22" => "Spring 2022",
    "f21" => "Fall 2021", 
    "s21" => "Spring 2021",
    "f20" => "Fall 2020"
);

$class = filter_var($_POST["add-class"], FILTER_SANITIZE_STRING);
$professor = filter_var($_POST["add-professor"], FILTER_SANITIZE_STRING);
$college_db = filter_var($_POST["add-college"], FILTER_SANITIZE_STRING);
$semester_db = filter_var($_POST["add-semester"], FILTER_SANITIZE_STRING);

$semester = $semester_list["$semester_db"];
$college = $college_list["$college_db"];

// Create the query as a string
$command = "INSERT INTO class (cname, pname, semester, college, prating, crating, difficulty) VALUES ('$class', '$professor', '$semester_db', '$college_db', 0, 0, 0)";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}

$mysqli->close();

header('Location: https://spring-2022.cs.utexas.edu/cs329e-bulko/waltsco/test_phase/index.php');
?>
