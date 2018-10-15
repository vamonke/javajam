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

      $sql = "UPDATE menu \r\n SET";
      if (isset($_POST['endless'])) {
        $sql .= " endless=".$_POST['endless'].",";
      }
      if (isset($_POST['single'])) {
        $sql .= " single=".$_POST['single'].",";
      }
      if (isset($_POST['dbl'])) {
        $sql .= " dbl=".$_POST['dbl'].",";
      }
      $sql = rtrim($sql, ','); // remove comma from end of $sql
      $sql .= "\r\n WHERE id=" . $_POST['id'];
      echo $sql."<br /><br />";
      if (mysqli_query($conn, $sql)) {
        echo "Menu updated successfully";
      } else {
        echo "Error occurred: " . mysqli_error($conn);
      }

      mysqli_close($conn);
    ?>
    <br />
    <br />
    <a href='product.php'>Return to products</a>
  </div>

</body>

</html>