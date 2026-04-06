<?php



class Nhr
{


    public $name;
    public $email;
    private $id;
  
    public static $file_source = "nhr_text.txt";

    public function __construct($_name, $_email)
    {
        $this->name = $_name;
        $this->email = $_email;
    }
}
class Hasan extends Nhr
{

    public $id;

    function __construct($id,$name, $email)
    {
        parent::__construct($name, $email);
        $this->id = $id;
    }

    public function NhRafin()
    {
        return $this->id . " , " . $this->name . " , " . $this->email . PHP_EOL;
    }

    public function store()
    {
        file_put_contents(self::$file_source, $this->NhRafin(), FILE_APPEND);
    }

    
}
