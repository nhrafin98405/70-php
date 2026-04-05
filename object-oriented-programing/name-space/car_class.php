<?php




class Car 
{
    public $name ="BMW";
    public $model ="m4";


    public function CarInfo(){
        echo " <br> car name is ".$this->name;
    }

}


$result = new Car();
$result->CarInfo();



?>