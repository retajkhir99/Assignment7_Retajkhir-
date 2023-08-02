<?php
include "db_conn.php";
$id = $_GET['id'];
//بحث بستخدام التاريخ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css_file/searh.css">
    <link rel="stylesheet" type="text/css" href="css_file/style.css">
    <title>Search</title>
</head>
<body>
<form method="POST" action="">
  <input type="date" name="date" placeholder="Date...">
  <button type="submit" name="submit">Search</button>
</form>
<table>
  <thead>
    <tr>
      <th>Date</th>
      <th>Price</th>
      <th>Comment</th>
      <th>Payment</th>
    </tr>
  </thead>
  <tbody>
  <?php
include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    
    $sql = "SELECT * FROM expenses WHERE date = '$date' AND user = '$id'"; 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $payment = $row["payment"];
            if ($payment == 1) {
              $paym = "Cach";
            } else if ($payment == 2) {
              $paym = "Card";
            } else {
              $paym = "Check";
            }
          
            echo "<tr>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["comment"] . "</td>";
            echo "<td>" . $paym . "</td>";
            echo "</tr>";
          }
    } 
     else{
            echo "<p>No results found.</p>";
        }
}
mysqli_close($conn);
?>
</tbody>
</table>
</body>
</html>
