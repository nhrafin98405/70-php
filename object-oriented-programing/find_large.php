<?php

echo "Enter first number: ";
$a = (int) readline();

echo "Enter second number: ";
$b = (int) readline();

echo "Enter third number: ";
$c = (int) readline();

$largest = ($a > $b && $a > $c) ? $a : (($b > $c) ? $b : $c);

echo "Largest number is: " . $largest;

?>