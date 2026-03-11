<?php

// $person =['name' => 'rafin','age ' => '77','round'=>'70'];
$person = array('name' => 'rafin','age ' => '77','round'=>'70');

echo $person['name'];
echo "<br>";
echo "<br>";
echo "<br>";



$b = array_keys($person);

$k = $b[1];
$c = $person[$k];

echo $k . ':' .$b;


?>