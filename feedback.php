<title>Book Store | Feedback</title>
<?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
    
    include_once('header.php');
    
    if (!isset($_SESSION["login-username"]))
    {    
        
        echo '
            <div class="container">
                <div class="row">
                    <div class="box">
                        <div class="col-lg-12 text-center">
                             <hr>
                            <h2 class="intro-text text-center">
                                <strong>Feedback</strong>
                                On Book Store
                            </h2>
                            <hr>
                        </div>
                        
                        <div class="col-lg-8-center">
                            <form role="form" method="POST">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label><p>Full Name</p></label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label><p>Email Address</p></label>
                                        <input type="email" class="form-control" name="email" placeholder="@gmail.com / @yahoo.com / @outlook.com">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-12">
                                        <label><p>Feedback Message</p></label>
                                        <textarea class="form-control" style="resize: none;" rows="6" name="message" placeholder="Feedback Message"></textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" name="save" value="comment">
                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
    
        
        if(isset($_POST['submit']))
        {
            $sysDate = date('Y-m-d H:i:s');
            $name = test_input($_POST['name']);
            $email = test_input($_POST['email']);
            $phone = test_input($_POST['phone']);
            $message = test_input($_POST['message']);
            
            $name = mysqli_real_escape_string($connect, $_POST['name']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $phone = mysqli_real_escape_string($connect, $_POST['phone']);
            $message = mysqli_real_escape_string($connect, $_POST['message']);
          
          
            // Empty
            // Password Match
            // Username at least 8 character
            // Password at least 8 character
            
            if(empty($message) || empty($name) || empty($email))
            {
                echo '<script language="javascript">alert("All fields must be filled")</script>';
            }
            else
            {
                if(strlen($message) < 10 || strlen($name) < 3 || strlen($email) < 10)
                {
                    echo '<script language="javascript">alert("Full Name must have at least 3 characters. Email, Phone Number and Message 
                    have at least 10 characters.")</script>';
                }
                else
                {
                    $query = "INSERT INTO guest_comment (name, email, message, sys_time) VALUES ('$name', '$email', '$message', '$sysDate')";
                    if($connect->query($query) === TRUE)
                    {
                        echo '<script language="javascript">alert("Feedback Successfully Submitted !")</script>';
                        // header("location: technocity/index.php");
                    }
                    else
                    {
                        echo "Error: " . $query . "<br>" . $connect->error;
                    }
                    
                }
            }
        }
        
    }
    else
    {
        echo '
             <div class="container">
                <div class="row">
                    <div class="box">
                        <div class="col-lg-12 text-center">
                             <hr>
                            <h2 class="intro-text text-center">
                                <strong>Feedback</strong>
                                On Book Store
                            </h2>
                            <hr>
                        </div>
                        
                        <div class="col-lg-8-center">
                            <form role="form" method="POST">
                                <div class="row">   
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-12">
                                        <label><p>Feedback Message</p></label>
                                        <textarea class="form-control" style="resize: none; "rows="6" name="message" placeholder="Feedback Message"></textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" name="save" value="contact">
                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
       
    
        if(isset($_POST['submit']))
        {
            $username =  $_SESSION["login-username"];
            $sysDate = date('Y-m-d H:i:s');
            $message = test_input($_POST['message']);
            
            $message = mysqli_real_escape_string($connect, $_POST['message']);
          
          
            // Empty
            // Password Match
            // Username at least 8 character
            // Password at least 8 character
            
            if(empty($message))
            {
                echo '<script language="javascript">alert("All fields must be filled")</script>';
            }
            else
            {
                if(strlen($message) < 10)
                {
                    echo '<script language="javascript">alert("Message have at least 10 characters.")</script>';
                }
                else
                {
                   
                    $result = $connect->query("SELECT cid FROM user WHERE username='$username'");
                    
                    while ($row = $result->fetch_assoc()) {
                       $usercid = $row['cid'];
                    }
                                    
                    
                    $query = "INSERT INTO comment (message, sys_time, user_cid) VALUES ('$message', '$sysDate', '$usercid')";
                    if($connect->query($query) === TRUE)
                    {
                        echo '<script language="javascript">alert("Feedback Successfully Submitted !")</script>';
                        // header("location: technocity/index.php");
                    }
                    else
                    {
                        echo "Error: " . $query . "<br>" . $connect->error;
                    }
                    
                }
            }
        }
    }
    
    include_once('footer.php');  
?>
