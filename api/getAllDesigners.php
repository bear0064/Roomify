<?php
session_start();
require_once("dbconnect.php");
header("Content-Type: application/json");

//fetch records from DB
if (isset($_POST['getAllDesigners'])) {

    $sortBy = $_SESSION['user_id'];
    // use $_SESSION['user_id']
    $sqlQuery = "SELECT * FROM users WHERE current_mode = 'homeowner'";

}


$result = $conn->query($sqlQuery);


$output = '{"code":0, "message":"All the records", "user":"'. $sortBy . '", "users":[';
//loop through records
$contests = array();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $contests[] = '{"u_id":' .$row["user_id"]. ', "u_email":"'.$row["user_email"].'", "u_first":"'.$row["user_first"].'", "u_last":"'.$row["user_last"].'", "u_username":"'.$row["user_username"].'", "u_usertype":"' .$row["user_type"].'", "u_currentmode":"' .$row["current_mode"].'", "u_usercountry":"' .$row["user_country"].'", "u_photoURL":"' .$row["photoURL"].'"}';
}

$output .= implode(",", $contests);
$output .= ']}';


exit($output);
?>