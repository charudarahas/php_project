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
  </style>
</head>
<body>

<!-- Top Navigation Buttons -->
<div class="top-navigation">
  <a href="details.php"><button>Class</button></a>
  <a href="period.php"><button>Period</button></a>
  <a href="teacher.php"><button>Teacher</button></a>
</div>
  

<!-- Container to center the table -->
<div class="container">
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
      // PHP code to fetch data from the database and populate the table
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "class_allocation";
      $conn = new mysqli($servername, $username, $password, $database);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT class.class_no, class.class_name, period.period_time, period.period_name, teacher.techer_name, teacher.subject_name FROM class
              INNER JOIN period ON class.class_id = period.class_id
              INNER JOIN teacher ON period.period_id = teacher.period_id";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['class_no'] . "</td>";
              echo "<td>" . $row['class_name'] . "</td>";
              echo "<td>" . $row['period_time'] . "</td>";
              echo "<td>" . $row['period_name'] . "</td>";
              echo "<td>" . $row['techer_name'] . "</td>";
              echo "<td>" . $row['subject_name'] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No data found</td></tr>";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
