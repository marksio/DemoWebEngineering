<?php 
	include('header.php');
	date_default_timezone_set('Asia/Kuala_Lumpur');

	if((isset($_GET['id'])) && ($_GET['id'] !== ''))
	{
		// Use this var to check to see if this ID exists, if yes then get the product 
		// details, if no then exit this script and give message why
		// use regular expression search and replace
		$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
		
		$sql = "SELECT * FROM BOOKS WHERE id='$id' LIMIT 1";
		$connect->set_charset("utf8");
		$result = $connect->query($sql);
	
		if($result->num_rows > 0)
		{
			//get all the product details
			while($row = $result->fetch_assoc())
			{
				$title = $row['title'];
				$author = $row['author'];
				$age = $row['age'];
				$gender = $row['gender'];
				$theme = $row['theme'];
				$format = $row['format'];
				$isbn = $row['isbn'];
				$publisher = $row['publisher'];
				$published = date_format(date_create ($row['published']), "M Y");
				$price = $row['price'];
				$description = $row['description'];
				$image = $row['image'];

			}
		} else {
			echo "That item does not exis. ";
			exit();
		}
		
	} else {
		echo "Data to render this page is missing";
		exit();
	}
	
	include('addtocart.php');
?>
<title><?php echo $title?></title>
<link href="css/book.css" type="text/css" rel="stylesheet"/>
<style>
	.parent 
	{
		width: 80%;
	}
</style>

<div class="parent">
	<div class="item">
		<div class="left">
			<div class="content">
				<?php echo'<img src="image/'.$image.'" width="180px" height="250px">'?>
			</div>
		</div>
	</div>
	
	<div class="item">
		<div class="right">
			<div class="content">
				<form method="GET">
				<h3><b><?php echo $title ?></b></h3>
				<input type="text" style="display: none;" name="id" value="<?php echo $id?>">
				<hr>
				<div class="row">
				<div class="col-md-6">
					<p><b>Author: </b><?php echo $author ?></p>
					<p><b>Age Range: </b><?php echo $age ?></p>
					<p><b>Gender: </b><?php echo $gender ?></p>
					<p><b>Theme: </b><?php echo $theme ?></p>
				</div>
				<div class="col-md-6">
					<p><b>Format: </b><?php echo $format ?></p>
					<p><b>ISBN: </b><?php echo $isbn ?></p>
					<p><b>Publisher: </b><?php echo $publisher; ?></p>
					<p><b>Published: </b><?php echo $published; ?></p>
				</div>
				</div>
				<hr>
				<p><b>Description</b><br></p>
				<p><?php echo $description; ?></p>
				<hr>
				<div class="item-left">
					<h4><b>Price: </b>$<?php echo $price; ?></h4>
				</div>
				<div class="item-right">
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
			</div>
		</div>
	</div>
	


<div class="item">
		<div class="content">
		<hr>
		<h4><b>Review</b></h4>
		<hr>
		<p><b>Amy</b> <img src="image/4star.png" width="70px" height="20px"></p>
		<p>It is a great book, interesting story.</p>
		<hr>
		<p><b>Sam</b> <img src="image/4star.png" width="70px" height="20px"></p>
		<p>Not bad</p>
		<hr>
		<p><b>Katie</b> <img src="image/3star.png" width="65px" height="15px"></p>
		<p>Awesome Book</p>
		<hr>
		<?php
			$sql_getAllReview = "SELECT review.review, review.sys_time, books.title, user.name
            FROM  review
            JOIN user ON review.user_cid = user.cid
            JOIN books ON review.books_cid = books.id WHERE books.id='$id'";
    		$result_AllReview = $connect->query($sql_getAllReview); 

    		if($result_AllReview->num_rows > 0)
    		{
                while($row = $result_AllReview->fetch_assoc())
                {
                	echo '
                	<p><b>'.$row['name'].'</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$row['sys_time'].'</p>
                	<p>'.$row['review'].'</p>
                	<hr>
                	';
                }
            }
		?>
		
		</div>
	

<?php 
if(isset($_GET['review_submit']))
{
	if(!isset($_SESSION['login-username']))
	{
		echo '
				</div>
				</div>
				</div>
			</div>
			</div>
			<br>
		';
		echo '<script language="javascript">alert("You must register to make review on this book!")</script>
		<meta http-equiv="refresh" content="0;URL=login.php"/>';
	}
	else
	{	
	   echo '<br><br>
		<p><b>We want to hear from you: </b></p>
			<form method="GET">
				<input type="text" style="display: none;" name="id" value="<?php echo $id?>">
				<textarea style="resize: none; width: 80%" name="review" rows="2" cols="60" placeholder="Enter your comment."></textarea>
				<br>
				<input type="submit" class="submitButton" value="Submit" name="review_submit">
				</form>
				</div>
				</div>
			</div>
			</div>
			<br>
	   ';
		    	
		    
		$username = $_SESSION['login-username'];

		$review = test_input($_GET['review']);
		$sysDate = date('Y-m-d H:i:s');

		if(empty($review) || strlen($review) < 2)
	    {
	    	echo '<script language="javascript">alert("Quantity must be filled!")</script>';
	    }
	    else
	    {
			$result = $connect->query("SELECT cid FROM user WHERE username='$username'");
	                  
	        while ($row = $result->fetch_assoc()) {
	            $usercid = $row['cid'];
	        }

	    	$query = "INSERT INTO review (review, sys_time, books_cid, user_cid) VALUES ('$review', '$sysDate', '$id', '$usercid')";
	        if($connect->query($query) === TRUE)
	        {
	            echo '<script language="javascript">alert("Review on this Book Successfully!")</script>
	            <meta http-equiv="refresh" content="0;URL=index.php"/>';
	        }
	        else
	        {
	            echo "Error: " . $query . "<br>" . $connect->error;
	        } 
		}
	}
    
}

	include_once'footer.php';
?>

</body>
</html>