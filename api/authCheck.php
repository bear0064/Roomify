<?php
if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_token'])){
    header ("Location: ./index.php");
    exit; //important, stop further executing
}
