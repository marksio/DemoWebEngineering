<?php

	include_once('header.php');



	if(!isset($_SESSION['login-username']))

    {

        header("location: index.php");

    }



  

	$username =  $_SESSION["login-username"];



	$result = $connect->query("SELECT cid FROM user WHERE username='$username'");

              

    while ($row = $result->fetch_assoc()) 

    {

        $usercid = $row['cid'];

    }





	$sql_getAllPurchase = "SELECT purchase.cid, user.name, purchase.sys_time, books.id, books.title, purchase.quantity, purchase.sum_price

            FROM  purchase

            JOIN user ON purchase.user_cid = user.cid

            JOIN books ON purchase.books_cid = books.id WHERE user.cid='$usercid'";

    $result_AllPurchase = $connect->query($sql_getAllPurchase);       		



    // Update Purchase Quantity

	if(isset($_GET['do_UpdatePurchaseInformation']))

	{

        $puchase_cid = $_GET['modal_editPurchaseInfo_id'];

        $puchase_quantity = test_input($_GET['modal_editPurchaseInfo_quantity']);



        if(empty($puchase_quantity) || strlen($puchase_quantity) < 0)

        {

            echo '<script language="javascript">alert("Quantity must be filled!")</script>';

        }

        else

        {

            $sum = 0;

            $minus = 0;

            $add = 0;

            

            $result = $connect->query("SELECT stock FROM books LEFT JOIN purchase ON purchase.books_cid = books.id WHERE cid='$puchase_cid'");

                  

          while ($row = $result->fetch_assoc()) {

             $stock = $row['stock'];

          }



          if($stock == 0)

          {

            echo '

              <script language="javascript">alert("Selected Book is not available!")</script>

              <meta http-equiv="refresh" content="0;URL=index.php"/> 

            ';

          }

          else

          {

            $result = $connect->query("SELECT price FROM books LEFT JOIN purchase ON purchase.books_cid = books.id WHERE cid='$puchase_cid'");

                  

            while ($row = $result->fetch_assoc()) {

                $price = $row['price'];

            }



              $sum = $price * $puchase_quantity;



              $result = $connect->query("SELECT quantity FROM purchase WHERE books_cid='$bookcid'");

                  

          while ($row = $result->fetch_assoc()) {

             $puchase_quantity_db = $row['quantity'];

          }



              $add = $stock + $puchase_quantity_db;;



              $minus = $stock - $puchase_quantity;





            $query = "UPDATE purchase SET quantity='$puchase_quantity', sum_price='$sum' WHERE cid='$puchase_cid'";

            if($connect->query($query) === TRUE)

            {

                echo '<script language="javascript">alert("Update item Quantity in Cart Successfully!")</script>

                <meta http-equiv="refresh" content="0;URL=cart.php"/> 

                ';



            }

            else

            {

                echo "Error: " . $query . "<br>" . $connect->error;

            }

        }

        }

	}

    

    // Delete Purchase Item         

	if(isset($_GET['do_purchaseInformation_DeleteRow']))

	{

        $puchase_cid = $_GET['purchaseInformation_delete_purchaseID'];

        $query = "DELETE FROM purchase WHERE cid='$puchase_cid'";

        if($connect->query($query) === TRUE)

        {

         	echo '<script language="javascript">alert("Remove item in Cart Successfully!")</script>

                <meta http-equiv="refresh" content="0;URL=cart.php"/>

            ';

        }

        else

        {

            echo "Error: " . $query . "<br>" . $connect->error;

        }  

	}

    

    // Pay now to link to payment page            

	if(isset($_GET['add']))

	{

    header('Location: payment.php');   

  }



	include('cart_include.php');	

	include_once'footer.php';

?>
