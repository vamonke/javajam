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

  $sql = "SELECT * FROM menu";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table id='menu'>";
    while($row = mysqli_fetch_assoc($result)) {
      $id = htmlspecialchars(stripslashes($row['ID']));
      $name = htmlspecialchars(stripslashes($row['name']));
      $desc = stripslashes($row['description']);
      // NULL => 0.00 for prices
      $endless = number_format((float)stripslashes($row['endless']), 2, '.', '');
      $single = number_format((float)stripslashes($row['single']), 2, '.', '');
      $dbl = number_format((float)stripslashes($row['dbl']), 2, '.', '');

      echo "<tr>";
      echo "  <td class='editCol'>";
      echo "    <button onClick=toggleEdit(this)>Edit</button>";
      echo "  </td>";
      echo "  <td>".$name."</td>"; // show name
      echo "  <td>";
      echo "    <p>".$desc."</p>"; // show description
      echo "    <form name='form' action='product_update.php' method='post'>"; // POST to product_update.php
      echo "      <input type='hidden' value='".$id."' name='id' />"; // send item ID

      if ($endless != 0.00) { // displays only if endless price is not zero
        echo " Endless Cup: $";
        echo "<span class='priceDisplay'>".$endless."</span>"; // endless price
        echo "<input name='endless' value='".$endless."' class='priceInput' type='number' min='0.01' step='0.01'>"; // endless input
      }
      if ($single != 0.00) { // displays only if single price is not zero
        echo " Single: $";
        echo "<span class='priceDisplay'>".$single."</span>"; // single price
        echo "<input name='single' value='".$single."' class='priceInput' type='number' min='0.01' step='0.01'>"; // single input
      }
      if ($dbl != 0.00) {  // displays only if double price is not zero
        echo " Double: $";
        echo "<span class='priceDisplay'>".$dbl."</span>"; // double price
        echo "<input name='dbl' value='".$dbl."' class='priceInput' type='number' min='0.01' step='0.01'>"; // double input
      }

      echo "      <button class='priceInput' type='submit'>";
      echo "        Update";
      echo "      </button>";
      echo "    </form>";
      echo "  </td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No products currently";
  }

  mysqli_close($conn);
?>