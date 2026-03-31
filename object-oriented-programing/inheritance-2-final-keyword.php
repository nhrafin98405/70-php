<?php 
class A{

     public $name;
  
 function __destruct()
 {
    echo "Bye"; 
 }

 function Show(){ 
    echo "This is my parent Show method"."<br/>";
 }
//final keyword
final function info(){ 
    echo "This is my parent info method"."<br/>";
 }

function __construct($name){ 
        echo "This is <br>".$this->name=$name;
}

}

 class B extends A{ 
    public $address;
    public $email;
    function fullInfo(){ 
        echo  "Hello!";
    }
    function __construct($name,$address) {
     echo "This is  ". $this->name = $name;
       echo " she and lives in ".$this->address = $address;
    }

 }



 class C extends B{
     public $age;
      function Show(){ 
         echo "This is my parent Show method (override)"."<br/>";
      }
     function display(){ 
        echo "show all information";
     }
     function __construct(){ 
        echo "This is child class";
     }
 }


//  my code 

class S{
    public function Info(){
        echo "alllah mohan";
    }

    public function Rfn(){
        echo "niaz hasan";
    }
 }


 class M extends S{
    public function Result(){
        echo "show result";
    }
 }


 class R extends M {
    public function aboutInfo(){
        echo "niaze hasan rafin";
    }
 }




$b = new C();
echo  "<br>";
$b->display();
echo  "<br>";
$b->fullInfo();
 echo  "<br>";
$b->Show();
echo  "<br>";
$b->info();
 echo  "<br>";


$J =new S();
 echo  "<br>";
$J->Rfn();
 echo  "<br>";
$I = new M();

$I->Result();
 echo  "<br>";
$I->Info();
 echo  "<br>";

 $K = new R();

 $K->aboutInfo();

?>