<?php




class Student{


    public $name ="rafin";
    private $age ="22";
    protected $degree = "BSC";

    public function fullInfo(){
        echo $this->name;
        echo $this->age;
        echo $this->degree;
    }

    public function getAge(){
        return $this->age;
    }

    public function getDeg(){
        return $this->degree;
    }
}



$result = new Student();


echo $result->name;

echo "<br>";

echo $result->getAge();

echo "<br>";

echo $result->getDeg();


?>