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
    $class_id = $_POST['class_id'];
    $class_no = $_POST['class_no'];
    $class_name = $_POST['class_name'];

    // Prepare the update statement
    $sql = "UPDATE class SET class_no = ?, class_name = ? WHERE class_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("isi", $class_no, $class_name, $class_id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: details.php");
            exit();
        } else {
            echo "Error updating class: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
