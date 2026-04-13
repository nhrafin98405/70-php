<?php 

// md5

// $pass ="123";
$ps ="ajke to mone hoi na cls ache";

// echo md5($pass);

echo "<br>";


// sha 

// echo hash("SHA512","admin@ ");

// echo "<br>";
// echo hash("SHA384","admin@ ");

// echo "<br>";
// echo hash("SHA256","admin@ ");

// echo "<br>";
// echo hash("SHA224","admin@ ");

echo "<br>";
echo password_hash($ps,PASSWORD_DEFAULT);

echo "<br>";

// $rafin ="$2y$10$/CIwq51v8pBZpYbhAEzcjOY7WR.OnO7qfaBvpFBVHlhp5ivlP8bFe";
// $verifi = password_hash($ps,PASSWORD_DEFAULT);

echo "<br>";

// PASS CHECK 

// if(password_verify($ps,$rafin)){
//     echo "valid";
// }else{
//     echo"invalid";
// }


echo "<br>";

$psw ="ajke to mone hoi na cls ache";
$key ="s1234";
$method ="AES-128-CTR";



$encrypted = openssl_encrypt($psw,$method,$key);

$decreapted = openssl_decrypt("$encrypted",$method,$key);


echo "original :" .$psw."<br>";
echo "original :" .$encrypted."<br>";
echo "original :" .$decreapted."<br>";



echo "<br>";






echo "<br>";
echo "<br>";
echo "<br>";





?>