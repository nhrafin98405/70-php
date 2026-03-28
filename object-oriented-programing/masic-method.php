<?php







// echo "allah mohan";


class Car{
    public $model = "sdm";
    public $color = "red";
    public $name ="bmw";


function info($d){

// echo "allah mohan";

$this->color = $d;
return $this->color;

}

}

$result = new Car();

echo $result-> name;

echo "<br>";

// $result->info();

echo "<br>";

echo $result->info("black");





?>