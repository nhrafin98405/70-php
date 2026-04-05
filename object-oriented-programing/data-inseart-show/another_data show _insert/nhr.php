<?php

require_once("nhr_class.php");
if(isset($_POST["btnsubmit"])){


    $uname = $_POST["name"];
    $uemail = $_POST["email"];
    $uid = $_POST["id"];

    $r =new Nhr($uname, $uid, $uemail);
    $r->store();
    echo "successfully add";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="#" method="post">

<label for="name">Name</label>
<input type="text" name="name"> <br>
<label for="name">email</label>
<input type="email" name="email"> <br>
<label for="id">ID</label>
<input type="number" name="id"><br>
<input type="submit" name="btnsubmit">
</form>
    
</body>
</html>