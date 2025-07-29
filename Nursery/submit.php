<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "saran"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO enquiries (name, address, email, phone, enquiry) VALUES (?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("sssss", $name, $address, $email, $phone, $enquiry);

    // Set parameters and execute
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $enquiry = $_POST['enquiry'];

    if ($stmt->execute() === TRUE) {
        echo '<script>alert("Thank you for reaching out! Your message is important to us, and we will respond promptly."); location.replace(document.referrer);</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>