<?php
session_start();
require_once("dbconnect.php");
header("Content-Type: application/json");

//fetch records from DB
if (isset($_POST['getAll'])) {

    $sortBy = $_POST['getAll'];

    $sqlQuery = "SELECT u.user_id, u.user_username, pr.project_id, pr.created_date, pr.closing_date, pr.prize, pr.project_desc, pr.project_title, pr.state, prr.room_id, prr.room_name, prr.room_type, prp.prop_id, prp.comment_extra_details, prp.feature_name, prf.caption, prf.filename, prf.filetype, prf.file_id, prf.public_name FROM projects AS pr INNER JOIN users as u ON pr.creator_id = u.user_id INNER JOIN project_rooms as prr ON prr.project_id = pr.project_id INNER JOIN project_properties as prp ON prp.room_id = prr.room_id INNER JOIN project_files as prf ON prf.room_id = prp.room_id WHERE state = 1 ORDER BY `created_date` DESC";
}

$result = $conn->query($sqlQuery);


$output = '{"code":0, "message":"All the records", "sortedBy":"'. $sortBy . '", "contests":[';
//loop through records
$contests = array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $contests[] = '{"c_user_id":' .$row["user_id"]. ', "c_username":"'.$row["user_username"].'", "c_project_id":'. $row["project_id"].', "c_created_date":"'.$row["created_date"].'", "c_closing_date":"'.$row["closing_date"].'", "c_prize":"' .$row["prize"].'" , "c_project_desc":"' .$row["project_desc"].'" , "c_project_title":"' .$row["project_title"].'", "c_room_id":"' .$row["room_id"].'", "c_room_name":"' .$row["room_name"].'", "c_room_type":"' .$row["room_type"].'" , "c_prop_id":"' .$row["prop_id"].'", "c_comment_extra_details":"' .$row["comment_extra_details"].'", "c_feature_name":"' .$row["feature_name"].'", "c_caption":"' .$row["caption"].'" , "c_filename":"' .$row["filename"].'"  , "c_filetype":"' .$row["filetype"].'" , "c_file_id":"' .$row["file_id"].'" , "c_public_name":"' .$row["public_name"].'"  }';
}

$output .= implode(",", $contests);
$output .= ']}';

echo $output;
exit();
?>