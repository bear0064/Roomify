<?php

//1. Change $dbhost's value to the web hosts url.
//2. Change $dbname's value to the database name
//   in the PHP My Admin page (default is 'ten23mb')
//3. Change the $dbuser and $dbpass value to the
//   login credentials provided by web host

$dbhost = 'localhost';
$dbname = 'ten23mb';
//$dbuser = 'root';
$dbuser = 'ten23mb';
//$dbpass = 'root';
$dbpass = 'RaumView';


try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
 catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
