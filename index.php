<title>Book store | Home Page</title>
<?php
	include_once('header.php');
?>
<link href="css/index.css" type="text/css" rel="stylesheet"/>

<style>
table {
	width: 80%;
}
</style>

<center> 
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="image/sales.png" width="100%" height="350px">
</div>

<div class="mySlides fade">
  <img src="image/salesbanner.jpg" width="100%" height="350px">
</div>

<div class="mySlides fade">
  <img src="image/bookstore.jpg" width="100%" height="350px">
</div>

<div class="mySlides fade">
  <img src="image/bookstore2.jpg" width="100%" height="350px">
</div>

<div class="mySlides fade">
  <img src="image/bookstore3.jpg" width="100%" height="350px">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
</div>



<br>
<div class="container1">
	<h1><a href="newarrivals.php">New Arrivals</a></h1>
	<table>
		<tr>
		
<?php
		$sql = "SELECT * FROM BOOKS ORDER BY id ASC LIMIT 6";
		$result = $connect->query($sql);
	
		if($result->num_rows > 0)
		{
			//get all the product details
			while($row = $result->fetch_assoc())
			{
				$title = $row['title'];	
				$author = $row['author'];
				$image = $row['image'];
			
?>
			<td><a href="book.php?id=<?php echo $row['id']?>"><img src="image/<?php echo $image ?>" width="150px" height="170px"></a></td>
		
		<?php
			}
		}
?></tr>
		
		<tr>
<?php 
$sql = "SELECT * FROM BOOKS ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

	if($result->num_rows > 0)
	{
		//get all the product details
		while($row = $result->fetch_assoc())
		{

?>
		<td><p1><a href="book.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></p1></td>
		<?php
			}
		}
?>
		<tr>
<?php 

$sql = "SELECT * FROM BOOKS ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		
		<td><p1><?php echo $row['author']?></p1></td>
<?php
	}
}
?>
		</tr>
		
		<tr>
<?php 

$sql = "SELECT * FROM BOOKS ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		<td><p1><a href ="book.php?id=<?php echo $row['id']?>">More info++</a></p1></td>
<?php
	}
}
?>
		</tr>
	</table>
</div>
	
<div class="container1">	
<br>
	<h1><a href="bestsellers.php">Best Sellers</a></h1>
	<table>
		<tr>
		<?php 

$sql = "SELECT * FROM BOOKS WHERE id > 9 ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		<td><a href="book.php?id=<?php echo $row['id']?>"><img src="image/<?php echo $row['image']?>" width="150px" height="170px"></a></td>
<?php
	}
}
?>		
		</tr>
		
		<tr>
<?php 

$sql = "SELECT * FROM BOOKS WHERE id > 9 ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		<td><p1><a href="book.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a></p1></td>
<?php 

	}
}
?>		
		</tr>
		
		<tr>
<?php 

$sql = "SELECT * FROM BOOKS WHERE id > 9 ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		<td><p1><?php echo $row['author']?></p1></td>
<?php 
	}
}

?>
		</tr>
		
		<tr>
<?php 

$sql = "SELECT * FROM BOOKS WHERE id > 9 ORDER BY id ASC LIMIT 6";
$result = $connect->query($sql);

if($result->num_rows > 0)
{
	//get all the product details
	while($row = $result->fetch_assoc())
	{

?>
		<td><p1><a href="book.php?id=<?php echo $row['id']?>">More info++</a></p1></td>
<?php 
	}
}

?>
		</tr>
	</table>

</div>

<br>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<?php
	include_once('footer.php');
?>