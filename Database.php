<?php

// Connection variables
$dbuser = 'final10';
$dbpassword = 'webTechFinal10';
$dbhost = '198.71.225.56:3306';
$charset = 'utf8mb4';
$dsn = 'mysql:host=198.71.225.56:3306;dbname=accounts;charset=utf8mb4;';

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