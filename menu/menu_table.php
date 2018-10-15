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
    echo "<form name='form' action='menu_order.php' method='post'>"; // POST to product_update.php
    echo "  <table id='menu'>";
    while($row = mysqli_fetch_assoc($result)) {
      $id = htmlspecialchars(stripslashes($row['ID']));
      $name = htmlspecialchars(stripslashes($row['name']));
      $desc = stripslashes($row['description']);
      $endless = stripslashes($row['endless']);
      $single = stripslashes($row['single']);
      $dbl = stripslashes($row['dbl']);

      echo "    <tr>";
      echo "      <td>".$name."</td>"; // show name
      echo "      <td>";
      echo "        <p>".$desc."</p>"; // show description

      // Size inputs
      // Prices are wrapped in a <span> tag for jquery selection in menu.js
      if ($endless) { // display option only if endless price is not NULL
        $inputType = ($single || $dbl) ? 'radio' : 'hidden'; // hide input if it is the only available option
        echo "      <input name='size[".$id."]' value='endless' type='".$inputType."' checked oninput='getSubtotal(this)'>";
        echo "      Endless Cup: $<span>";
        echo          number_format((float)$endless, 2, '.', ''); // endless price
        echo "      </span>";
        echo "      <br />";
      }
      if ($single) { // display option only if single price is not NULL
        echo "      <input name='size[".$id."]' value='single' type='radio' checked oninput='getSubtotal(this)'>";
        echo "      Single: $<span>";
        echo          number_format((float)$single, 2, '.', ''); // single price
        echo "      </span>";
        echo "      <br />";
      }
      if ($dbl) {  // display option only if double price is not NULL
        echo "      <input name='size[".$id."]' value='dbl' type='radio' oninput='getSubtotal(this)'>";
        echo "      Double: $<span>";
        echo          number_format((float)$dbl, 2, '.', '');; // double price
        echo "      </span>";
        echo "      <br />";
      }

      echo "      </td>";
      echo "      <td>";
      echo "        <input name='qty[".$id."]' type='number' min='0' value='0' step='1' oninput='getSubtotal(this)'>"; // Qty input
      echo "      </td>";
      echo "      <td>";
      echo "        <input name='amt[".$id."]' class='subtotal' type='text' value='0.00' readonly>"; // subtotal input
      echo "      </td>";
      echo "    </form>";
      echo "  </td>";
      echo "</tr>";
    }

    echo "<tr id='total-tr'>";
    echo "  <td></td>";
    echo "  <td>Total price:</td>";
    echo "  <td colspan='2'>";
    echo "    <input id='total-field' type='text' value='0.00' readyonly>";
    echo "    <br /><br />";
    echo "    <button type='submit'>";
    echo "      Order";
    echo "    </button>";
    echo "  </td>";
    echo "</tr>";
        
    echo "</table>";
  } else {
    echo "No products currently";
  }

  mysqli_close($conn);
?>