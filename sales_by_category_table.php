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

  $sql = "SELECT
    sum(CASE WHEN size = 'endless' THEN qty END) as endless_qty,
    sum(CASE WHEN size = 'single' THEN qty END) as single_qty,
    sum(CASE WHEN size = 'dbl' THEN qty END) as dbl_qty,
    sum(orders.qty) AS total_qty
    FROM orders";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table id='menu' class='category center'>";

    while($row = mysqli_fetch_assoc($result)) {
      $total = (int)stripslashes($row['total_qty']);
      $endless = (int)stripslashes($row['endless_qty']);
      $single = (int)stripslashes($row['single_qty']);
      $dbl = (int)stripslashes($row['dbl_qty']);

      echo "  <tr>";
      echo "    <th>Endless Cup</th>";
      echo "    <th>Single</th>";
      echo "    <th>Double</th>";
      echo "    <th>Total</th>";
      echo "  </tr>";
      echo "  <tr>";
      echo "    <td>".$endless."</td>";
      echo "    <td>".$single."</td>";
      echo "    <td>".$dbl."</td>";
      echo "    <td>".$total."</td>";
      echo "  </tr>";
      echo "  <tr>";
      echo "  </tr>";
      echo "  <tr>";
      echo "  </tr>";
      echo "</tr>";
    }       
    
    echo "</table>";
  } else {
    echo "No qty yet";
  }

  mysqli_close($conn);
?>