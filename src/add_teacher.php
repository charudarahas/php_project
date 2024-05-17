<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teacherName = $_POST['teacherName'];
    $subjectName = $_POST['subjectName'];
    $periodId = $_POST['periodId'];
    $classId = $_POST['classId'];

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

    // Prepare SQL statement to insert new teacher
    $sql = "INSERT INTO teacher (techer_name, subject_name, period_id, class_id) VALUES ('$teacherName', '$subjectName', '$periodId', '$classId')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to teacher.php if insertion is successful
        header("Location: teacher.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
