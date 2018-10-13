<!DOCTYPE html>
<html lang="en">

<head>
	<title>JavaJam Coffee House</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <div class="response">
    <?php
      var_dump($_POST);
      $servername = "localhost";
      $username = "f31im";
      $password = "f31im";
      $dbname = "f31im";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $success = true;
      foreach ($_POST['size'] as $id => $size) {
        $qty = $_POST['qty'][$id];
        $amt = $_POST['amt'][$id];
        if ($qty != 0) {
          $sql = "INSERT INTO orders (product_id, size, qty, amt) VALUES ('".$id."', '".$size."', '".$qty."', '".$amt."')";
          // echo $sql."<br />";
          if (mysqli_query($conn, $sql)) {
            // insert operation successful;
          } else {
            echo "Error occurred: " . mysqli_error($conn);
            $success = false;
          }
        }
      }

      if ($success) {
        echo "Order confirmed<br />";
      }

      mysqli_close($conn);
    ?>
    <br />
    <a href='/public_html/CaseStudyPt4/menu.php'>Return to menu</a>
  </div>

</body>

</html>