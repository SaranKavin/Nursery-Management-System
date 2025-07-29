<?php
session_start(); // Start the session
$products = array();
if(isset($_SESSION["products"])){ // If session for products exists
$products = $_SESSION["products"]; // Get the products array from the session
}

if(isset($_POST["submit"])){ //
    // Check if product name already exists in the products array
if(array_key_exists($productname, $products)){
    // If product name exists, add the quantity to the existing quantity
    $products[$productname] += $quantity;
    }else{
    // If product name does not exist, create a new key-value pair for it
    $products[$productname] = $quantity;
    }
    
    // Update the session with the new products array
    $_SESSION["products"] = $products;
    }