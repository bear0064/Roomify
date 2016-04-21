<?php
session_start();
require_once("dbconnect.php");


if (isset($_POST['accountType'])) {

    $sqlQuery = "UPDATE users SET current_mode = ? WHERE user_email = 'guest@roomify.ca';";

    $results = $conn->prepare($sqlQuery);
    $results->execute(array($_POST['accountType']));

    $_SESSION["current_mode"] = $_POST['accountType'];

    exit(json_encode($_SESSION["current_mode"]));
}

?>