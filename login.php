<title>Book Store | Login</title>



<?php

  include_once('header.php');

    

    // To check user session availability, if yes then direct to index page

  if(isset($_SESSION['login-username']))

    {

        header("location: index.php");

    }



    // Login Function

  if(isset($_POST['login-submit']))

  { // check user whether clicked login button or not

      $L_username = test_input($_POST['L_username']);

      $L_password = test_input($_POST['L_password']);

  

      $L_username = mysqli_real_escape_string($connect, $_POST['L_username']);

      $L_password = mysqli_real_escape_string($connect, $_POST['L_password']);

      $L_password = sha1($L_password);
      

      $query = "SELECT cid, name, username, password, level FROM user WHERE username='$L_username' AND password='$L_password'";

      $result = $connect->query($query); // Execute query, result will store in $result



      if($result->num_rows == 1)

      { 

          while($row = $result->fetch_assoc())

          {

              if(!$row['username'] == $L_username && !$row['password'] == $L_password)

              {

                echo '<script language="javascript">alert("Username or password is incorrect")</script>';

              }

              else 

              {

                
                  $_SESSION["login-cid"] = $row['cid'];

                  $_SESSION["login-username"] = $row['username'];

                  $_SESSION["login-level"] = $row['level'];

                  $_SESSION["login-name"] = $row['name'];

                  

                  if(isset($_POST['L_rememberme']))

                  {

                      setcookie('L_username', $_POST['L_username'], time()+60*60*24); // expire in millisecond (1 day)

                      setcookie('L_password', $_POST['L_password'], time()+60*60*24);

                  }

                  header('Location: index.php');

                  

              }

              

          }

      }

  }

 

      

  if(isset($_POST['register-submit']))

  { // check user whether clicked register button or not

    $R_name = test_input($_POST['R_name']);

    $R_email = test_input($_POST['R_email']);

    $R_address = test_input($_POST['R_address']);

    $R_username = test_input($_POST['R_username']);

    $R_password = test_input($_POST['R_password']);

    $R_confirm_password = test_input($_POST['R_confirm-password']);



    $R_name = mysqli_real_escape_string($connect, $_POST['R_name']);

    $R_email = mysqli_real_escape_string($connect, $_POST['R_email']);

    $R_address = mysqli_real_escape_string($connect, $_POST['R_address']);

    $R_username = mysqli_real_escape_string($connect, $_POST['R_username']);

    $R_password = mysqli_real_escape_string($connect, $_POST['R_password']);

    $R_confirm_password =  mysqli_real_escape_string($connect, $_POST['R_confirm-password']);

    $Encryptpw = sha1($R_password);



    // Empty

    // Password Match

    // Username at least 8 character

    // Password at least 8 character

  

    if(empty($R_name) || empty($R_username) || empty($R_password) || empty($R_confirm_password) || empty($R_email) || empty($R_address))

    {

        echo '<script language="javascript">alert("All fields must be filled")</script>';

    }

    

    else if (filter_var($R_email, FILTER_VALIDATE_EMAIL))

    {

        if(strlen($R_name) < 2 || strlen($R_username) < 2 || strlen($R_password) < 7 || strlen($R_confirm_password) < 7 || strlen($R_address) < 7)

        {

            echo '<script language="javascript">alert("Your name and Username must have at least 3 characters. Password must have at least 8 characters")</script>';

        }

        else

        {

            if($R_password != $R_confirm_password)

            {

                echo '<script language="javascript">alert("Password & Confirm password does not match!")</script>';

            }

            else 

            {

              $query = "SELECT username FROM user WHERE username='$R_username' OR email='$R_email' OR address='R_address'";

              $result = $connect->query($query); // Execute query, result will store in $result

               

              if($result->num_rows > 0)

              { 

                echo '<script language="javascript">alert("Duplicate User Found")</script>';

              }

              else

              {

                $query = "INSERT INTO user(name, email, address, username, password, level) VALUES ('$R_name', '$R_email', '$R_address', '$R_username', '$Encryptpw', '2')";

                if($connect->query($query) === TRUE)

                {

                  echo '<script language="javascript">alert("Register Successfully!")</script>

                          <meta http-equiv="refresh" content="0;URL=login.php"/>

                      ';

                }

                else

                {

                  echo "Error: " . $query . "<br>" . $connect->error;

                }

              }

            }

           

        }

    }

        

  }

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/login.css">

<!-- Login and register-->

<div class="container">

 <div class="row">

  <div class="col-md-6 col-md-offset-3">

    <div class="panel panel-login">

      <div class="panel-heading">

        <div class="row">

          <div class="col-xs-6 tabs">

            <a class="active" id="login-form-link"><div class="login">LOGIN</div></a>

          </div>

          <div class="col-xs-6 tabs">

            <a id="register-form-link"><div class="register">REGISTER</div></a>

          </div>

        </div>

      </div>

      

      <div class="panel-body">

        

        <div class="row">

          

          <div class="col-lg-12">

             

            <!--login form-->

            <form id="login-form" method="post" role="form" style="display: block;">

              <h2>LOGIN</h2>

                <div class="form-group">

                  <input type="text" name="L_username" id="L_username" tabindex="1" class="form-control" placeholder="Username">

                </div>

                <div class="form-group">

                  <input type="password" name="L_password" id="L_password" tabindex="2" class="form-control" placeholder="Password">

                </div>

                <div class="col-xs-6 form-group pull-left checkbox">

                  <input id="checkbox1" type="checkbox" name="L_rememberme">

                  <label for="checkbox1">Remember Me</label>   

                </div>

                <div class="col-xs-6 form-group pull-right">     

                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">

                </div>

            </form>

            

            <!--register form-->

            <form id="register-form" method="post" role="form" style="display: none;">

              <h2>REGISTER</h2>

                <div class="form-group">

                  <input type="text" name="R_name" id="R_name" tabindex="1" class="form-control" placeholder="Full Name">

                </div>

                <div class="form-group">

                  <input type="email" name="R_email" id="R_email" tabindex="1" class="form-control" placeholder="@gmail.com / @yahoo.com / @outlook.com">

                </div>

                <div class="form-group">

                  <input type="text" name="R_address" id="R_address" tabindex="1" class="form-control" placeholder="Mail to Address">

                </div>

                <div class="form-group">

                  <input type="text" name="R_username" id="R_username" tabindex="1" class="form-control" placeholder="Username">

                </div>

                <div class="form-group">

                  <input type="password" name="R_password" id="R_password" tabindex="2" class="form-control" placeholder="Password">

                </div>

                <div class="form-group">

                  <input type="password" name="R_confirm-password" id="R_confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">

                </div>

                <div class="form-group">

                  <div class="row">

                    <div class="col-sm-6 col-sm-offset-3">

                      <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">

                    </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/login.js"></script>



<?php

  include_once('footer.php');

?>

