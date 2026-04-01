<?php




$result = fopen("f-read.txt","r") or die("file is not found");


echo fread($result,filesize("f-read.txt"));

fclose($result);

echo "<br>";

readfile("f-read.txt");

echo "<br>";

echo readfile("f-read.txt");





?>