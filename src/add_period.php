<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $classId = $_POST['classId'];
    $periodTime = $_POST['periodTime'];
    $periodName = $_POST['periodName'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "class_allocation";
    
    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert new period
    $sql = "INSERT INTO period (class_id, period_time, period_name) VALUES ('$classId', '$periodTime', '$periodName')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to details.php if insertion is successful
        header("Location: period.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
