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
    $period_id = $_POST['period_id'];
    $period_time = $_POST['period_time'];
    $period_name = $_POST['period_name'];
    $class_id = $_POST['class_id'];

    // Prepare the update statement
    $sql = "UPDATE period SET period_time = ?, period_name = ?, class_id = ? WHERE period_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssii", $period_time, $period_name, $class_id, $period_id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: period.php");
            exit();
        } else {
            echo "Error updating period: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
