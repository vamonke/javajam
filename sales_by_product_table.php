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
    menu.name,
    max(CASE WHEN size = 'endless' THEN amt END) as endless_amt,
    max(CASE WHEN size = 'single' THEN amt END) as single_amt,
    max(CASE WHEN size = 'dbl' THEN amt END) as dbl_amt,
    sum(orders.amt) AS total_amt
    FROM orders
    RIGHT JOIN menu on orders.product_id = menu.ID
    GROUP BY menu.name";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table id='menu' class='center'>";
    echo "  <tr>";
    echo "    <th>Product</th>";
    echo "    <th>Endless Cup</th>";
    echo "    <th>Single</th>";
    echo "    <th>Double</th>";
    echo "    <th>Total<br />(Highest first)</th>";
    echo "  </tr>";

    while($row = mysqli_fetch_assoc($result)) {
      $name = htmlspecialchars(stripslashes($row['name']));
      $total = number_format((float)stripslashes($row['total_amt']), 2, '.', '');
      $endless = (float)stripslashes($row['endless_amt']);
      $single = (float)stripslashes($row['single_amt']);
      $dbl = (float)stripslashes($row['dbl_amt']);

      echo "<tr>";
      echo "  <td>".$name."</td>";
      echo "  <td>".($endless ? "$".number_format($endless, 2, '.', '') : "-")."</td>";
      echo "  <td>".($single ? "$".number_format($single, 2, '.', '') : "-")."</td>";
      echo "  <td>".($dbl ? "$".number_format($dbl, 2, '.', '') : "-")."</td>";
      echo "  <td>$".$total."</td>";
      echo "</tr>";
    }       
    
    echo "</table>";
  } else {
    echo "No sales yet";
  }

  mysqli_close($conn);
?>