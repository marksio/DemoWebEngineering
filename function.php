<?php
include('connect.php');
session_start();
	$username = $_SESSION['login-username'];

        $result = $connect->query("SELECT cid FROM user WHERE username='$username'");
                      
                while ($row = $result->fetch_assoc()) {
                   $usercid = $row['cid'];
                }

        $result = $connect->query("SELECT * FROM purchase WHERE user_cid='$usercid'");
        $length = mysqli_fetch_lengths($result);

        echo $length;
      ?>