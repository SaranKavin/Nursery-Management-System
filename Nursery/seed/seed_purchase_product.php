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

    // Fetch product details
    $sql_fetch_product = "SELECT price_per_kg FROM products WHERE id = $productId";
    $result_fetch_product = $conn->query($sql_fetch_product);

    if ($result_fetch_product->num_rows > 0) {
        $row = $result_fetch_product->fetch_assoc();
        $pricePerKg = $row["price_per_kg"];

        // Calculate total price
        $totalPrice = $pricePerKg;

        // Check if the product quantity is greater than 0
        $sql_check_quantity = "SELECT total_quantity FROM products WHERE id = $productId";
        $result_check_quantity = $conn->query($sql_check_quantity);

        if ($result_check_quantity->num_rows > 0) {
            $row = $result_check_quantity->fetch_assoc();
            $quantity = $row["total_quantity"];

            if ($quantity > 0) {
                // Decrease the product quantity by 1
                $sql_update_quantity = "UPDATE products SET total_quantity = total_quantity - 1, 
                    total_quantity_sold = total_quantity_sold + 1, total_revenue = total_revenue + $totalPrice 
                    WHERE id = $productId";

                if ($conn->query($sql_update_quantity) === TRUE) {
                    // Return success response
                    http_response_code(200);
                    echo "Product purchased successfully";
                } else {
                    // Return error response
                    http_response_code(500);
                    echo "Error purchasing product: " . $conn->error;
                }
            } else {
                // Return error response if the product quantity is already 0
                http_response_code(400);
                echo "Product quantity is already 0";
            }
        } else {
            // Return error response if the product ID is not found
            http_response_code(404);
            echo "Product not found";
        }
    } else {
        // Return error response if the product ID is not found
        http_response_code(404);
        echo "Product not found";
    }
} else {
    // Return error response if product ID is not provided
    http_response_code(400);
    echo "Product ID is required";
}

// Close the database connection
$conn->close();
?>
