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
        fetch("trees_fetch_products.php")
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
                                <p class="card-text">Total Quantity Sold: ${product.total_quantity_sold} kg</p>
                                <p class="card-text">Total Revenue: ₹${product.total_revenue}</p>
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
            fetch(`trees_purchase_product.php?id=${productId}`)
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
                fetch(`trees_delete_product.php?id=${productId}`)
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
