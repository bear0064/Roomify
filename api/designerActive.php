<?php
session_start();
require_once("dbconnect.php");
header("Content-Type: application/json");

//fetch records from DB
if (isset($_POST['designersActive'])) {

    $sortBy = $_POST['designersActive'];
    $user_id = $_SESSION['user_id'];
// use $_SESSION['user_id']

    $sqlQuery = "SELECT prs.user_id, prs.project_id, pr.closing_date, pr.created_date, pr.creator_id, pr.prize, pr.project_desc, pr.project_id, pr.project_title, pr.state FROM project_submissions AS prs INNER JOIN projects as pr ON prs.project_id = pr.project_id WHERE prs.user_id = $user_id AND pr.state = 1";

}


if (isset($_POST['sortActive'])){

    $sortBy = $_POST['sortActive'];
    $user_id = $_SESSION['user_id'];
    
    if ($sortBy == 'Newest') {
        $sqlQuery = "SELECT prs.user_id, prs.project_id, pr.closing_date, pr.created_date, pr.creator_id, pr.prize, pr.project_desc, pr.project_id, pr.project_title, pr.state FROM project_submissions AS prs INNER JOIN projects as pr ON prs.project_id = pr.project_id WHERE prs.user_id = $user_id AND pr.state = 1 ORDER BY `created_date` DESC";
    } else if ($sortBy == 'Oldest') {
        $sqlQuery = "SELECT prs.user_id, prs.project_id, pr.closing_date, pr.created_date, pr.creator_id, pr.prize, pr.project_desc, pr.project_id, pr.project_title, pr.state FROM project_submissions AS prs INNER JOIN projects as pr ON prs.project_id = pr.project_id WHERE prs.user_id = $user_id AND pr.state = 1 ORDER BY `created_date`";
    } else if ($sortBy == 'Highest Prize') {
        $sqlQuery = "SELECT prs.user_id, prs.project_id, pr.closing_date, pr.created_date, pr.creator_id, pr.prize, pr.project_desc, pr.project_id, pr.project_title, pr.state FROM project_submissions AS prs INNER JOIN projects as pr ON prs.project_id = pr.project_id WHERE prs.user_id = $user_id AND pr.state = 1 ORDER BY `prize` DESC";
    } else if ($sortBy == 'Lowest Prize') {
        $sqlQuery = "SELECT prs.user_id, prs.project_id, pr.closing_date, pr.created_date, pr.creator_id, pr.prize, pr.project_desc, pr.project_id, pr.project_title, pr.state FROM project_submissions AS prs INNER JOIN projects as pr ON prs.project_id = pr.project_id WHERE prs.user_id = $user_id AND pr.state = 1 ORDER BY `prize`";
    }
}

$result = $conn->query($sqlQuery);


$output = '{"code":0, "message":"All the records", "Active Designer":"'. $sortBy . '", "projects":[';
//loop through records
$contests = array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){

    $contests[] = '{"u_project_id":' .$row["project_id"]. ', "u_closing_date":"'.$row["closing_date"].'", "u_prize":"'.$row["prize"].'" , "u_project_desc":"'.$row["project_desc"].'", "u_project_title":"'.$row["project_title"].'" }';
}

$output .= implode(",", $contests);
$output .= ']}';

echo $output;
exit();
?>




