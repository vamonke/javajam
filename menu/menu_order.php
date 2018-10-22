<?php
  // var_dump($_POST);
  if (!empty($_POST)) { // check if there is POST data. If not, do nothing.

    $servername = "localhost";
    $username = "f31im";
    $password = "f31im";
    $dbname = "f31im";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }

    $success = true;
    $empty = true;
    $errorMsg = '';
    
    echo "<script>";

    foreach ($_POST['size'] as $id => $size) {
      $qty = $_POST['qty'][$id];
      $amt = $_POST['amt'][$id];
      if ($qty != 0) {
        $empty = false;
        $sql = "INSERT INTO orders (product_id, size, qty, amt) VALUES ('".$id."', '".$size."', '".$qty."', '".$amt."')";
        echo "console.log(\"".$sql."\");"; // to check $sql
        if (mysqli_query($conn, $sql)) {
          // insert operation successful
        } else {
          $success = false;
          $errorMsg .= "Error occurred: ".mysqli_error($conn)."\\n";
        }
      }
    }

    if ($empty) {
      echo "alert('Order form is empty');";
    } else if ($success) {
      echo "alert('Order confirmed');";
    } else {
      echo "alert(".$errorMsg."');";
    }
    echo "</script>";

    mysqli_close($conn);
  }
?>