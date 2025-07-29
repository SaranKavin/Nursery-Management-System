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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    
    // Check if a file was uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES["image"]["name"];
        $image_temp = $_FILES["image"]["tmp_name"];
        
        // Move uploaded image to the desired directory
        $target_dir = "uploads/"; // Create a directory named "uploads" in your project
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
        }
        
        $target_file = $target_dir . basename($image);
        if (move_uploaded_file($image_temp, $target_file)) {
            // Insert data into database
            $sql = "INSERT INTO trees (name, price_per_kg, total_quantity, image_path)
                    VALUES ('$name', '$price', '$quantity', '$target_file')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Product added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded.";
    }
}

$conn->close();
?>
