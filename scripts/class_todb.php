<?php
include('db_connect.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$college_list = array(
    "ns" => "Natural Sciences",
    "la" => "Liberal Arts",
    "en" => "Engineering",
    "bu" => "Business",
    "ed" => "Education",
    "co" => "Communication",
    "fa" => "Fine Arts",
    "lw" => "Law",
    "un" => "Undergraduate"
);

$semester_list = array(
    "s22" => "Spring 2022",
    "f21" => "Fall 2021", 
    "s21" => "Spring 2021",
    "f20" => "Fall 2020"
);

$difficulty_list = array(
    0 => "N/A",
    1 => "Easy",
    2 => "Medium",
    3 => "Hard"
);

$class = filter_var($_POST["add-class"], FILTER_SANITIZE_STRING);
$professor = filter_var($_POST["add-professor"], FILTER_SANITIZE_STRING);
$college_db = filter_var($_POST["add-college"], FILTER_SANITIZE_STRING);
$semester_db = filter_var($_POST["add-semester"], FILTER_SANITIZE_STRING);

$semester = $semester_list["$semester_db"];
$college = $college_list["$college_db"];


$command = "SELECT * FROM class WHERE cname = '$class' AND pname = '$professor' AND semester = '$semester_db' AND college = '$college_db'";
$result = $mysqli->query($command);

if(($row = $result->fetch_assoc())) {
	$cname = $row['cname'];
	$pname = $row['pname'];
	$semester_db = $row['semester'];
	$college_db = $row['college'];
	$crating = $row['crating'];
	$prating =  $row['prating'];
	$difficulty_db = $row['difficulty'];
	
	$semester = $semester_list["$semester_db"];
	$college = $college_list["$college_db"];
	$difficulty = $difficulty_list["$difficulty_db"];
	
	header("Location: class_rate.php?cname=${cname}&professor=${pname}&semester=${semester}&college=${college}&crating=${crating}&prating=${prating}&difficulty=${difficulty}");

	$mysqli->close();
}

else {

	// Create the query as a string
	$command = "INSERT INTO class (cname, pname, semester, college, prating, crating, difficulty) VALUES ('$class', '$professor', '$semester_db', '$college_db', 0, 0, 0)";

	// Issue the query
	$result = $mysqli->query($command);
	// Verify the result
	if (!$result) {
    		echo ("Query failed: ($mysqli->error <br> SQL command = $command");
	}


	$mysqli->close();
	
	header('Location: ../index.php');
}
?>
