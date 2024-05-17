<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <title>Database Table Display</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px 20px;
    }

    .header-area {
      width: 100%;
    }

    .right-side {
      width: 80%;
      margin-top: 20px;
    }

    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      font-size: 1em;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .details-table thead {
      background-color: #007BFF;
      color: #ffffff;
    }

    .details-table th,
    .details-table td {
      border: 1px solid #ddd;
      padding: 12px 15px;
      text-align: left;
    }

    .details-table tbody tr:nth-child(even) {
      background-color: #f3f3f3;
    }

    .details-table tbody tr:hover {
      background-color: #f1f1f1;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #007BFF;
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
      background-color: #0056b3;
      color: white;
    }
    /* Style for form container */
.form-container {
  margin-bottom: 20px;
}

/* Style for label */
.form-container label {
  display: block;
  margin-bottom: 10px;
}

/* Style for input field */
.form-container input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
  margin-bottom: 10px;
}

/* Style for submit button */
.form-container button[type="submit"] {
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.form-container button[type="submit"]:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.html" class="logo">
            <img src="assets/images/logo.png">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
            <li class="scroll-to-section"><a href="details.php">Class</a></li>
            <li class="scroll-to-section"><a href="period.php">Period</a></li>
            <li class="scroll-to-section"><a href="teacher.php">Facutly</a></li>
            <li class="scroll-to-section"><a href="#faculty"></a></li>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>
<div id="top">
<div id="pricing" class="pricing-tables">
    <div class="tables-left-dec">
      <img src="assets/images/tables-left-dec.png" alt="">
    </div>
    <div class="tables-right-dec">
      <img src="assets/images/tables-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          </div>
        </div>
      </div>
<!-- Top Navigation Buttons -->

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
  <div class="right-side">
  <h2>Class Details</h2>
  <table class="details-table">
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
</div>
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
