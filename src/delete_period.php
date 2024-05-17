<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $periodId = $_POST['periodId'];

    // Database connection parameters
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

    // Prepare SQL statement to delete period
    $sql = "DELETE FROM period WHERE period_id = '$periodId'";

    if ($conn->query($sql) === TRUE) {
        header("Location: period.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
