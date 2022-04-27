<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

$command = "SELECT * FROM class";
$results = $mysqli->query($command);

while($row = $results->fetch_assoc()){
	$cname = $row['cname'];
	$pname = $row['pname'];
	$semester_db = $row['semester'];
	$college_db = $row['college'];
	$crating = $row['crating'];
	$prating =  $row['prating'];
	$difficulty = $row['difficulty'];
	
	$semester = $semester_list["$semester_db"];
	$college = $college_list["$college_db"];
	echo <<<CONTENT
	<div class="content-piece">
		<div class="info">
        		<table>
            			<tr>
                			<td>Class:</td>
                			<td>${cname}</td>
            			</tr>
            			<tr>
                			<td>Name:</td>
                			<td>${pname}</td>
            			</tr>
            			<tr>
                			<td>Semester:</td>
                			<td>${semester}</td>
            			</tr>
            			<tr>
                			<td>College:</td>
                			<td>${college}</td>
            			</tr>
        		</table>
    		</div>

    		<!-- Main Content Piece Class Rating -->
    		<div class="class-rating">
        		<h1>Class Rating:</h1>
        		<p>${crating}</p>
    		</div>
    		<!-- Main Content Piece Professor Rating -->
    		<div class="professor-rating">
        		<h1>Professor Rating:</h1>
        		<p>${prating}</p>
		</div>

		<div class="difficulty">
			<h1>Difficulty:</h1>
			<p>${difficulty}</p>
		</div>

    		<!-- Main Content Piece Rate Button -->
    		<div class="rate-button">
        		<a href="scripts/class_rate.php?cname=${cname}&professor=${pname}&semester=${semester}&college=${college}&crating=${crating}&prating=${prating}&difficulty=${difficulty}">Rate this Class!</a>
		</div>
	</div>
CONTENT;
};
$mysqli->close();
?>
