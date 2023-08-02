<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expensetracker";

// أتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $dbname);

// تأكد من الاتصال
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>