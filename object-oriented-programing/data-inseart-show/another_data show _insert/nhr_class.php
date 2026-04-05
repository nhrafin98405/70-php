<?php



class Nhr{ 


    public $name;
    public $email;
    public $id;
    public static $file_source = "nhr_text.txt";

    public function __construct($_name, $_id, $_email){ 
        $this->name = $_name;
        $this->email = $_email;
        $this->id = $_id;
    }

    public function NhRafin(){ 
        return $this->name . " , " . $this->email . " , ".$this->id. PHP_EOL ;
    }

    public function store(){
        file_put_contents(self::$file_source,$this->NhRafin(),FILE_APPEND);
    }

    public static function display(){ 

        // for data show 
    }
}




?>