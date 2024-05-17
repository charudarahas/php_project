<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $classNo = $_POST['classNo'];
    $className = $_POST['className'];

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

    // Prepare SQL statement to insert new class
    $sql = "INSERT INTO class (class_no, class_name) VALUES ('$classNo', '$className')";

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
