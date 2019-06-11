<?php



    require("connect.php");

    session_start();

    

    echo '

    <script language="javascript">alert("Logout Successfully.")</script>

    <meta http-equiv="refresh" content="0;index.php" />

    ';

    

    session_destroy();

    session_unset();

    

    setcookie("L_username", "", time()-60000);

    setcookie("L_password", "", time()-60000);

   

    $connect->close();

?>