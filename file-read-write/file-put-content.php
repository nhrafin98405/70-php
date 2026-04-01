<?php


$wrt = file_put_contents("store.txt","hellow\n ",FILE_APPEND);

echo "success";

// echo file_get_contents("store.txt");



$result = file("store.txt");

foreach ($result as $r){
    echo$r."<br>";
}


?>