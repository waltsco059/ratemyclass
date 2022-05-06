<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('db_connect.php');

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


# get incoming info
$cname = $_GET["cname"];
$professor = $_GET["professor"];
$semester_db = $_GET["semester"];
$college_db = $_GET["college"];

$semester = $semester_list["$semester_db"];
$college = $college_list["$college_db"];


$username = $_COOKIE['logged_in'];

$command = "SELECT cid FROM class WHERE cname = '$cname' AND pname = '$professor' AND semester = '$semester' AND college = '$college'";
$result = $mysqli->query($command);
$row = $result->fetch_assoc();
$cid = $row['cid'];

$command = "SELECT uid FROM users WHERE username = '$username'";
$result = $mysqli->query($command);
$row = $result->fetch_assoc();
$uid = $row['uid'];

$command = "DELETE FROM rates WHERE cid = '$cid' AND uid = '$uid'";
$result = $mysqli->query($command);

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

// Return to Account
header('Location: ../account/account.php');
?>
