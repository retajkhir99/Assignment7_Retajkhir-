<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css_file/signup.css">
    <link rel="stylesheet" type="text/php" href="signup1.php">
    <title>sign up</title>
</head>
<body>
<header>
	<h1 id="top"><span>Mony </span>Management</h1>
</header>
<section class="home">
<nav id="navbar">
	<img src="./icons/economy-economics.png">
		<ul class="navcontent">
			<li><a href="http://localhost/Assignment6Retajkhir/signup.php">Sign up</a></li>
			<li><a href="http://localhost/Assignment6Retajkhir/signin.php">Log in</a></li>
		</ul>
 </nav>
    <form class=" " autocomplete=" " action="signup1.php" method="POST" method="post">
        <h1><img src="img/Mobile login-rafiki.png" alt="" >Create An Account</h1>
        <br>
    <section class="box">
    <div class="mb-3">
        <label for="username" class="form-label">User name:</label>
        <input type="text" id="username" name="username" class="form-control" 
        placeholder="Please Enter Username" required>
    </div>
    <br>
    <div class="mb-3">
        <label for="phonenumber" class="form-label">Phone number:</label>
        <input type="text" id="phonenumber" name="phonenumber" class="form-control" 
        placeholder="Please Enter Phone Number" required>
    </div>

    <br>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" id="email" name="email" class="form-control" 
        placeholder="Please Enter Your Email" required>
    </div>
    <br>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" 
        placeholder="Please Enter Password" required>
    </div>
    <br>
    <div class="mb-3">
        <label for="resetpassword" class="form-label">Reset Password:</label>
        <input type="password" id="resetpassword" name="resetpassword" class="form-control" 
        placeholder="Please Enter Reset Password" required>
    </div>
    <br>
    <p>
       <input type="radio" id="female" name="gender" value="Female" checked>
       <label for="female" class="radio_inline">Female</label>

       <input type="radio"  id="male" name="gender" value="Male">
       <label for="male" class="radio_inline">Male</label><br>
    </p>
    <br>
    <div class="mb-3">
        <a href="signin.php" class="text-decoration-none">Do you have an account? </a>
    </div>
    <br>
    <p>
     <input type="checkbox" name="accepts_tos" value="yes" required> I agree to the
     <a href="/html-css-practice-test/" target="_blank">terms of service</a>
   </p>
   <br>
   <p><input type="checkbox" name="accepts_tos" value="yes">Remember me</p>
    <br>
    <button class="in" name="login" type="submit">sign up</button>
    <br>
    </section>
    </form>
</section>

<footer>
    <div class="content-footer">
        <h2>Author: Retaj khir </h2>
		<h4>Copyright © 2022-2023 UOT.
			All Rights are reserved</h4>
        <a href="mailto:retajkhir@gmail.com" target="_blank">
            <img src="icons/gmail_icon-icons.com_62758.png" alt=""> </a>
    </div>
   </footer>

</body>
</html>

