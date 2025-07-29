<?php

// Database connection

$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "seed"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product ID is provided
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE id = $productId";

    if ($conn->query($sql) === TRUE) {
        // Return success response
        http_response_code(200);
        echo "Product deleted successfully";
    } else {
        // Return error response
        http_response_code(500);
        echo "Error deleting product: " . $conn->error;
    }
} else {
    // Return error response if product ID is not provided
    http_response_code(400);
    echo "Product ID is required";
}

// Close the database connection
$conn->close();
?>
