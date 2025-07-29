<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Bills</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .bill-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .bill-info {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            padding-top: 20px;
        }
        .bill-info div {
            margin-bottom: 10px;
        }
        .total-bill {
            font-weight: bold;
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="bill-container">
        <h1>Show Bills</h1>
        <div class="bill-info">
        <?php
// show_bills.php

// Establish database connection
$mysqli = new mysqli("localhost", "root", "", "saran");

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

        </div>
    </div>
</body>
</html>
