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
	  DATE_FORMAT(date,'%d/%m/%Y') AS date,
    size,
    sum(qty) AS total_qty
    FROM orders
    GROUP BY DATE(date), size";
  // run query above in phpMyAdmin to see response
  
  $result = mysqli_query($conn, $sql);

  function capitalize($size) {
    if ($size == 'dbl') {
      return 'Double';
    } else {
      return ucfirst($size); // uppercase first character
    }
  }

  if (mysqli_num_rows($result) > 0) {
    $tableDate = NULL; // keeps track of the date in each table
    while ($row = mysqli_fetch_assoc($result)) {
      $newDate = $row['date'];

      if (!$tableDate || $tableDate != $newDate) {
        if ($tableDate) { // close previous <table>
          echo "</table>";
        }
        echo "<table class='salesTable'>"; // create new <table> for new date
        echo "  <tr>";
        echo "    <td class='date' colspan='2'>".$newDate."</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "    <th>Category</th>";
        echo "    <th>Quantity</th>";
        echo "  </tr>";
        $tableDate = $newDate;
      }

      echo "<tr>";
      echo "  <td>".capitalize($row['size'])."</td>";
      echo "  <td>".$row['total_qty']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No sales yet";
  }

  mysqli_close($conn);
?>