<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bills by Date Range</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Existing styles */
        .button-container {
            text-align: center;
            margin-top: 20p;
        }
        
        .button-container .btn {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
        }
        .navbar-light .navbar-brand {
            color: #fff;
        }
        .photo-container {
            text-align: center;
            position: relative;
        }
        .photo-container img {
            max-width: 100%;
            max-height: 100%;
        }
        .bar {
            width: 100%;
            height: 2px;
            background-color: #333;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        /* Navigation bar styles */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 10px;
            margin-bottom: 20px; /* Adjusted margin to avoid overlap */
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }
        .navbar a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#" style="font-size: 25px; color: red;">Admin Dashboard</a>
        <a class="nav-link" href="purchaseadmin.html">Purchase History</a>
        <a class="nav-link" href="feedbackfrom.php">Feedbacks</a>
        <a href="submitadmin.php">Enquiry</a>
        <a href="add_product_admin.html">add product</a>
        <a href="sales_report_admin.html">Sales Report</a>
        <a href="updatequantityadmin.html">Update</a>
        <a href="generate_reports.php" style="font-size: 25px;">View Bill Id</a>
        <a href="view_bill.html">View Bill</a>
        <a href="logout.php" style="position: fixed; top: 20px; right: 20px;">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav><br><br><br><br>
    <h2>View Bills by Date Range</h2>
    <form method="GET" action="show_bills.php">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <button type="submit">Filter</button>
    </form>

    <?php
    // show_bills.php

    // Establish database connection
    $mysqli = new mysqli("localhost", "root", "", "agriculture");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve bills within the specified date range if provided
    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
        $startDate = $_GET['start_date'];
        $endDate = $_GET['end_date'];

        // Retrieve bills within the specified date range
        $sql = "SELECT bill_id, total_amount, created_at FROM bills WHERE created_at BETWEEN '$startDate' AND '$endDate'";
        $result = $mysqli->query($sql);

        $totalBillValue = 0; // Initialize total bill value variable

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Bill ID: " . $row["bill_id"]. " - Date: " . $row["created_at"] . " - Total Purchase Amount: ₹" . $row["total_amount"]. "<br>";
                $totalBillValue += $row["total_amount"]; // Add each bill's total amount to the total bill value
            }
            // Output total bill value
            echo "Total Bill Value: ₹" . $totalBillValue . "<br>";
        } else {
            echo "No results found for the selected date range.";
        }
    }

    // Close connection
    $mysqli->close();
    ?>
</body>
</html>
