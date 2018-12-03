<?php

// Connection variables
$dbuser = 'root';
$dbpassword = '';
$dbhost = 'localhost';
$charset = 'utf8mb4';
$dsn = 'mysql:host=localhost;dbname=accounts;charset=utf8mb4;';

try {
//    $pdo = new PDO($dsn, $dbuser, $dbpassword);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // connect to the server and create the database
    $conn = new PDO($dsn, $dbuser, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "CREATE DATABASE IF NOT EXISTS accounts";
//    $conn->exec($sql);


} catch (PDOException $exception) {
    die($exception->getMessage());
}

?>