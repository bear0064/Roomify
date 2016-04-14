<?php
session_start();
require_once("dbconnect.php");
header("Content-Type: application/json");

if(isset($_POST['userId'])){
    $sqlQuery = "SELECT * FROM users WHERE user_id = ".$_POST['userId'];
}
else if (!isset($_POST['userId'])){

    $sqlQuery = "SELECT * FROM users WHERE user_id = ".$_SESSION['user_id'];
}




$result = $conn->prepare($sqlQuery);
$result->execute(array());

$output = '{"code":0, "message":"All the records", "users":[';
//loop through records
$contests = array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $contests[] = '{"u_id":' .$row["user_id"]. ', "u_email":"'.$row["user_email"].'", "u_first":"'.$row["user_first"].'", "u_last":"'.$row["user_last"].'", "u_username":"'.$row["user_username"].'", "u_usertype":"' .$row["user_type"].'", "u_currentmode":"' .$row["current_mode"].'", "u_usercountry":"' .$row["user_country"].'", "u_photoURL":"' .$row["photoURL"].'"}';
}

$output .= implode(",", $contests);
$output .= ']}';


exit($output);
?>