<?php session_start();

 unset($_SESSION["rname"]);
 session_destroy();
 header("location:log-in2.php");
 exit()
?>