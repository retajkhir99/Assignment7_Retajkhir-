<?php
include "db_conn.php";
$id = $_GET['id'];
//الصفحة الرئسية
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Money Management</title>
	<link rel="stylesheet" type="text/css" href="css_file/style.css">
	<link rel="icon" href="icons/Coins-amico.png">
</head>

<body>
<header>
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
           <p>Welcom <?php echo $row["username"]?></p>
			<li><a href="http://localhost/Assignment6Retajkhir/mainmenu.php?id=<?php echo $row["id"] ?>">Home</a></li>
			<li><a href="http://localhost/Assignment6Retajkhir/signup.php?id=<?php echo $row["id"] ?>">Sign up</a></li>
			<li><a href="http://localhost/Assignment6Retajkhir/signin.php?id=<?php echo $row["id"] ?>">Log in</a></li>
            <li><a href="http://localhost/Assignment6Retajkhir/edit.php?id=<?php echo $row["id"] ?>">My acaount</a></li>
			<li><a href="search.php?id=<?php echo $row["id"] ?>">Search</a></li>
			<li><a href="logout.php">log out</a></li>
		</ul>
 </nav>
 <div id="main">
	<div class="contents"></div>
	<div class="sidebar">		
		<ul>
		<?php
        $sql = "SELECT * FROM `users`  WHERE id = $id";
        $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
        ?>	
		<li><a href="http://localhost/Assignment6Retajkhir/catogry_systm/index.php?id=<?php echo $row["id"] ?>">Categories</a></li>
		<li><a href="transfer.php?id=<?php echo $row["id"] ?>">Transfers</a></li>
		<li><a href="evaluation.php?id=<?php echo $row["id"] ?>">Evaluation</a></li>
		</ul>
	</div>
 </div>
 <div class="content">
	<div class="container-texts">
	  <h2> <span>Intelligent </span>Expense</h2>
	  <h2>Management Software</h2>
	  <div class="social">
		 <a href="a" target="_blank"><img src="icons/pngimg.com - copyright_PNG41.png" alt="" ></a>
		 <a href="a" target="_blank"><img 
			src="icons/calls_android_system_blue_smartphone_icon_252263 (1).png" alt="" ></a>
		 <a href="a" target="_blank"><img src="icons/1491579542-yumminkysocialmedia22_83078.png" 
         alt="" ></a>
		 <a href="a" target="_blank"><img src="icons/facebook_icon-icons.com_59205.png" alt="" ></a>
		 <a href="a" target="_blank"><img src="icons/gmail_icon-icons.com_62758.png"></a>
	  </div>
	</div>
	<div class="container-imges">
	 <img src="img/color-powder.png" alt="" class="shape">
	 <img src="img/india-sales.png" alt="" class="mypic">
	</div>
	</div>
 </section>
<section class="about">
    <div class="container-imges">
    <img src="img/Manage money-amico.png" alt="">
    </div>
    <div class="container-texts">
        <h1><span>about </span>US</h1>
        <p> It is an integrated site that enables you expenses and
			 bank accounts in one place, as it provides you with all the
			  tools you need to manage your finances and bank accounts to 
			  create a budget suitable for your goals</p>
    </div>
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
</html>