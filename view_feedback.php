<?php
// Step 1: Establish database connection
$conn = new mysqli("localhost", "root", "", "campaign_feedback");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve data from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

// Step 3: Display retrieved data in an HTML table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Feedback Data</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["feedback"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["submission_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No feedback data available.";
    }

    // Step 4: Close connection
    $conn->close();
    ?>
</body>
</html>
