<?php
// save_cart.php

// Assuming you're using PHP to handle the server-side operations

// Establish database connection
$mysqli = new mysqli("localhost", "root", "", "saran");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve cart items from the request
$cartItems = json_decode(file_get_contents('php://input'), true);

// Insert bill details
$totalAmount = 0;
foreach ($cartItems as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}
$sql = "INSERT INTO bills (total_amount) VALUES ($totalAmount)";
if ($mysqli->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Get the bill ID of the inserted bill
$billId = $mysqli->insert_id;

// Insert bill items
foreach ($cartItems as $item) {
    $productName = $item['name'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $totalPrice = $price * $quantity;
    $sql = "INSERT INTO bill_items (bill_id, product_name, price, quantity, total_price) VALUES ($billId, '$productName', $price, $quantity, $totalPrice)";
    if ($mysqli->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Close connection
$mysqli->close();
?>
