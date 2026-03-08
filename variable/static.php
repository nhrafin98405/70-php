<?php



function name(){


    static $z = 0;
    echo $z;
    $z++;
}


name();
name();
name();
name();


?>