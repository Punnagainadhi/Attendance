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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST['table_name']; // Get table name from user
    $total = $_POST['roll'];           // Total students
    $present = $_POST['present'];      // Present students
    $absent = $total - $present;       // Calculate absent students
    $percentage=($total/100)*$present;
    $date = date('Y-m-d');             // Today's date

    // Sanitize table name to prevent SQL injection
    $table_name = preg_replace('/[^a-zA-Z0-9_]/', '', $table_name);

    // Check if the table exists
    $check_table = "SHOW TABLES LIKE '$table_name'";
    $result = $conn->query($check_table);

    if ($result->num_rows == 1) {
        // Insert the record into the specified table
        $sql = "INSERT INTO  $table_name(Roll, present, absent, Percentage,Date) 
        VALUES ('$total', '$present', '$absent','$percentage', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "Attendance record saved successfully in table '$table_name'.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Table '$table_name' does not exist.";
    }
}

// Close the connection
$conn->close();
?>
<html>
    <a href="attendance_display.php">display</a>
</html>