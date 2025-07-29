<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "saran"; // Replace with your database name

// Create connection
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
            $sql = "INSERT INTO plants (name, price_per_kg, total_quantity, image_path)
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

// Check if product ID is provided
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Delete the product from the database
    $sql = "DELETE FROM plants WHERE id = $productId";

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

// Fetch plants from the database
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

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Product Store</h1>
        <div class="row" id="productContainer">
            <!-- Product cards will be displayed here -->
        </div>
    </div>

    <script>
        // Fetch and display products from the database
        fetch("plants_fetch_products.php")
            .then(response => response.json())
            .then(products => {
                const productContainer = document.getElementById("productContainer");

                products.forEach(product => {
                    const productCard = document.createElement("div");
                    productCard.classList.add("col-md-4");

                    productCard.innerHTML = `
                        <div class="card mb-4 shadow-sm">
                            <img src="${product.image_path}" class="card-img-top" alt="${product.name}">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">Price: ₹${product.price_per_kg}</p>
                                <p class="card-text">Available Quantity: ${product.total_quantity} kg</p>
                                <button class="btn btn-primary mr-2" onclick="buyProduct(${product.id}, '${product.name}')">Buy</button>
                                <button class="btn btn-danger" onclick="deleteProduct(${product.id}, '${product.name}')">Delete</button>
                            </div>
                        </div>
                    `;

                    productContainer.appendChild(productCard);
                });
            })
            .catch(error => console.error('Error fetching products:', error));

        // Function to handle product purchase
        function buyProduct(productId, productName) {
            // Send a request to the server to handle the purchase
            fetch(`plants_purchase_product.php?id=${productId}`)
                .then(response => {
                    if (response.ok) {
                        alert(`You have purchased ${productName}`);
                        location.reload(); // Reload the page to reflect the updated quantity
                    } else {
                        alert(`Failed to purchase ${productName}`);
                    }
                })
                .catch(error => console.error('Error purchasing product:', error));
        }

        // Function to handle product deletion
        function deleteProduct(productId, productName) {
            if (confirm(`Are you sure you want to delete ${productName}?`)) {
                // Send a request to the server to delete the product
                fetch(`plants_delete_product.php?id=${productId}`)
                    .then(response => {
                        if (response.ok) {
                            alert(`${productName} has been deleted successfully`);
                            location.reload(); // Reload the page to reflect the deletion
                        } else {
                            alert(`Failed to delete ${productName}`);
                        }
                    })
                    .catch(error => console.error('Error deleting product:', error));
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
