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

    $sql = "UPDATE menu SET";
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
    $sql .= " WHERE ID=" . $_POST['id'];
    
    echo "<script>";
    echo "  console.log('".$sql."');"; // to check $sql
    
    if (mysqli_query($conn, $sql)) {
      echo "alert('Menu updated successfully');";
    } else {
      echo "alert('Error occurred: ".mysqli_error($conn)."');";
    }
    echo "</script>";

    mysqli_close($conn);
  }
?>