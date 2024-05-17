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
  <title>Details Page</title>
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
  </style>
</head>
<body>

<!-- Left Side Buttons -->
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
            <li class="scroll-to-section"><a href="#subscribe">Add Class</a></li>
            <li class="scroll-to-section"><a href="#deleteClass">Delete Class</a></li>
            <li class="scroll-to-section"><a href="#contact">Update Class</a></li>
            <li class="scroll-to-section"><a href="period.php">Period</a></li>
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
      <div class="row">
      <div class="container">
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
</div>
      </div>
    </div>
  </div>
  <div id="subscribe" class="subscribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <h2>Add a New Class</h2>
                <form id="subscribe" action="add_class.php" method="post">
                  <input type="text" name="classNo" id="classNo" placeholder="Class Number" required="">
                  <input type="text" name="className" id="className" placeholder="Class Name" required="">
                  <button type="submit" id="form-submit" class="main-button">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
      <div class="row">
      <div class="container">
      <div id="deleteClass" class="subscribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <h2>Delete a Class</h2>
                <form id="subscribe" action="delete_class.php" method="post">
                  <input type="text" name="classNo" id="classNo" placeholder="Class Number" required="">
                  <button type="submit" id="form-submit" class="main-button">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="section-heading">
            <h2>Update <em>Records </em>of a <span>Class</span></h2>
            <div id="map">
              <iframe src="https://t4.ftcdn.net/jpg/06/25/93/03/360_F_625930300_RCif2F8QPzkuiC7TAEtj5QIwlumqwe3w.jpg" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <form id="contact" action="update_class.php" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="number" name="class_id" id="class_id" placeholder="Class ID" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="number" name="class_no" id="class_no" placeholder="Class No" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="class_name" id="class_name" placeholder="Class Name" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Update</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
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
