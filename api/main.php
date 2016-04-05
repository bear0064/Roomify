<?php
session_start();
require_once("dbconnect.php");
header("Content-Type: application/json");

//fetch records from DB

if (isset($_POST['sort'])){
    
    $sortBy = $_POST['sort'];
    
    if ($sortBy == 'Newest') {
        $sqlQuery = "SELECT * FROM `projects` WHERE `state` = 1 ORDER BY `created_date` DESC";
    } else if ($sortBy == 'Oldest') {
        $sqlQuery = "SELECT * FROM `projects` WHERE `state` = 1 ORDER BY `created_date`";
    } else if ($sortBy == 'Highest Prize') {
        $sqlQuery = "SELECT * FROM `projects` WHERE `state` = 1 ORDER BY `prize` DESC";
    } else if ($sortBy == 'Lowest Prize') {
        $sqlQuery = "SELECT * FROM `projects` WHERE `state` = 1 ORDER BY `prize`";
    }
 }



else if (isset($_POST['homeownersActive'])) {

    $sortBy = $_POST['homeownersActive'];

    $sqlQuery = "SELECT * FROM `projects` WHERE projects.creator_id = " .$_SESSION['user_id'] . " ORDER BY `created_date` DESC";
}


$result = $conn->query($sqlQuery);


$output = '{"code":0, "message":"All the records", "sortedBy":"'. $sortBy . '", "contests":[';
//loop through records
$contests = array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $contests[] = '{"c_id":' .$row["project_id"]. ', "c_name":"'.$row["project_title"].'", "c_prize":'. $row["prize"].', "c_date":"'.$row["created_date"].'", "cl_date":"'.$row["closing_date"].'", "c_desc":"' .$row["project_desc"].'"}';
}

$output .= implode(",", $contests);
$output .= ']}';

echo $output;
exit();
?>