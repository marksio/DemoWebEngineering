<!DOCTYPE HTML>

<html>

<head>

<link rel="shortcut icon" type="image/x-icon" href="image/icon.ico" />



<!-- Bootstrap CSS -->

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>



<!-- Custom CSS -->

<link href="css/header.css" type="text/css" rel="stylesheet"/>

</head>

<body>



<header>

<div class="menu-wrap">

    <nav class="menu">

		<ul class="clearfix">	

			<li style="margin-left:20px"><a href="index.php"><img src="image/logo.png" class="logo">Once Upon A Book</a></li>	

			

            <li>

			<a>On our shelves</a>

 

                <ul class="dropdown">

                    <li><a href="newarrivals.php">New Arrivals</a></li>

					<li><a href="bestsellers.php">Best Sellers</a></li>

					<li><a href="staffpicks.php">Staff Picks</a></li>

				</ul>

            </li>

			<li>

                <a>Books</a>

				

				<ul class="dropdown">

					<li><a href="small_age.php">Age 0 - 2 years</a></li>

					<li><a href="second_age.php">Age 2 - 4 years</a></li>

					<li><a href="third_age.php">Age 4 - 6 years</a></li>

					<li><a href="fourth_age.php">Age 6 - 8 years</a></li>

					<li><a href="young_adult.php">Young Adult</a></li>

				</ul>

            </li>

			<li>

				<a href="promo.php">Promotion</a>

			</li>

			

			<li style = "float:right" >

			<form class = "form-inline" action = "search.php" method="GET">

			<input type="text" class="searchBar" name="search" placeholder="Search here..." maxlength="45"/><button type="submit" name="submit" class="searchBtn">

			Search

			</button>

			</form>

			<a style="text-decoration: none" target="_blank" href="advsearch.php">Advanced Search</a>

			</li>

			<?php

			include('connect.php');

			session_start();

			

			// To check session availability

			if(!isset($_SESSION['login-name']))

			{

				echo '<li style = "float:right"><a href="login.php">Login/ Sign Up</a><li>';

			}

			else

			{

				$username = $_SESSION['login-username'];



				$result = $connect->query("SELECT cid FROM user WHERE username='$username'");

                      

	              while ($row = $result->fetch_assoc()) {

	                 $usercid = $row['cid'];

	              }



				$result = $connect->query("SELECT * FROM purchase WHERE user_cid='$usercid'");

				$length = $result->num_rows;



				echo '

					<li style = "float:right" >

						<a href="cart.php" class="fa fa-shopping-cart">

							<span class="badge">'.$length.'</span>

						</a>

					</li>

					<li style = "float:right"><a>Welcome '.$_SESSION['login-name'].'</a>

					<ul class="dropdown">

						<li><a href="profile.php">User Profile</a></li>

						<li><a href="logout.php">Logout</a></li>

					</ul>

					</li>

				';

			}



			function test_input($data) 

			{

			    $data = trim($data);

			    $data = stripslashes($data);

			    $data = htmlspecialchars($data);

			    return $data;

			}

			?>

		</ul>

	</nav>

</div>

</header>

