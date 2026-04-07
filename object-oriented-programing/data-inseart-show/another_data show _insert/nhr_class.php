<?php class Nhr
{
    protected $id;
    public $name;
    public $email;
    public static $file_source = "nhr_text.txt";
    public function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
}
class Hasan extends Nhr
{
    function __construct($id, $name, $email)
    {
        parent::__construct($id, $name, $email);
    }
    public function formData()
    {
        return $this->id . "," . $this->name . "," . $this->email . PHP_EOL;
    }
    public function store()
    {
        file_put_contents(self::$file_source, $this->formData(), FILE_APPEND);
    }
    public static function display()
    {
        $file = file(self::$file_source);
        foreach ($file as $line) {
            list($id, $name, $email) = explode(",", trim($line));
            echo "<tr> <td>$id</td> <td>$name</td> <td>$email</td> </tr>";
        }
    }
}
?>