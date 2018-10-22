<?php
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

  $sql = "SELECT
    DATE_FORMAT(orders.date,'%d/%m/%Y') AS date,
    menu.name,
    sum(orders.amt) AS sales
    FROM orders
    RIGHT JOIN menu on orders.product_id = menu.ID
    GROUP BY DATE(orders.date), menu.name";
  // run query above in phpMyAdmin to see response

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $date = NULL;
    while ($row = mysqli_fetch_assoc($result)) {
      if (!$date || $date != $row['date']) {
        echo "<table class='salesTable'>"; // create new table for new date
        echo "  <tr>";
        echo "    <td class='date' colspan='2'>".$row['date']."</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "    <th>Product</th>";
        echo "    <th>Sales</th>";
        echo "  </tr>";
        $date = $row['date'];
      }

      echo "<tr>";
      echo "  <td>".$row['name']."</td>";
      echo "  <td>$<span class='salesValue'>";
      echo      number_format($row['sales'], 2, '.', ''); // 2 decimal places
      echo "  </span></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No sales yet";
  }

  mysqli_close($conn);
?>