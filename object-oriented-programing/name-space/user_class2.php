<?php

namespace UserTwo;


class Done 
{
    public $name ="samsung";
    public $model ="s24";


    public function userInfo(){
        echo "<br> this is ".$this->name;
    }


    public function phoneInfo(){
        echo "<br>  this is ".$this->model;
    }

}


$result = new Done();
$result->userInfo();
$result->phoneInfo();



?>