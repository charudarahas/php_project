<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Table Display</title>
  <style>
    /* Add grid to the table */
    #database-table {
      border-collapse: collapse;
      width: 100%;
    }

    /* Add border and padding to table cells */
    #database-table th, #database-table td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    /* Add background color to alternate rows for better readability */
    #database-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    /* Highlight header row */
    #database-table th {
      background-color: #dddddd;
    }

    .form-container {
      margin: 20px 0;
    }
  </style>
</head>
<body>

<!-- Top Navigation Buttons -->
<div class="top-navigation">
  <a href="details.php"><button>Class</button></a>
  <a href="period.php"><button>Period</button></a>
  <a href="teacher.php"><button>Teacher</button></a>
  <a href="index.php"><button>Home</button></a>
</div>

<div class="container">
  <!-- Form to input class number -->
  <div class="form-container">
    <form action="get_time_table.php" method="POST">
      <label for="class_no">Enter Class Number:</label>
      <input type="number" id="class_no" name="class_no" required>
      <button type="submit">Get TimeTable</button>
    </form>
  </div>

  <!-- Table Display from Database -->
  <table id="database-table">
    <thead>
      <tr>
        <th>Class Number</th>
        <th>Class Name</th>
        <th>Period Time</th>
        <th>Period Name</th>
        <th>Teacher Name</th>
        <th>Subject Name</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['class_no'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "class_allocation";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $class_no = $_POST['class_no'];

        $sql = "SELECT class.class_no, class.class_name, period.period_time, period.period_name, teacher.techer_name, teacher.subject_name 
                FROM class
                INNER JOIN period ON class.class_id = period.class_id
                INNER JOIN teacher ON period.period_id = teacher.period_id
                WHERE class.class_no = ?";
                
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $class_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['class_no']) . "</td>";
            echo "<td>" . htmlspecialchars($row['class_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['period_time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['period_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['techer_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No data found for class number " . htmlspecialchars($class_no) . "</td></tr>";
        }

        $stmt->close();
        $conn->close();
      } else {
        echo "<tr><td colspan='6'>Please enter a class number and submit the form to see the timetable.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
