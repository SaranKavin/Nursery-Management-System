<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries Data</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Use Arial font or fallback to sans-serif */
            }
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
 <!-- Adjusted font size -->
        <a  href="purchaseadmin.html">Purchase History</a>
        <a   href="feedbackfrom.php">Feedbacks</a>
        <a href="submitadmin.php"  style="font-size: 25px;">Enquery</a>
        <a href="add_product_admin.html">add product</a>
            <a href="sales_report_admin.html">Sales report</a>
            <a href="updatequantityadmin.html">Update</a>
            <a href="generate_reports.php">View Bill Id</a>
            <a href="view_bill.html">View Bill</a>
            <a href="logout.php" style="position: fixed; top: 20px; right: 20px;">Logout</a>
        <a href="logout.php" style="position: fixed; top: 20px; right: 20px;">Logout</a>
    </nav>
</div>
    <h2>Enquiries Data</h2>
    <table>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Enquiry</th>
            <th>Date & Time</th> <!-- Added column for Date & Time -->
        </tr>
        <?php
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

        // Retrieve data from the enquiries table
        $sql = "SELECT name, address, email, phone, enquiry, datetime FROM enquiries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            $serial = 1; // Initialize serial number
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serial . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["enquiry"] . "</td>";
                echo "<td>" . $row["datetime"] . "</td>"; // Display date & time
                echo "</tr>";
                $serial++; // Increment serial number
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>
</body>
</html>
