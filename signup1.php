<?php
//أنشاء حساب جديد
// تحديد متغيرات POST
$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$resetpassword = $_POST['resetpassword'];
$gender = $_POST['gender'];

// التحقق من صحة البيانات المدخلة
if (empty($username) || empty($phonenumber) || empty($email) 
|| empty($password) || empty($resetpassword) || empty($gender)) {
   die("لم تدخل جميع التفاصيل المطلوبة. يرجى المحاولة مرة أخرى.");
}

if (strlen($username) > 15 || strlen($username) < 10) {
   die("يجب أن يكون اسم المستخدم بين 10 و 15 حرفًا.");
}

if (strlen($password) < 10 || strlen($password) > 14) {
   die("يجب أن تتكون كلمة المرور من 10 إلى 14 حرفًا.");
}

if (!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password) ||
 !preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*<>+]/", $password)) {
   die("يجب أن تتضمن كلمة المرور حروفًا كبيرة وصغيرة وأرقام ورموز خاصة.");
}

if ($password !== $resetpassword) {
   die("يجب أن تتطابق كلمة المرور.");
}

include "db_conn.php";

$username = $_POST['username'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$resetpassword = $_POST['resetpassword'];
$gender = $_POST['gender'];

$duplicate=mysqli_query($conn,"SELECT * FROM users WHERE 
username = '$username' OR email = '$email'");
if(mysqli_num_rows($duplicate) > 0){
    echo
     die("Username or Email no taken"); 
}
else{
    $query = "INSERT INTO users (username,phonenumber,email,password ,gender)  VALUES 
    ( '$username', '$phonenumber', '$email', '$password' , '$gender')" ;
    $result = $conn->query($query);
    
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id= $row["id"];
    if ($result) {
      header("Location:http://localhost/Assignment6Retajkhir/mainmenu.php?id=$id");    
    } else {
        echo   $conn -> error ;
        echo   "<br/>.The item was not added.";
        echo    "<br/>$query ";
    }
}
$conn -> close();
?>
