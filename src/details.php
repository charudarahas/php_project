

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details Page</title>
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
<a href="addClass.html"><button>Add Class</button></a>
<a href="deleteClass.html"><button>Delete Class</button></a>
<a href="updateClass.html"><button>Update Class</button></a>
<a href="index.php"><button>Home</button></a>
</div>

<!-- Right Side Details of the Table -->
<div class="right-side">
    <h2>Class Details</h2>
    <table class="details-table">
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Class Number</th>
                <th>Class Name</th>
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

            $sql = "SELECT * FROM class";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['class_id'] . "</td>";
                    echo "<td>" . $row['class_no'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
