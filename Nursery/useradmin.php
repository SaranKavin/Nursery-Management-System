<?php
// Include database connection file
include_once "db_conn.php";

// Fetch data from the database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

// Initialize an empty array to store data
$data = array();

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and add them to the data array
    while ($row = mysqli_fetch_assoc($result)) {
        // Decrypt the password
        $decryptedPassword = decryptPassword($row['password']); // Implement this function based on your encryption method
        
        // Add decrypted password to the row data
        $row['password'] = $decryptedPassword;
        
        // Add the row data to the data array
        $data[] = $row;
    }
}

// Close database connection
mysqli_close($conn);

// Function to decrypt the password (Implement based on your encryption method)
function decryptPassword($encryptedPassword) {
    // Implement decryption logic here
    return $encryptedPassword; // Placeholder, replace with actual decryption logic
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Display</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display data in table rows
            $serial = 1;
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $serial . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>"; // Display decrypted password
                echo "</tr>";
                $serial++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
