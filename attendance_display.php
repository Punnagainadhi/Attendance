<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aasha"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST['table_name']; // Get table name from user
    $date = date('Y-m-d');             // Today's date

    // Sanitize table name to prevent SQL injection
    $table_name = preg_replace('/[^a-zA-Z0-9_]/', '', $table_name);

    // Check if the table exists
    $check_table = "SHOW TABLES LIKE '$table_name'";
    $result = $conn->query($check_table);

    if ($result->num_rows == 1) {
        // Fetch today's attendance from the specified table
        $sql = "SELECT * FROM $table_name";
        $result = $conn->query($sql);

        echo "<h1>Attendance Records from Table '$table_name'</h1>";
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Total Students</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Date</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Roll']}</td>
                        <td>{$row['present']}</td>
                        <td>{$row['absent']}</td>
                        <td>{$row['Date']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No attendance records found for $date in table '$table_name'.";
        }
    } else {
        echo "Error: Table '$table_name' does not exist.";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Attendance</title>
</head>
<body>
    <center>
    <h1>Display Attendance Records</h1>
    <form action="attendance_display.php" method="POST">
        <label for="table_name">Department:</label>
        <input type="text" id="table_name" name="table_name" placeholder="Enter Department" required>
        <br><br>
        <button type="submit">View Records</button>
    </form>
</center>
</body>
</html>
