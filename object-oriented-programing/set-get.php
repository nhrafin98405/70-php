<?php



class Car{



public $name;
public $color;




public function setName($nm){
    $this->name =$nm;
}
public function getName(){
    return $this->name;
}
}

$result = new Car();

$result->setName("rafin");

echo $result->getName();

?>