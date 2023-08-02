<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$evaluation=$_POST['evaluation'];
$comment=$_POST['comment'];

  $sql = "UPDATE `users` SET `username`='$username',`phonenumber`='$phonenumber',`email`='$email',`gender`='$gender', `password`='$password' WHERE id = $id";
  $result = mysqli_query($conn, $sql);
 
  $sql = "UPDATE `review` SET `reviewe`='$evaluation',`comment`='$comment' WHERE id_user = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: mainmenu.php?id=$id");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>edit</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #b63fac;">
    تعديل بيانات المستخدم
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">User Name:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
          </div>
          <div class="col">
            <label class="form-label">Phone Number:</label>
            <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['phonenumber'] ?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
          </div>
          <div class="col">
            <label class="form-label">Password:</label>
            <input type="text" class="password" name="password" value="<?php echo $row['password'] ?>">
          </div>
        </div>


        <div class="form-group mb-3">
          <label>Gender:</label>
          <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row["gender"] == 'male') ? "checked" : ""; ?>>
          <label for="male" class="form-input-label">Male</label>
          <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row["gender"] == 'female') ? "checked" : ""; ?>>
          <label for="female" class="form-input-label">Female</label>
        </div>
        <?php
        $sql = "SELECT * FROM `review` WHERE id_user = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Evaluation:</label>
            <input type="text" class="form-control" name="evaluation" value="<?php echo $row['reviewe'] ?>">
          </div>
          <div class="col">
            <label class="form-label">Comment:</label>
            <input type="text" class="form-control" name="comment" value="<?php echo $row['comment'] ?>">
            
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="mainmenu.php?id=<?php echo $row["id_user"] ?>" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>