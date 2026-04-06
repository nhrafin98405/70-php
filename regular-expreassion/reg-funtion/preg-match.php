<?php



// pattern/mpdifier(i-case-insensative)


$str = "this is regular exprsion lo";


$patern = "/i/i";

echo preg_match_all($patern,$str);





?>