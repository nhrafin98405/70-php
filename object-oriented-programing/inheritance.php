<?php



class Student{
    public $name;
    public $age;
    public $address;
    public $id;
    public $subject;



    public function details($n){

        echo "My name is ". $this->name = $n;
    }

    public function __construct(){
        echo "hellow world <br>";
    }
}


class Teacher extends Student{

    public $experiance;

    public function teacherDetails(){

        echo "hellow students ";
    }
}

 class Authority{


    public $number;

    public function authorityDetails(){
        
        echo "hellow world";
    }
}
 


$st = new Student();

$st->details("rafin");

echo "<br>";

$tr = new Teacher();


echo "<br>";

$tr->teacherDetails();

echo "<br>";

$tr->details("hasan");

echo "<br>";

// $at = new Authority();

// $at->authorityDetails();


?>