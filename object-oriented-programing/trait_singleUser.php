<?php




trait Main{
    public function info(){
        echo "this is main class"."<br>";
    }
}




class Child{
    use Main;
    public function save(){
        echo"this is child class";
    }
}


$m = new Child();
$m->info();
$m->save();


?>