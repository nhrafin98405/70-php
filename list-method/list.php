<?php




$a = [

    [1,"rafin",25,"email@gmail.com","3248924167"],
    [2,"hasan",45,"email@gmail.com","3248924167"],
    [3,"nhr",55,"email@gmail.com","3248924167"],
    [4,"nh rfn",85,"email@gmail.com","3248924167"],
];




// list($id,$name,$email,$nmbr);


// echo "$id";

// foreach ($a as list($id,$name,$age,$email,$nmbr)){
//     echo $id."|".$name,$age,$email,$nmbr."<br>";
//     // break;
// }


foreach($a as $d){
    list($id,$name,$age,$email,$nmbr) = $d;

    echo "ID = " .$id ."<br>";
}








?>