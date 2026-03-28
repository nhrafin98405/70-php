

<?php

class Car{



public $name;
public $color;

public $describe;
public $price;


public function __destruct(){
    echo "<br> bye";
}

public function __construct($c,$n,$d,$p){
    echo "hellow " . $this->name = $c . " is " . $this->color =$n . $this->describe =$d . $this->price =$p;
}
}


$result = new car("toyota ","red ","toyota supra ","100000$");

?>