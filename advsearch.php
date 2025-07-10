<title>Book Store | Advanced Search</title>

<?php

	include_once('header.php');

?>

<link href="css/special.css" type="text/css" rel="stylesheet"/>

<style>

th,td{

	padding: 8px;

	text-align: left;

}



.advsearch {

	background-color: black;

	color: white;

	padding: 5px;

	font-family: Arial, Helvetica, sans-serif;

	border: 1px solid black;

	font-size: 15px;

	cursor: pointer;

	width: 80px;

	right: 100px;

}



table.table1{

	boder-collapse: collapse;

	width: 100%;

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

.left-half{ width: 20%; position: relative; display: table-cell; padding: 2rem 0.8em; margin: auto;}

.right-half {width: 60%%; position: relative; display: table-cell; padding: 2rem 0.8em;}

.container{padding:0 100px; position: relative; font-family: Arial, Helvetica, sans-serif; }

.conbig 

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

    margin-bottom: 50px;

}



</style>



	<div class="con">

	<div class="left-half">

	<h2 style = "padding: 8px">Advanced Search</h2>	

	<form action="advsearch.php" method="GET">

	<center>

		<table class="table2">	

		<tr>

			<td>Book Name: </td><td><input type="text" name="title"  maxlength="45"/></td>

		</tr>

		<tr>

			<td>Author: </td><td><input type="text" name="author"  maxlength="45"/></td>

		</tr>

		<tr>

			<td>Publisher: </td><td><input type = "text" name = "publisher" maxlength="40"/></td>

		</tr>

		<tr>

			<td>Theme :</td>

			<td><select name="theme">

			<option value = "">Select Theme</option>

			<option value = "activity">Activity</option>

			<option value = "adventure">Adventure</option>

			<option value = "animal">Animals</option>

			<option value = "art">Art</option>

			<option value = "bullying">Bullying</option>

			<option value = "dance">Dance</option>

			<option value = "family">Family</option>

			<option value = "humour">Humour</option>

			<option value = "mystery">Mystery</option>

			<option value = "nature">Nature</option>

			<option value = "science">Science</option>

			<option value = "sibling">Siblings</option>

			<option value = "teen">Teens</option>

			</select></td>

		</tr>

		<tr>

			<td>Price: </td>

			<td><select name="price">

			<option value = ""></option>

			<option value = "1">$0.00 - $9.99</option>

			<option value = "2">$10.00 - $14.99</option>

			<option value = "3">$15.00 - $19.99</option>

			<option value = "4">$20.00 - $29.99</option>

			<option value = "5">$30.00 above</option>

			</select></td>

		</tr>

		

		</table>

		</center>

		<br>

		<button type="reset" class="advsearch">Reset</button>

		<button type="submit" name="submit"  class="advsearch">Search</button>

	</form>

	</div>

	<br>

	

<?php     

	if(isset($_GET['submit']))

	{

		$title = test_input($_GET['title']);

		$author = test_input($_GET['author']);

		$publisher = test_input($_GET['publisher']);

		$theme = test_input($_GET['theme']);

		$price = test_input($_GET['price']);

		

		//Search from MySQL database table

		if(($title == "")&&($author=="")&&($publisher=="")&&($theme == "")&&($price==""))

		{

			echo "<p style=\"font-size: 16px,; font-family: arial, Helvetica, sans-serif;\">

					<strong>Please enter a value.</strong></p>";

		}

		else

		{

			if(isset($title))

			{

					$sql = "SELECT * FROM books WHERE title LIKE '%$title%'";

					if(isset($author))

					{

						$sql.= " AND author like '%$author%'";

						if(isset($publisher))

						{

							$sql.= " AND publisher like '%$publisher%'";

							if(isset($theme)) // if $theme existing

							{

								switch($theme)

								{

									case "activity": 	$sql.= " AND theme like '%activity%'"; 	break;

									case "adventure": 	$sql.= " AND theme like '%adventure%'"; break;

									case "animal": 		$sql.= " AND theme like '%animal%'"; 	break;

									case "art": 		$sql.= " AND theme like '%art%'"; 		break;

									case "bullying":	$sql.= " AND theme like '%bullying%'";	break;

									case "dance": 		$sql.= " AND theme like '%dance%'"; 	break;

									case "family": 		$sql.= " AND theme like '%family%'"; 	break;

									case "humour": 		$sql.= " AND theme like '%humour%'"; 	break;

									case "mystery": 	$sql.= " AND theme like '%mystery%'"; 	break;

									case "nature": 		$sql.= " AND theme like '%nature%'"; 	break;

									case "science": 	$sql.= " AND theme like '%science%'"; 	break;

									case "sibling": 	$sql.= " AND theme like '%sibling%'"; 	break;

									case "teen": 		$sql.= " AND theme like '%teen%'"; 		break;

								} //end switch %theme

					

								if(isset($price))

								{

									switch($price)

									{

										case 1 : $sql.= " AND price < 9.99"; 					break;

										case 2 : $sql.= " AND price BETWEEN 10.00 AND 14.99"; 	break;

										case 3 : $sql.= " AND price BETWEEN 15.00 AND 19.99"; 	break;

										case 4 : $sql.= " AND price BETWEEN 20.00 AND 29.99"; 	break;

										case 5 : $sql.= " AND price > 30.00"; 					break;

									}//end switch $price

								}//end if $price existing

							}//end if $theme existing

						}//end if $publisher existing

					}

				}// end of sql select statement

			

			if(isset($title))

			{

				$sql.= " ORDER BY title LIKE '$title%' DESC";

				

				if(isset($author))

				{

					$sql.=", author LIKE '%$author%' DESC";

					if(isset($publisher))

					{

						$sql.=", publisher LIKE '$publisher%' DESC";

					

						if($theme != "")

						{

							$sql.= ", theme";		

						}

						if($price != "")

						{

							$sql.=" ,price ASC";

						}	

					}

				}

				$sql.= " LIMIT 15";

			}

			

			$result = $connect->query($sql);

		

			//if the search result is nothing

			if($result->num_rows == 0)

			{

				echo "Nothing found";

			}

			else 

			{

				echo "</div><div class='conbig'><table class=\"table1\" style=\"font-family:arial;\">";

				echo "<tr><td>Image</td><td>Title</td><td>Author</td><td>Theme</td><td>Price</td><td>Publisher</td><td>Published Date</td>";

				while($row = $result->fetch_assoc())

				{



					$image = $row['image'];

					echo"<tr><a class=\"link\" href=\"book.php?id=".$row['id']."\">";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\"><img src=\"image/$image\" width=\"80px\"></a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['title']."</a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['author']."</a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['theme']."</a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">$".$row['price']."</a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".$row['publisher']."</a></td>";

					echo"<td><a class=\"link\" href=\"book.php?id=".$row['id']."\">".date_format(date_create ($row['published']), "M Y")."</a></td>";

					echo'<td>

						<form method="get" action="addtocart.php">

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

					echo"</a></tr>";

				}

				echo"</table>";

			}

		}

		

	}

		

?>

	</div>

	</div>



	

<?php

	include_once('footer.php');

?>
