<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "class_allocation";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $subject_name = $_POST['subject_name'];
    $period_id = $_POST['period_id'];

    // Prepare the update statement
    $sql = "UPDATE teacher SET techer_name = ?, subject_name = ?, period_id = ? WHERE techer_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssii", $teacher_name, $subject_name, $period_id, $teacher_id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: teacher.php");
            exit();
        } else {
            echo "Error updating teacher: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
