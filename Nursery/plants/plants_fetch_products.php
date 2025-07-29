<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "saran"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM plants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = array();
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo "0 results";
}

$conn->close();
?>
