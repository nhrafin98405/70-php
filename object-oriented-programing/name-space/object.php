<?php



require_once("car_class.php");
require_once("user_class.php");
require_once("user_class2.php");

use UserOne\Done;
use UserOne\Done as Useer2;

$result = new Car();
$result->CarInfo();

$result = new Done();
$result->userInfo();


$result = new Useer2();
$result->userInfo();
$result->phoneInfo();


?>