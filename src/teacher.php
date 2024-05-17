

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>period</title>
  <style>
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
    }

    .left-side {
      width: 30%;
    }

    .right-side {
      width: 65%;
    }

    .details-table {
      width: 100%;
      border-collapse: collapse;
    }

    .details-table th,
    .details-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .details-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<!-- Left Side Buttons -->
<div class="left-side">
<a href="addTeacher.html"><button>Add Teacher</button></a>
<a href="deleteTeacher.html"><button>Delete Teacher</button></a>
<a href="updateTeacher.html"><button>Update Teacher</button></a>
<a href="index.php"><button>Home</button></a>
</div>

<!-- Right Side Details of the Table -->
<div class="right-side">
    <h2>Class Details</h2>
    <table class="details-table">
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Class ID</th>
                <th>Period ID</th>
                <th>Teacher Name</th>
                <th>Subject Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "class_allocation";
            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM teacher";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['techer_id'] . "</td>";
                    echo "<td>" . $row['class_id'] . "</td>";
                    echo "<td>" . $row['period_id'] . "</td>";
                    echo "<td>" . $row['techer_name'] . "</td>";
                    echo "<td>" . $row['subject_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
