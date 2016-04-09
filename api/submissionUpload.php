<?php
session_start();

//contestUpload.php
//TODO add session - set all user ids to that
require_once ("dbconnect.php");

header("Content-Type: application/json");

$proj_id = $_POST['projID'];
$sub_desc = $_POST['desc'];
$sub_budget = $_POST['budget'];
$sub_file = json_decode($_POST['file'], true);
$user_id = $_SESSION['user_id'];


$sqlQuery = 'INSERT INTO `project_submissions`(`project_id`, `user_id`, `submission_text`, `budget`) VALUES ('.$proj_id.','.$user_id.',"'.$sub_desc.'",'.$sub_budget.')';

$stmt = $conn->prepare($sqlQuery);
$stmt->execute();

$sqlQuery2 = 'SELECT max(submission_id) FROM `project_submissions` WHERE user_id = '.$user_id;

$stmt2 = $conn->prepare($sqlQuery2);
$stmt2->execute();
$result = $stmt2->fetch(PDO::FETCH_NUM);
$sub_id = $result[0];

$sqlQuery3 = 'INSERT INTO `submission_files`(`submission_id`, `filename`, `filetype`, `filesize`, `public_name`) VALUES ('.$sub_id.',"'.$sub_file["name"].'","'.$sub_file["type"].'",'.$sub_file["size"].',"'.$sub_file["originalName"].'")';
$stmt3 = $conn->prepare($sqlQuery3);
$stmt3->execute();


echo '{"code":"0", "message": "New submission created successfully"}';

?>