<?php




class Student{


    public $name ="rafin";
    private $age ="22";
    protected $degree = "BSC";

    private function pInfo(){

    echo "this is private info";

    }

   
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

class Child extends student{


    public function show(){

    echo "my degree ".$this->degree;
    }
}



$result = new Student();

echo $result->puInfo();

// echo $result->name;

// echo "<br>";

// echo $result->getAge();

// echo "<br>";

// echo $result->getDeg();

// $cld = new Child();

// echo $cld->show();


?>





