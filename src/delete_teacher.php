<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teacherId = $_POST['teacherId'];

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

    // Prepare SQL statement to delete teacher
    $sql = "DELETE FROM teacher WHERE techer_id = '$teacherId'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to period.php after successful deletion
        header("Location: teacher.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
