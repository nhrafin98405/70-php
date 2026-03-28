<?php



    class Car{



    public $name;
    public $color;



    public function __destruct(){
        echo "<br> bye";
    }

    public function __construct(){
        echo "hellow " ;
    }

    public function nsar($nm){
        $this->name =$nm;
        return $this->name;
    }
    }



    $result = new car();

    echo $result->nsar("hgfds");


?>