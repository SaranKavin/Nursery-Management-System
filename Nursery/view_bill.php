<?php
// Function to convert number to words
function numberToWords($number) {
    // Array of units
    $units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    // Array of tens
    $tens = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    // Array of teens
    $teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

    // Array of thousands
    $thousands = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion'];

    if ($number == 0) {
        return 'Zero';
    }

    $output = '';

    // Loop through thousands chunks
    for ($i = 0; $number > 0; $i++) {
        $chunk = $number % 1000;
        if ($chunk != 0) {
            $chunkOutput = '';

            // Add words for hundreds place
            if ($chunk >= 100) {
                $chunkOutput .= $units[floor($chunk / 100)] . ' hundred ';
                $chunk %= 100;
            }

            // Add words for tens and units place
            if ($chunk >= 20) {
                $chunkOutput .= $tens[floor($chunk / 10)] . ' ';
                $chunk %= 10;
            } elseif ($chunk >= 10) {
                $chunkOutput .= $teens[$chunk - 10];
                $chunk = 0;
            }

            // Add words for units place
            if ($chunk > 0) {
                $chunkOutput .= $units[$chunk];
            }

            // Add thousands chunk label
            $output = $chunkOutput . $thousands[$i] . ' ' . $output;
        }
        $number = floor($number / 1000);
    }

    return $output;
}

// Establish database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your database password here
$dbname = "saran";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve bill ID from GET parameters
if(isset($_GET['billId'])) {
    $billId = $_GET['billId'];

    // Retrieve bill details
    $sql = "SELECT * FROM bills WHERE bill_id = $billId";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        // Output bill details
        $row = $result->fetch_assoc();

        // Company details
        $companyName = "E-GROWTH SOLUTION";
        $address = "NO:187 RAMKRIBHA COMPLEX,9 TH MAIN ROAD,RAM NAGAR MADIPAKKAM,CHENNAI:600091";
        $phoneNumber = "9342114973";
        $email = "egrowthsolution123@gmail.com";
       

        // Company logo
        $logoPath = "clogo.png"; // Adjust the path to your logo image

        // Initialize total value for the bill
        $totalValue = 0;

        // Output company details and logo
        echo "<div>";
        echo "<img src='$logoPath' alt='Company Logo' style='max-width: 200px; height: auto;'>";
        echo "<h2>$companyName</h2>";
        echo "<p>Address: $address</p>";
        echo "<p>Phone Number: $phoneNumber</p>";
        echo "<p>Email: $email</p>";
        echo "</div>";
        
        echo "<hr>"; // Add a horizontal line to separate company details from bill details

        // Output bill details
        echo "<h2>Bill ID: " . $row["bill_id"] . "</h2>";

        // Retrieve purchased items associated with the bill
        $sql = "SELECT * FROM bill_items WHERE bill_id = $billId";
        $result_items = $mysqli->query($sql);

        if ($result_items->num_rows > 0) {
            // Output purchased items in a table
            echo "<table border='1'>";
            echo "<tr><th>Product Name</th><th>Price per kg</th><th>Quantity</th><th>Total Price</th></tr>";
            while($row_items = $result_items->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_items["product_name"] . "</td>";
                echo "<td>₹" . $row_items["price"] . "</td>";
                echo "<td>" . $row_items["quantity"] . "</td>";
                echo "<td>₹" . $row_items["total_price"] . "</td>";
                echo "</tr>";
                // Add each item's total price to the total value for the bill
                $totalValue += $row_items["total_price"];
            }
            echo "</table>";
            
            // Output total value for the bill
            echo "<p>Total Value for the Bill: ₹" . $totalValue . " (" . numberToWords($totalValue) . " rupees only)</p>";
            
            // Signature
            echo "<p>Signature: _______________</p>";
            
            // Add print button
            echo '<button onclick="window.print()">Print</button>';
        } else {
            echo "No purchased items found for this bill.";
        }
    } else {
        echo "Bill not found.";
    }
} else {
    echo "Bill ID not provided.";
}

// Close connection
$mysqli->close();
?>
