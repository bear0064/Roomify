<?php
require_once("dbconnect.php");
//fetch records from DB

if (isset($_POST['id'])){
    $getMe = $_POST['id'];
    $sqlQuery = "SELECT * FROM projects WHERE `project_id` = $getMe";
    $result = $conn->query($sqlQuery);

    $output = '{"code":0, "message":"Got Project", "ID":"'. $getMe . '", "contestDetails":[';
//loop through records
    $contests = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $contests[] = '{"c_id":' .$row["project_id"]. ', "c_name":"'.$row["project_title"].'", "c_prize":'. $row["prize"].', "c_date":"'.$row["created_date"].'", "cl_date":"'.$row["closing_date"].'", "c_desc":"' .$row["project_desc"].'"}';
    }

    $output .= implode(",", $contests);
    $output .= ']}';
    echo $output;
    exit();

}

?>