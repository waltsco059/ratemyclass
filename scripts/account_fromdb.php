<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Final Project">
    <meta name="author" content="Group">
    <title>Rate My Class</title>
    <link href="../../style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/class_form.js" defer></script>
    <script src="scripts/class_load.js" defer></script>
    <script src="scripts/search_filter.js"></script>
</head>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('db_connect.php');

$username = $_COOKIE['logged_in'];

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

$command = "SELECT uid FROM users WHERE username = '$username'";
$results = $mysqli->query($command);
$row = $results->fetch_assoc();
$uid = $row['uid'];

$command = "SELECT * FROM rates WHERE uid = '$uid' ORDER BY rid DESC";
$results = $mysqli->query($command);

while($row = $results->fetch_assoc()){
	$cid = $row['cid'];
	$command = "SELECT * FROM class WHERE cid = '$cid'";
	$resultsx = $mysqli->query($command);
	
	while($rowx = $resultsx->fetch_assoc()){
		$cname = $rowx['cname'];
		$pname = $rowx['pname'];
		$semester_db = $rowx['semester'];
		$college_db = $rowx['college'];
		$crating = $row['crating'];
		$prating =  $row['prating'];
		$difficulty_db = $row['difficulty'];
	
		$semester = $semester_list["$semester_db"];
		$college = $college_list["$college_db"];
		$difficulty = $difficulty_list["$difficulty_db"];

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
        			<a href="../scripts/class_rate.php?cname=${cname}&professor=${pname}&semester=${semester}&college=${college}&crating=${crating}&prating=${prating}&difficulty=${difficulty}">Update Rating!</a>
			</div>
			
			<div class="rate-button" id="class-delete" style="background-color: #d30a0a;">
        			<a href="../scripts/class_delete.php?cname=${cname}&professor=${pname}&semester=${semester}&college=${college}&crating=${crating}&prating=${prating}&difficulty=${difficulty}">Delete Rating!</a>
			</div>

	</div>
CONTENT;
};
};

$mysqli->close();
?>
</body>
</html>
