<?php



class Nhr{ 


    public $name;
    public $email;
    private $id;
    public static $file_source = "nhr_text.txt";

    public function __construct($_name, $_email){ 
        $this->name = $_name;
        $this->email = $_email;
        
    }

}
class Raffu extends Nhr{ 

    public $id;

    function __construct($name, $id, $address)
    {
        parent::__construct($name, $address);
        $this->id = $id;
    }

    public function NhRafin(){ 
        return $this->id . " , " . $this->name . " , ".$this->email. PHP_EOL ;
    }

    public function store(){
        file_put_contents(self::$file_source,$this->NhRafin(),FILE_APPEND);
    }

    public static function display(){ 

        // for data show 
    }
}





?>