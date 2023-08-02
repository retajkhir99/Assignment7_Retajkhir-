<?php
include "db_conn.php";
$id = $_GET['id'];

//تقييم الموقع من خمس نجمات

if (isset($_POST["submit"])) {
  $evaluation = $_POST["evaluation"];
  $comment = $_POST["comment"];

  try {
    $duplicate = mysqli_query($conn, "SELECT * FROM review WHERE id_user= '$id'");

    if (mysqli_num_rows($duplicate) > 0) {
      throw new Exception("لديك تقييم سابق يمكنك تعديله من حسابك الخاص");
    } else {
      $query = "INSERT INTO review (id_user,reviewe,comment)  VALUES
       ('$id','$evaluation','$comment')";
      $result = $conn->query($query);

      if (!$result) {
        throw new Exception($conn->error);
      } else {
        header("Location: mainmenu.php?id=$id");
        exit();
      }
    }
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    header("Refresh: 5; URL=javascript:history.back()");
    exit();
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css_file/evaluat.css">
    <link rel="stylesheet" type="text/css" href="css_file/style.css">
    <title>تقييم الصفحة</title>
</head>
<h1 id="top"><span>Mony </span>Management</h1>
</header>
<section class="home" id="home">
 <nav id="navbar">
	<img src="./icons/economy-economics.png">
		<ul class="navcontent">
		<?php
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
<body>
    <br>
    <h1>تقييم الصفحة</h1>
    <form action="" method="post">
        <label>التقييم:</label>
        <select name="evaluation">
            <option value="1 star">نجمة واحدة</option>
            <option value="2 stars">نجمتين</option>
            <option value="3 stars">ثلاث نجمات</option>
            <option value="4 stars">أربع نجمات</option>
            <option value="5 stars">خمس نجمات</option>
        </select>
        <label>Comment:</label>
        <input type="text" name="comment" placeholder="Enter Comment..." required>
        <button type="submit"  name="submit">Save</button>
    </form>
</body>
</html>


