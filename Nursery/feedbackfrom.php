<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Table</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Use Arial font or fallback to sans-serif */
            }
        /* CSS styles for the navigation bar */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
        }
        .navbar a:hover {
            background-color: #555;
        }

        /* CSS styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px; /* Adjusted margin to accommodate the navbar */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#" style="font-size: 25px; color: red;">Admin Dashboard</a>
            <a class="nav-link" href="purchaseadmin.html">Purchase History</a>
            <a class="nav-link" href="feedbackfrom.php" style="font-size: 25px;">Feedbacks</a>
            <a href="submitadmin.php">Enquiry</a>
            <a href="add_product_admin.html">add product</a>
            <a href="sales_report_admin.html">Sales report</a>
            <a href="updatequantityadmin.html">Update</a>
            <a href="generate_reports.php">View Bill Id</a>
            <a href="view_bill.html">View Bill</a>
            <a href="logout.php" style="position: fixed; top: 20px; right: 20px;">Logout</a>
           
        </nav>
    </div><br><br>  

    <?php
    require 'config.php';

    // Retrieve feedback data from the database
    $query = mysqli_query($con, "SELECT * FROM `feedback`");
    $feedbackData = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <table>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Feedback</th>
            <th>Date</th> <!-- Include Date column -->
            <th>Time</th> <!-- Include Time column -->
        </tr>
        <?php 
        $serial = 1; // Initialize serial number counter
        foreach ($feedbackData as $feedback) : ?>
            <tr>
                 <td><?= $serial++ ?></td> <!-- Display serial number and increment counter -->
            <td><?= $feedback['name'] ?></td>
            <td><?= $feedback['email'] ?></td>
            <td><?= $feedback['phone'] ?></td>
            <td><?= $feedback['feedback'] ?></td>
            <td><?= date('Y-m-d', strtotime($feedback['datetime'])) ?></td> <!-- Display date -->
            <td><?= date('H:i:s', strtotime($feedback['datetime'])) ?></td> <!-- Display time -->
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
