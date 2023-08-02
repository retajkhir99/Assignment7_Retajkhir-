<?php
include "db_conn.php";
$id = $_GET['id'];
//تحويل الأمول بين الفئات وعرض جميع التحويلات سابقة
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expensetracker";

try {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
  
	if (!$conn) {
	  throw new Exception("Connection failed: " . mysqli_connect_error());
	}
  
	$id_user = $_GET["id"];
  
	if (isset($_POST["submit"])) {
	  $from_category = $_POST['from_category'];
	  $to_category = $_POST['to_category'];
	  $amount = $_POST['amount'];
	  $date = $_POST['date'];
	  $comment = $_POST['comment'];
  
	  // تحقق من أن أحد الحقول فارخ
	  if (empty($from_category) || empty($to_category) || empty($amount) || empty($date)) {
		throw new Exception("يرجى ملء كل الحقول المطلوبة");
	  }
  
	  // التحقق من وجود الفئة المحولة
	  $sql_from = "SELECT name_category FROM categories WHERE name_category='$from_category' AND id_user=$id_user";
	  $result_from = mysqli_query($conn, $sql_from);
	  if (mysqli_num_rows($result_from) == 0) {
		throw new Exception("الفئة المحولة غير موجودة في قاعدة البيانات");
	  }
  
	  // التحقق من وجود الفئة المستلمة
	  $sql_to = "SELECT name_category FROM categories WHERE name_category='$to_category' AND id_user=$id_user";
	  $result_to = mysqli_query($conn, $sql_to);
	  if (mysqli_num_rows($result_to) == 0) {
		throw new Exception("الفئة المستلمة غير موجودة في قاعدة البيانات");
	  }
  
	  $sql_amount = "SELECT amount FROM categories WHERE name_category='$from_category' AND id_user=$id_user";
	  $result_amount = mysqli_query($conn, $sql_amount);
	  $row_amount = mysqli_fetch_assoc($result_amount);
	  $current_amount = $row_amount["amount"];
  
	  // Check if the current amount is enough for the transfer
	  if ($current_amount < $amount) {
		throw new Exception("خطأ: الرصيد المتاح في الفئة المحولة غير كافٍ");
	  }
  
	  // Prepare and bind the SQL statement
	  $query = "INSERT INTO transfer (id_user, date, comment, from_category, to_category, amount) VALUES 
	  ('$id_user', '$date', '$comment', '$from_category', '$to_category', '$amount')";
	  $result = $conn->query($query);
  
	  // Execute the statement and check if it was successful
	  if (!$result) {
		throw new Exception("Failed: " . mysqli_error($conn));
	  }
	  else {
		// تحديث القيمة في جدول الفئات 
		$sql1 = "UPDATE categories SET amount=amount-$amount WHERE name_category = '$from_category' AND id_user = $id_user";
		$sql2 = "UPDATE categories SET amount=amount+$amount WHERE name_category = '$to_category' AND id_user = $id_user";
  
		$result1 = mysqli_query($conn, $sql1);
		$result2 = mysqli_query($conn, $sql2);
  
		if ($result1 && $result2) {
		  echo "تمت العملية بنجاح";
		}
		else {
		  throw new Exception("Failed: " . mysqli_error($conn));
		}
	  }
	}
  }
  catch (Exception $e) {
	echo "Error: " . $e->getMessage();
  }
  finally {
	mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>نظام تحويل الأموال</title>
	<link rel="stylesheet" type="text/css" href="css_file/style.css">
	<link rel="stylesheet" type="text/css" href="css_file/transfer.css">
</head>
<body>
	<section>
		<h1 id="top"><span>Mony </span>Management</h1>
		<nav id="navbar">
			<img src="./icons/economy-economics.png">
			<ul class="navcontent">
				<?php
				include "db_conn.php";
				$id = $_GET['id'];

				$sql = "SELECT * FROM `users`  WHERE id = $id";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				?>
				<p>Welcom<?php echo $row["username"]?></p>
				<li><a href="http://localhost/Assignment6Retajkhir/mainmenu.php?id=<?php echo $row["id"] ?>">Home</a></li>
				<li><a href="http://localhost/Assignment6Retajkhir/signup.php?id=<?php echo $row["id"] ?>">Sign up</a></li>
				<li><a href="http://localhost/Assignment6Retajkhir/signin.php?id=<?php echo $row["id"] ?>">Log in</a></li>
				<li><a href="http://localhost/Assignment6Retajkhir/edit.php?id=<?php echo $row["id"] ?>">My acaount</a></li>
				<li><a href="search.php?id=<?php echo $row["id"] ?>">Search</a></li>
				<li><a href="logout.php">log out</a></li>
			</ul>
		</nav>
	</section>

	<main>
		<h1>نظام تحويل الأموال</h1>
		<form action="" method="post">
			<label >الفئة المحولة:</label>
			<select name="from_category" id="from_category">
                  <option value="Food">Food</option>
                  <option value="Clothes">Clothes</option>
                  <option value="Shooping">Shooping</option>
                  <option value="Study">Study</option>
                  <option value="Health">Health</option>
                  <option value="House">House</option>
                  <option value="Car">Car</option>
                  <option value="Transport">Transport</option>
                  <option value="Salary">Salary</option>
               </select>
			<label >الفئة المستلمة:</label>
            <select name="to_category" id="to_category">
                  <option value="Food">Food</option>
                  <option value="Clothes">Clothes</option>
                  <option value="Shooping">Shooping</option>
                  <option value="Study">Study</option>
                  <option value="Health">Health</option>
                  <option value="House">House</option>
                  <option value="Car">Car</option>
                  <option value="Transport">Transport</option>
                  <option value="Salary">Salary</option>
               </select>
			<label >المبلغ:</label>
			<input type="number" name="amount" id="amount" min="0" required>
			<label >التاريخ:</label>
			<input type="date" name="date" id="date" required>
			<label >التعليق:</label>
			<input type="text" name="comment" id="comment">
			<button type="submit" name="submit"> تحويل الأموال </button>
		</form>
    <br>
		<table>
			<thead>
				<tr>
					<th>الفئة المحولة</th>
					<th>الفئة المستلمة</th>
					<th>المبلغ</th>
					<th>التاريخ</th>
					<th>التعليق</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM `transfer` WHERE id_user = $id";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['from_category'] . "</td>";
						echo "<td>" . $row['to_category'] . "</td>";
						echo "<td>" . $row['amount'] . "</td>";
						echo "<td>" . $row['date'] . "</td>";
						echo "<td>" . $row['comment'] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='5'>لا توجد بيانات</td></tr>";
				}
				?>
			</tbody>
		</table>
	</main>
</body>
</html>