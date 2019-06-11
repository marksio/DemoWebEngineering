<?php
	include_once('header.php');

    date_default_timezone_set('Asia/Kuala_Lumpur');

	if(!isset($_SESSION['login-username']) || !isset($_SESSION['total_amount']) || !isset($_SESSION['total_quantity']))
    {
        header("location: index.php");
    }

    $username =  $_SESSION["login-username"];

    $result = $connect->query("SELECT cid FROM user WHERE username='$username'");
              
    while ($row = $result->fetch_assoc()) 
    {
        $usercid = $row['cid'];
    }


    $sql_getAllPurchase = "SELECT user.name, user.email, user.address, purchase.cid
            FROM  purchase
            JOIN user ON purchase.user_cid = user.cid WHERE user.cid='$usercid'";
    $result_AllPurchase = $connect->query($sql_getAllPurchase);

    if($result_AllPurchase->num_rows > 0)
    {
        while($row = $result_AllPurchase->fetch_assoc())
        {
            $purchase_cid = $row['cid'];
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
        }
    }

	// Payment to Remove all the purchase item             
	if(isset($_POST['pay']))
	{
        $sysDate = date('Y-m-d H:i:s');
        $new_name = test_input($_POST['name']);
        $new_email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $new_address = test_input($_POST['address']);
        $paid = test_input($_POST['paid']);

        $new_name = mysqli_real_escape_string($connect, $_POST['name']);
        $new_email = mysqli_real_escape_string($connect, $_POST['email']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $new_address = mysqli_real_escape_string($connect, $_POST['address']);
        $paid = mysqli_real_escape_string($connect, $_POST['paid']);

        $card_name = test_input($_POST['card_name']);
        $card_number = test_input($_POST['card_number']);
        $card_expire = test_input($_POST['card_expire']);
        $card_cvc = test_input($_POST['card_cvc']);

        if($result_AllPurchase->num_rows == 0)
        {
            echo '<script language="javascript">alert("You have not purchase any item!")</script>
                <meta http-equiv="refresh" content="0;URL=index.php" /> 
            ';
        }
        else
        {
            if(empty($new_name) || empty($new_address) || empty($new_email) || empty($phone) || empty($card_name) || empty($card_number) || empty($card_expire) || empty($card_cvc) || empty($paid))
            {
                echo '<script language="javascript">alert("All fields must be filled")</script>';
            }
            else
            {
                if(strlen($new_name) < 2 || strlen($new_address) < 10 || strlen($new_email) < 10  || strlen($phone) < 10 || strlen($card_name) < 2 || strlen($card_number) < 15 || strlen($card_expire) < 2  || strlen($card_cvc) < 2)
                {
                    echo '<script language="javascript">alert("Full Name, Card Holder Name, Card Expire, Card CVC must have at least 3 characters. Email, Phone Number and address have at least 10 characters. Card Number must have at least 16 characters.")</script>';
                }
                else
                {
                    $addAllPayment = "INSERT INTO payment (purchase_cid, paid, sys_time) VALUES ('$purchase_cid', '$paid', '$sysDate')";

                    $query = "DELETE FROM purchase WHERE user_cid='$usercid'";

                    if($connect->query($addAllPayment) === TRUE && $connect->query($query) === TRUE)
                    {
                        if($new_email != $email && $new_address != $address && $new_name != $name)
                        {
                            $addAllDelivery = "INSERT INTO delivery (user_cid, name, address, email, phone) VALUES ('$usercid', '$new_name','$new_address', '$new_email', $phone)";
                            $connect->query($addAllDelivery);                            
                        }
                        else
                        {
                            $result = $connect->query("SELECT name, email, address, username  FROM user WHERE cid='$usercid'");
                                                  
                            while ($row = $result->fetch_assoc()) 
                            {
                                $name = $row['name'];
                                $email = $row['email'];
                                $address = $row['address'];
                                $username = $row['username'];
                            }

                            $addAllDelivery = "INSERT INTO delivery (user_cid, name, address, email, phone) VALUES ('$usercid', '$name', '$address', '$email', $phone)";
                            $connect->query($addAllDelivery);                            
                        }
                        echo '
                          <script language="javascript">alert("Paid Successfully!")</script>
                          <meta http-equiv="refresh" content="0;URL=index.php"/> 
                        ';
                        
                    }
                }
            }
        }
	}
    
?>
<div class="container">
	<div class="row">
		<div class="box">
			<div class="col-lg-12 text-center">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Payment on Purchase Books</strong>
                </h2>
                <hr>
            </div>   
                <form role="form" method="POST" class="form-horizontal" >
                    <div class="row"> 
                        <div class="form-group col-lg-12">
							<div class="form-group" style="display: none">
                                <label class="control-label col-sm-5" for="modal_editPurchaseInfo_id">id</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="modal_editPurchaseInfo_id" id="modal_editPurchaseInfo_id" placeholder="id">
                                </div>
                            </div>
                            <div style="width: 100%;">
                            <div style="float: right; width: 45%;">
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="name">User Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="email">User Email</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="phone">Contact No.</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="address">Mail to Address</label>
                                <div class="col-sm-7">
                                    <textarea text="text" style="resize: none;" class="form-control" rows="5" cols="60" name="address" value="<?php echo $address; ?>"><?php echo $address; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="quantity">Quantity of Item Purchased</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="quantity" readonly="<?php echo $_SESSION['total_quantity']; ?>" placeholder="<?php echo $_SESSION['total_quantity']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="paid">Amount to Pay</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="paid" readonly="<?php echo $_SESSION['total_amount']; ?>" placeholder="<?php echo $_SESSION['total_amount']; ?> " value="<?php echo $_SESSION['total_amount']; ?> ">
                                    
                                </div>
                            </div>
                            </div>
                            <div style="float: left; width: 45%;">
                            <img src="http://www.eposnow.com/skin/frontend/eposnow/default/img/footer-card-logos.png" style="max-width: 60%; margin-left: 20%; margin-right: 20%; margin-bottom: 40px;">
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="card_name">Card Holder Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="card_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="card_number">Card Number</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="card_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="card_expire">Expire Data</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="card_expire">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5" for="card_cvc">CVC</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="card_cvc">
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-default" name="pay" style="width: 100%; margin-top: 30px; font-size: 20px;">Pay Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
<?php 
	include_once'footer.php';
?>