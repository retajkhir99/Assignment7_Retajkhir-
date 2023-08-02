
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css_file/signup.css">
    <link rel="stylesheet" type="text/php" href="signin1.php">
    <title>Log in</title>
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

    <form method="POST" action="signin1.php" method="post">
        <h1><img src="img/Mobile login-rafiki.png" alt="" >Log in </h1>
        <br>
    <section class="box">
    <div class="mb-3">
        <label for="email" class="form-label">E_mail:</label>
        <input type="txt" id="email" name="email" class="form-control" required>
    </div>
    <br>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <br>
    <div class="mb-3">
        <a href="signup.php" class="text-decoration-none">Create a new account </a>
    </div>
    <br>
    <p>
     <input type="checkbox" name="accepts_tos" value="yes" required> I agree to the
     <a href="/html-css-practice-test/" target="_blank">terms of service</a>
   </p>
   <br>
   <p>
   <input type="checkbox" name="accepts_tos" value="yes">Remember me
   </p>
    <br>
    <button class="in" name="login" type="submit">login</button>
    <br>
    </section>
    </form>
</section>

<footer>
    <div class="content-footer">
        <h2>Author: Retaj khir </h2>
		<h4>Copyright © 2022-2023 UOT.
			All Rights are reserved</h4>
        <a href="mailto:retajkhir@gmail.com" target="_blank"><img src="icons/gmail_icon-icons.com_62758.png" alt=""> </a>
    </div>
   </footer>
</body>
</html>

