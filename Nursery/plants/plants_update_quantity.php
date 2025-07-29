<?php
// Establish database connection (replace these details with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saran";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$id = $_POST['id'];
$new_quantity = $_POST['quantity'];

// Update total quantity in the database
$sql = "UPDATE plants SET total_quantity = $new_quantity WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Total quantity updated successfully.";
} else {
    echo "Error updating total quantity: " . $conn->error;
}

// Close database connection
$conn->close();
?>
