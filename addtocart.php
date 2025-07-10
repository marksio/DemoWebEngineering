<?php

	date_default_timezone_set('Asia/Kuala_Lumpur');

		



  if(isset($_GET['add']))

  {

    if(!isset($_SESSION["login-username"]))

  {

    echo '

              <script language="javascript">alert("You must be a registered user to add to cart. Please register.");</script>

       <meta http-equiv="refresh" content="0;URL=login.php" /> 

       ';

  }

  else

  {

    $sum = 0;

    $minus = 0;



    $username =  $_SESSION["login-username"];

  	$sysDate = date('Y-m-d H:i:s');

  	$bookcid = test_input($_GET['id']);

  	$getquantity = test_input($_GET['quantity']);

    

    		$bookcid = mysqli_real_escape_string($connect, $_GET['id']);

    		$getquantity = mysqli_real_escape_string($connect, $_GET['quantity']);



      $result = $connect->query("SELECT stock FROM books WHERE id='$bookcid'");

                  

          while ($row = $result->fetch_assoc()) {

             $stock = $row['stock'];

          }



          if($stock == 0)

          {

            echo '

              <script language="javascript">alert("Selected Book is not available!")</script>

              <meta http-equiv="refresh" content="0;URL=index.php" /> 

            ';

          }

          else

          {



    		$result = $connect->query("SELECT cid FROM user WHERE username='$username'");

                  

          while ($row = $result->fetch_assoc()) {

             $usercid = $row['cid'];

          }



  	     $result = $connect->query("SELECT price FROM books WHERE id='$bookcid'");

                  

          while ($row = $result->fetch_assoc()) {

             $price = $row['price'];

          }



          $sum = $price * $getquantity;



          $minus = $stock - $getquantity;



    		  $query = "UPDATE books SET stock='$minus' WHERE id='$bookcid'";

          $connect->query($query);

            

              



          $query = "INSERT INTO purchase(user_cid, books_cid, quantity, sys_time, sum_price) VALUES ('$usercid', '$bookcid', '$getquantity', '$sysDate', '$sum')";

          if($connect->query($query) === TRUE)

          {

            echo '

              <script language="javascript">alert("Add to Cart Successfully!")</script>

              <meta http-equiv="refresh" content="0;URL=index.php"/> 

            ';

          }

          else

          {

              echo "Error: " . $query . "<br>" . $connect->error;

          }

        }

		}



  }

?>
