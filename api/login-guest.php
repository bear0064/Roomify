<?php
session_start();
require_once("dbconnect.php");


if (isset($_POST['guestLogin'])) {

    $sqlQuery = "SELECT * FROM users WHERE user_email = 'guest@roomify.ca'";

    $results = $conn->prepare($sqlQuery);
    $results->execute();
    $results2 = $results->fetchAll(PDO::FETCH_OBJ);

    if (!empty($results2)) {

        $_SESSION["user_type"] = $results2[0]->user_type;
        $_SESSION["user_id"] = $results2[0]->user_id;
        $_SESSION["current_mode"] = $results2[0]->current_mode;
        $_SESSION["user_pic"] = $results2[0]->photoURL;

        if ($_SESSION["current_mode"] == 'homeowner') {

            exit(json_encode('homeowner'));

        } else {

            exit(json_encode('designer'));

        }
    }

}

?>