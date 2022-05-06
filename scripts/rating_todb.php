<?php
include('db_connect.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$college_list = array(
    "Natural Sciences" => "ns",
    "Liberal Arts" => "la",
    "Engineering" => "en",
    "Business" => "bu",
    "Education" => "ed",
    "Communication"=> "co",
    "Fine Arts" => "fa",
    "Law" => "lw",
    "Undergraduate"=> "un"
);


$semester_list = array(
    "Spring 2022" => "s22",
    "Fall 2021" => "f21",
    "Spring 2021" => "s21",
    "Fall 2020" => "f20"
);

// Acquire relevant information

$username = $_COOKIE["logged_in"];

$prating = $_POST["user-prating"];
$crating = $_POST["user-crating"];
$difficulty = $_POST["user-difficulty"];
$cname = $_GET["cname"];
$pname = $_GET["pname"];
$college_db = $_GET["college"];
$semester_db = $_GET["semester"];

$college = $college_list["$college_db"];
$semester = $semester_list["$semester_db"];

$command = "SELECT uid FROM users WHERE username='$username'";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}

$row = $result->fetch_row();

$uid = $row[0];



$command = "SELECT cid FROM class WHERE cname='$cname' AND pname='$pname' AND college='$college' AND semester='$semester'";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}

$row = $result->fetch_row();

$cid = $row[0];

// Chech if the user has already rated this class
$command = "SELECT rid FROM rates WHERE cid = '$cid' AND uid = '$uid'";
$result = $mysqli->query($command);

# If the result is not empty, then UPDATE rather than INSERT
if(($row = $result->fetch_assoc())) {
	$rid = $row['rid'];
	$command = "UPDATE rates SET cid = '$cid', uid = '$uid', prating = '$prating', crating = '$crating', difficulty = '$difficulty' WHERE rid = '$rid'";
	$result = $mysqli->query($command);
}

else {

	// Create the query as a string
	$command = "INSERT INTO rates (cid, uid, prating, crating, difficulty) VALUES ('$cid', '$uid', '$prating', '$crating', '$difficulty')";

	// Issue the query
	$result = $mysqli->query($command);
	// Verify the result
	if (!$result) {
    		echo ("Query failed: ($mysqli->error <br> SQL command = $command");
	}
};

$command = "update class c
inner join (
  select cid, avg(prating) avgprating
  from rates
  group by cid
) t on t.cid = c.cid
set prating=t.avgprating ";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}

$command = "update class c
inner join (
  select cid, avg(crating) avgcrating
  from rates
  group by cid
) t on t.cid = c.cid
set crating=t.avgcrating ";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}


$command = "update class c
inner join (
  select cid, avg(difficulty) avgdifficulty
  from rates
  group by cid
) t on t.cid = c.cid
set difficulty=t.avgdifficulty ";

// Issue the query
$result = $mysqli->query($command);
// Verify the result
if (!$result) {
    echo ("Query failed: ($mysqli->error <br> SQL command = $command");
}



$mysqli->close();

header('Location: ../index.php');


?>