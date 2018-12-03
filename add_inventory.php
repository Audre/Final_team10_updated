<?php


if(isset($_REQUEST)){
    include_once("Database.php");

    $productID = $_POST["data"];
    $quantity = $_POST["data2"];
    echo "ProductID: " . $productID;
    echo "\n Quantity: " . $quantity;

    $query = "UPDATE products SET ". $quantity . " WHERE " . $productID;
    if ($conn->query($query) === TRUE) {
    }
}
?>