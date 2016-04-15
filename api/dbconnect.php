<?php
$dbhost = 'localhost';
$dbname = 'ten23mb';
//$dbuser = 'root';
//$dbpass = 'root';
$dbuser = 'ten23mb';
$dbpass = 'RaumView';

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
 catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
