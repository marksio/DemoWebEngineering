<title>Book Store | Search Result</title>

<?php 
	include_once('header.php');
?>
<link href="css/book.css" type="text/css" rel="stylesheet"/>
<style>
table.table1{
	margin: auto;
	border-collapse: collapse;
	width: 90%;
}
	
table.table1 th,td{
	padding: 10px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

table.table1 tr:hover{background-color: #f5f5f5}

a.link{
	color: black;
	text-decoration: none;

}

a.link:hover{
	color: #8c9093;
	text-decoration: none;

}
.wrapper td {
	margin: auto;
   	vertical-align: middle;
   	text-align: center;
}

.place {
	margin: auto;
	line-height: 5px;
}

.display{
	margin: 0 auto;
}

.parent1 {
	height: 100%;
	padding: 18px;
	flex-wrap: wrap;
	flex-direction: column;
	display: block;
    margin-left: auto;
    margin-right: auto
}

.core
{
	margin-top: 50px;
	padding: 30px 0;
	height: auto;
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	border-width: 5px;
    border-style: solid;
    border-color: lightcoral;
    border-radius: 8px;
}
</style>

	<div class="core">

<title>Book Store | Search Result</title>

<?php 

	include_once('header.php');

?>
<link href="css/book.css" type="text/css" rel="stylesheet"/>
<style>
table.table1{
	margin: auto;
	border-collapse: collapse;
	width: 90%;
}
	
table.table1 th,td{
	padding: 10px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

table.table1 tr:hover{background-color: #f5f5f5}

a.link{
	color: black;
	text-decoration: none;

}

a.link:hover{
	color: #8c9093;
	text-decoration: none;

}
.wrapper td {
	margin: auto;
   	vertical-align: middle;
   	text-align: center;
}

.place {
	margin: auto;
	line-height: 5px;
}

.display{
	margin: 0 auto;
}

.parent1 {
	height: 100%;
	padding: 18px;
	flex-wrap: wrap;
	flex-direction: column;
	display: block;
    margin-left: auto;
    margin-right: auto
}

.core
{
	margin-top: 50px;
	padding: 30px 0;
	height: auto;
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	border-width: 5px;
    border-style: solid;
    border-color: lightcoral;
    border-radius: 8px;
}
</style>

	

<?php 
	if(isset($_GET['submit']))
	{
		if(isset($_GET['search']))
		{
			//Search from MySQL database table
			$search = test_input($_GET['search']);
			
			if($search == "")
			{
				echo "<p style=\"font-size: 20px,; padding: 16px; text-align: center; font-family: arial, Helvetica, sans-serif;\">
					<strong>Please enter a value.</strong></p>";
			}
			else 
			{
				$sql = "select * from books where title LIKE '%$search%' 
						ORDER BY title LIKE '$search%' DESC LIMIT 15";
							//OR author LIKE '%$search%'";
				$result = $connect->query($sql);
				
				if($result->num_rows == 0)
				{
					echo "<p style=\"font-size: 20px,; padding: 16px; text-align: center; font-family: arial, Helvetica, sans-serif;\">
						<strong>Nothing found</strong></p>";
				}
				else 
				{
					echo "<div=\"parent1\"><table class=\"table1 \" style=\"font-family:arial;\">";
					echo "<tr><td>Image</td><td>Title</td><td>Author</td><td>Theme</td><td>Price</td><td>Publisher</td><td>Published Date</td>";
					while($row = $result->fetch_assoc())
					{
						$image = $row['image'];
						echo"<tr>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\"><img src=\"image/$image\" width=\"80px\"></a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['title']."</a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['author']."</a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['theme']."</a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">$".$row['price']."</a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['publisher']."</a></td>";
						echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".date_format(date_create ($row['published']), "M Y")."</a></td>";
						echo'<td>
						<form method="get">
							<input type="text" style="display: none;" name="id" value="'.$row['id'].'">
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
					</td>';
						echo"</tr>";

					}
					echo"</table></div>";
				}//end if statement
			} // end checking $search
		}
	}	
?>

</div>
<br>
<?php 
	include('addtocart.php');
	include_once'footer.php';
?>

	