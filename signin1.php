<?php
//تسجيل دخول
$email = $_POST['email'];
$password = $_POST['password'];

//اتصال بقاعدة البيانات
$conn = mysqli_connect("localhost", "root", "", "expensetracker");

// التحقق من صحة الاتصال
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// استعلام SQL للتحقق من وجود المستخدم في قاعدة البيانات
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// التحقق من وجود بيانات المستخدم في قاعدة البيانات
if (mysqli_num_rows($result) > 0) {
    // استخراج معرف المستخدم
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
    // إعادة توجيه المستخدم إلى الصفحة الجديدة
    header("Location: http://localhost/Assignment6Retajkhir/mainmenu.php?id=$id");
} else {
    // في حالة عدم وجود بيانات المستخدم، إظهار رسالة خطأ
    echo "Invalid email or password";
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>