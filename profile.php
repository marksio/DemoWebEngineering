<title>Book Store | User Profile Setting</title>

<?php

	include_once('header.php');

    

	$user_name = $_SESSION['login-username'];



	if(!isset($_SESSION['login-username']))

    {

        header("location: index.php");

    }

    

    // Display User Info

    if(isset($_SESSION['login-username']))

    {

    	$sql_getUserInfo="SELECT name, email, username, password, address FROM user WHERE username='$user_name'";

    	$result = $connect->query($sql_getUserInfo);

    	

        if($result->num_rows == 1)

        {

    		while($row = $result->fetch_assoc())

    		{

                $name = $row["name"];

                $email = $row["email"];

                $address = $row['address'];

    			$password = $row["password"];

    		}

    	}

    	else

    	{

    		echo "Error: " . $connect->error;

    	}

    }

    



	// Change User Password

    if(isset($_POST['do_User_ChangePassword']))

    {

    	$old_password = test_input($_POST['old_password']);

    	$new_password = test_input($_POST['new_password']);

    	$confirm_password = test_input($_POST['confirm_new_password']);



    	$Eold_password = sha1($old_password);

    	$Enew_password = sha1($new_password);

    	

    	$sql_getUserInfo1 = "SELECT password from user WHERE username='$user_name'";

    	$result = $connect->query($sql_getUserInfo1);

    	

    	if($result->num_rows == 1)

    	{

    		while($row = $result->fetch_assoc())

    		{

    			if(empty($old_password) || empty($new_password) || empty($confirm_password))

				{

					echo '<script language="javascript">alert("All field must be fill up")</script>';

				}

				else

				{

					if(strlen($old_password) < 7 || strlen($new_password) < 7 || strlen($confirm_password) < 7)

					{

						echo '<script language="javascript">alert("Password must have at least 8 characters.")</script>';

					}

					else

					{

						if($Eold_password === $row['password'])

	    				{

	    					if($new_password === $confirm_password)

	    					{

		    					$sql_changeUserPassword = "UPDATE user SET password='$Enew_password' WHERE username='$user_name'";

		    					if($connect->query($sql_changeUserPassword) === TRUE)

		    					{

		    						echo '<script language="javascript">alert("Password updated successfully!")</script>

		    						<meta http-equiv="refresh" content="0">

		    						';

		    					}

		    					else

		    					{

		    						echo "Error: " . $connect->error;

		    					}

					    	}

					    	else

					    	{

					    		echo '<script language="javascript">alert("New Password & Confirm Password does not match! Please try again.")</script>';

					    	}

		    			}

		    			else

		    			{

							echo '<script language="javascript">alert("Wrong old password! Please try again.")</script>';

		    			}

					}

				}

		    }

		}			

    }

        

    // Change User House Address

    if(isset($_POST['do_User_ChangeAddress']))

    {

    	$new_address = test_input($_POST['new_address']);

    	$confirm_new_address = test_input($_POST['confirm_new_address']);

    	

    	if (empty($new_email) || empty($confirm_new_address) || strlen($new_email) < 20 || strlen($confirm_new_address) < 20)

    	{

    		if($new_address === $confirm_new_address)

    		{

	    		$sql_changeUserAddress = "UPDATE user SET address='$new_address' WHERE username='$user_name'";

	    		if($connect->query($sql_changeUserAddress) === TRUE)

	    		{

	    			echo '

	    			<script language="javascript">alert("House Address Updated Successfully!")</script>

	    			<meta http-equiv="refresh" content="0">

	    			';

	    		}

	    		else

	    		{

	    			echo "Error: " . $connect->error;

	    		}

	    	}

	    	else

	    	{

	    		echo '<script language="javascript">alert("House Address does not match! Please try again.")</script>';

	    	}

	    }

    }

    

    // Change User Name

    if(isset($_POST['do_User_ChangeName']))

    {

    	$new_name = test_input($_POST['new_name']);

    	$confirm_new_name = test_input($_POST['confirm_new_name']);

    	

		if(empty($new_name) || empty($confirm_new_name))

		{

			echo '<script language="javascript">alert("All field must be fill up")</script>';

		}

		else

		{

			if(strlen($new_name) < 2 || strlen($confirm_new_name) < 2)

			{

				echo '<script language="javascript">alert("Name must must have at least 3 characters.")</script>';

			}

			else

			{

				if($new_name === $confirm_new_name)

				{

					$sql_changeUserName = "UPDATE user SET name='$new_name' WHERE username='$user_name'";

					if($connect->query($sql_changeUserName) === TRUE)

					{

						echo '<script language="javascript">alert("Name Updated Successfully!")</script>

							<meta http-equiv="refresh" content="0">

		    				';

					}

					else

					{

						echo "Error: " . $connect->error;

					}

				}

				else

				{

					echo '<script language="javascript">alert("Name does not match! Please try again.")</script>';

				}

			}

		}		

    } 



    // Delete User own Account        

	if(isset($_GET['do_accountInformation_DeleteAccount']))

	{

        $username = $_GET['get_userInformation_DeleteAccount'];

        $query = "DELETE FROM user WHERE username='$username'";

        if($connect->query($query) === TRUE)

        {

         	echo '

                <meta http-equiv="refresh" content="0;URL=logout.php"/>

            ';

        }

        else

        {

            echo "Error: " . $query . "<br>" . $connect->error;

        }  

	}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container-fluid">

    <div class="row">

        <div class="box">

        	<div class="col-lg-12 text-right">

                <button type="button" class="btn btn-danger get_userInformation_DeleteAccount" data-toggle="modal" data-target="#modal_delete_account"><span class="glyphicon glyphicon-remove"></span>&nbsp; Delete My Account</button>

            </div>



            <!-- Delete Purchase Modal -->

            <div class="modal fade" id="modal_delete_account" tab-index="-1">

                <div class="modal-dialog modal-sm">

                    <div class="modal-content">

                        <div class="modal-header">

                            <strong>Confirm?</strong>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>

                        <div class="modal-body">

                            <form method="GET">

                                <input hidden type="text" name="get_userInformation_DeleteAccount" id="get_userInformation_DeleteAccount" placeholder="PurchaseID" value="<?php echo $_SESSION["login-name"] ?>">

                                <label><font color="red">Delete Your current account permantently?<br><br>All Your information will be deleted from our system and will redirected to logout.</font></label><br><br><br>

                                <button type="submit" class="btn btn-success" name="do_accountInformation_DeleteAccount">Yes</button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>



            <div class="col-lg-12 text-center">

                <hr>

                <h2 class="intro-text text-center"><?php echo $_SESSION["login-name"] ?>

                    <strong> Profile Setting</strong>

                </h2>

                <hr>

            </div>



			<div style="margin-left: 10%; margin-right: 10%;">

				<table id="profile-table" class="table table-striped table-bordered table-condensed table-responsive table-hover" cellspacing="0" width="100%" >

					<thead>

						<tr>

							<th><span style="color:green;"><strong><span class="glyphicon glyphicon-list-alt"></span> Information</strong></span></th>

							<th><span style="color:green;"><strong><span class="glyphicon glyphicon-stats"></span> Detail</strong></th>

							<th><span style="color:green;"><strong><span class="glyphicon glyphicon-cog"></span> Action</strong></th>

						</tr>

					</thead>

					<tbody>

					    <tr>

			                <td><span class="glyphicon glyphicon-user"></span> Name</td>

			                <td><?php echo $name; ?></td>

			                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#user_change_name"><span class="glyphicon glyphicon-pencil"></span></button></td>

			            </tr>

					    <tr>

			                <td><span class="glyphicon glyphicon-envelope"></span> Email</td>

			                <td><?php echo $email; ?></td>

			                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#user_change_email"><span class="glyphicon glyphicon-pencil"></span></button></td>

			            </tr>

			            <tr>

			                <td><span class="glyphicon glyphicon-gift"></span>House Address</td>

			                <td><?php echo $address; ?></td>

			                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#user_change_address"><span class="glyphicon glyphicon-pencil"></span></button></td>

			            </tr>

						<tr>

			                <td><span class="glyphicon glyphicon-user"></span> Username</td>

			                <td><?php echo $user_name; ?></td>

			                <!--<td><button type="button" class="btn btn-warning btn-sm" title="Edit Username" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></td>-->

			                <td></td>

			            </tr>

			            <tr>

			                <td><span class="glyphicon glyphicon-lock"></span> Password</td>

			                <td><?php echo $password; ?></td>

			                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#user_change_password"><span class="glyphicon glyphicon-pencil"></span></button></td>

			            </tr>

					</tbody>

				</table>

			</div>

			

			<!-- Change Password Modal -->

			<div class="modal fade" id="user_change_password" tab-index="-1">

				<div class="modal-dialog modal-lg">

	                    <div class="modal-content">

	                        <div class="modal-header">

	                            <strong>User - Change Password</strong>

	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	                        </div>

	                        <div class="modal-body">

	                        	<div class="container-fluid">

	                        		<form class="form-horizontal" action="" method="post" role="form">

									    <div class="form-group">

									    	<label class="control-label col-sm-2" for="old_password">Old Password</label>

									    	<div class="col-sm-10">

									    		<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">

									    	</div>

									    </div>

									    <div class="form-group">

									    	<label class="control-label col-sm-2" for="new_password">New Password:</label>

									    	<div class="col-sm-10">

									    		<input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">

									    	</div>

									    </div>

									    <div class="form-group">

									    	<label class="control-label col-sm-2" for="confirm_new_password">Confirm New Password:</label>

									    	<div class="col-sm-10">

									    		<input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password">

									    	</div>

									    </div>

									    <div class="form-group">

									    	<div class="col-sm-offset-2 col-sm-10">

									    		<button type="submit" class="btn btn-success" name="do_User_ChangePassword">Submit</button>

		                                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

									    	</div>

									    </div>

								    </form>

								</div>

	                        </div>

	                    </div>

	                </div>

	            </div>

	        </div>

	            

            <!-- Change Email Modal -->

            <div class="modal fade" id="user_change_email" tab-index="-1">

            	<div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <strong>User - Change Email</strong>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>

                        <div class="modal-body">

                        	<div class="container-fluid">

                        		<form class="form-horizontal" method="post" role="form">

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="new_email">New Email:</label>

								    	<div class="col-sm-10">

								    		<input type="email" class="form-control" name="new_email" id="new_email" placeholder="New Email">

								    	</div>

								    </div>

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="confirm_new_email">Confirm Email:</label>

								    	<div class="col-sm-10">

								    		<input type="email" class="form-control" name="confirm_new_email" id="confirm_new_email" placeholder="Confirm New Email">

								    	</div>

								    </div>

								    <div class="form-group">

								    	<div class="col-sm-offset-2 col-sm-10">

								    		<button type="submit" class="btn btn-success" name="do_User_ChangeEmail">Submit</button>

	                                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

								    	</div>

								    </div>

							    </form>

							</div>

                        </div>

                    </div>

                </div>

            </div>



            <!-- Change Address Modal -->

            <div class="modal fade" id="user_change_address" tab-index="-1">

            	<div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <strong>User - Change House Address</strong>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>

                        <div class="modal-body">

                        	<div class="container-fluid">

                        		<form class="form-horizontal" method="post" role="form">

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="new_address">New House Address:</label>

								    	<div class="col-sm-10">

								    		<textarea type="text" style="resize: none;" class="form-control" rows="3" name="new_address" id="new_address" placeholder="New Address"></textarea>

								    	</div>

								    </div>

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="confirm_new_address">Confirm House Address:</label>

								    	<div class="col-sm-10">

								    		<textarea type="text" style="resize: none;" class="form-control" rows="3" name="confirm_new_address" id="confirm_new_address" placeholder="Confirm New Address"></textarea>

								    	</div>

								    </div>

								    <div class="form-group">

								    	<div class="col-sm-offset-2 col-sm-10">

								    		<button type="submit" class="btn btn-success" name="do_User_ChangeAddress">Submit</button>

	                                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

								    	</div>

								    </div>

							    </form>

							</div>

                        </div>

                    </div>

                </div>

            </div>

                       

            <!-- Change Name Modal -->

            <div class="modal fade" id="user_change_name" tab-index="-1">

            	<div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header">

                            <strong>Change Name</strong>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>

                        <div class="modal-body">

                        	<div class="container-fluid">

                        		<form class="form-horizontal" action="" method="post" role="form">

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="new_name">New Name:</label>

								    	<div class="col-sm-10">

								    		<input type="text" class="form-control" name="new_name" id="new_name" placeholder="New Name">

								    	</div>

								    </div>

								    <div class="form-group">

								    	<label class="control-label col-sm-2" for="confirm_new_name">Confirm Name:</label>

								    	<div class="col-sm-10">

								    		<input type="text" class="form-control" name="confirm_new_name" id="confirm_new_name" placeholder="Confirm New Name">

								    	</div>

								    </div>

								    <div class="form-group">

								    	<div class="col-sm-offset-2 col-sm-10">

								    		<button type="submit" class="btn btn-success" name="do_User_ChangeName">Submit</button>

	                                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

								    	</div>

								    </div>

							    </form>

							</div>

                        </div>

                    </div>

                </div>

            </div>

		</div>

	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->

<script src="js/bootstrap.min.js"></script>

<?php

    include_once('footer.php');

?>