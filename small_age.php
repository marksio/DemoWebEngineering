<title>Book Store | Age 0 - 2 Years</title>



<?php 



	include_once'header.php';



?>

<link href="css/special.css" type="text/css" rel="stylesheet"/>

<center><h1 style="font-family: 'Courgette', cursive;">Age 0 - 2 Years</h1></center>

<div class="main">

<?php

		$sql = "SELECT * FROM books WHERE AGE LIKE '%0 - 2%' ORDER BY id ASC";

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
