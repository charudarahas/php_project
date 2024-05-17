<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $classNo = $_POST['classNo'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "class_allocation";
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to delete class
    $sql = "DELETE FROM class WHERE class_no = '$classNo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: details.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
