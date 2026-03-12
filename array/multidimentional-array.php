<?php





$marry = [
    [3,4,6,7,2,6],
    [5,6,2,3,7,8],
    [6,8,9,1,3,2]
];

// print_r($marry);

// echo "<br>";

// print_r[1],[3];

// echo "<br>";
// echo "<br>";

// for($i=0; $i<count($marry); $i++){
    
//     for($j=0;$j<count($marry[$i]);$j++){
//         echo $marry[$i][$j]." ";
//     }

// }


echo "<ul>";

for($i = 0; $i < count($marry); $i++){

    echo "<br>Ctagori-1 <br>";
    echo "<br>";
    echo "<br><ul><br>";

    for($j = 0; $j < count($marry[$i]); $j++){
        echo "<li>".$marry[$i][$j]."</li>";
    }

    echo "</ul>";
    echo "</li>";
}

echo "</ul>";


?>