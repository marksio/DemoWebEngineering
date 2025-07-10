<title>Book Store | Promotion</title>

<?php 



	include_once'header.php';



?>

<link href="css/special.css" type="text/css" rel="stylesheet"/>

<center><h1 style="font-family: 'Courgette', cursive;">Promotion</h1></center>

<div class="main">

	<div class="promo">

		<div class="item">

			<div class="left">

				<h1>Free Shipping</h1>

				<p>when purchase $80 and above</p>

			</div>

		

			<div class="right">

				<img src="image/free-ship.png" width="150px" height="150px">

			</div>

		</div>

	

<style>

.promo {

	width: 90%;

	margin-right: auto;

	margin-left: auto;

	padding: 10px;

	height: auto;

}



.item {

	margin: 30px 0;

	width: 100%;

	height: 200px;

	background-color: #A3BBF3;

	border-width: 5px;

	border-style: solid;

	border-color: #FFFC91;

	border-radius: 8px;

}



.left {

	width: 45%;

	float: left;

}



.right {

	width: 45%;

	float: right;

}

</style>	

	<div class="item">

		<div class="left">

			<img src="image/50discount.png" width="150px" height="150px">

		</div>

	

		<div class="right">

			<h2>Mid Year Sales Up To 50%</h2>

			<h5>On selected items(T&C apply)</h5>

			<br>

			<p>First book 10%</p>

			<p>Second book 20%</p>

			<p>Fifth book and above 50%</p>

		</div>

	</div>

	

	<div class="item">

		<div class="left">

			<h1 style="text-align:center; margin-top:60px">10% off on all new arrivals</h1>

		</div>

		<div class="right">

			<img src="image/10discount.png" width="180px" height="150px">

		</div>

	</div>

<?php

		$sql = "SELECT * FROM books WHERE SPECIAL LIKE '%promo%' ORDER BY id ASC";

		$result = $connect->query($sql);



		if($result->num_rows > 0)

		{

			//get all the product details

			while($row = $result->fetch_assoc())

			{

			

?>

<div class="content">

			<form method="GET">

			<a href="book.php?id=<?php echo $row['id']?>">

			<input type="text" style="display: none;" name="id" value="<?php echo $row['id']?>">

			<img src="image/<?php echo $row['image']?>" width="150px" height="150px">

			<h5><?php echo $row['title']?></h5>

			</a>

			<p><b>Age: </b><?php echo $row['age']?></p>

			<img src="image/4star.png" weight="60px" height="30px">

			<h5>$<?php echo $row['price']?></h5>

			<p style="display: inline;">Quantity</p>

				<select name="quantity">

					<option value="1">1</option>

					<option value="2">2</option>

					<option value="3">3</option>

					<option value="4">4</option>

					<option value="5">5</option>

					<option value="6">6</option>

					<option value="7">7</option>

					<option value="8">8</option>

					<option value="9">9</option>

					<option value="10">10</option>

					<option value="20">20</option>

					<option value="30">30</option>

					<option value="40">40</option>

					<option value="50">50</option>

					<option value="60">60</option>

					<option value="70">70</option>

					<option value="80">80</option>

					<option value="90">90</option>

					<option value="100">100</option>

				</select>

			<button type="submit" class="btn btn-default" name="add">Add To Cart</button>

			</form>

		</div>

<?php

			}

		}

		include('addtocart.php');

?>

	

</div>

<br>



<?php 



	include_once'footer.php';



?>
