<!DOCTYPE html>
<html lang="en">
<head>
  <title>Database Table Display</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Class Allocation</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <style>
    /* General table styling */
    /* General table styling */
#database-table {
  border-collapse: collapse;
  width: 100%;
  margin: 20px 0;
  font-size: 1em;
  font-family: 'Poppins', sans-serif;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

/* Table caption styling */
#database-table caption {
  caption-side: top;
  font-size: 1.5em;
  margin: 10px 0;
  font-weight: bold;
}

/* Table header styling */
#database-table thead tr {
  background-color: #007BFF; /* Change to blue */
  color: #ffffff;
  text-align: left;
}

/* Table cell styling */
#database-table th, #database-table td {
  padding: 12px 15px;
  border: 1px solid #dddddd;
}

/* Alternate row styling */
#database-table tbody tr:nth-child(even) {
  background-color: #f3f3f3;
}

/* Hover effect for rows */
#database-table tbody tr:hover {
  background-color: #f1f1f1;
  cursor: pointer;
}

/* Responsive table */
@media screen and (max-width: 600px) {
  #database-table thead {
    display: none;
  }

  #database-table, #database-table tbody, #database-table tr, #database-table td {
    display: block;
    width: 100%;
  }

  #database-table tr {
    margin-bottom: 15px;
  }

  #database-table td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }

  #database-table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding-left: 15px;
    font-weight: bold;
    text-align: left;
  }
}

/* Button styling */
.btn-primary {
  background-color: #009879;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 20px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #007f5f;
  color: white;
}

  </style>
</head>
<body>
<!-- Container to center the table -->
<div class="container">
  
  <!-- Table Display from Database -->
  <table id="database-table">
    <caption><strong>Timetable</strong></caption>
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
              echo "<td data-label='Class Number'>" . $row['class_no'] . "</td>";
              echo "<td data-label='Class Name'>" . $row['class_name'] . "</td>";
              echo "<td data-label='Period Time'>" . $row['period_time'] . "</td>";
              echo "<td data-label='Period Name'>" . $row['period_name'] . "</td>";
              echo "<td data-label='Teacher Name'>" . $row['techer_name'] . "</td>";
              echo "<td data-label='Subject Name'>" . $row['subject_name'] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No data found</td></tr>";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
  <!-- Button to redirect to homepage -->
  <a href='index.php'><button class="btn btn-primary mt-3">Go to Homepage</button></a>
</div>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>

<script>
  // Acc
  $(document).on("click", ".naccs .menu div", function() {
    var numberIndex = $(this).index();

    if (!$(this).is("active")) {
      $(".naccs .menu div").removeClass("active");
      $(".naccs ul li").removeClass("active");

      $(this).addClass("active");
      $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

      var listItemHeight = $(".naccs ul")
        .find("li:eq(" + numberIndex + ")")
        .innerHeight();
      $(".naccs ul").height(listItemHeight + "px");
    }
  });
</script>
</body>
</html>
