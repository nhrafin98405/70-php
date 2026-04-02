

<?php


if(isset($_POST['submit'])){

    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $c = $_POST['num3'];

    if($a >= $b && $a >= $c){
        echo "Largest Number is : ".$a;
    }
    elseif($b >= $a && $b >= $c){
        echo "Largest Number is : ".$b;
    }
    else{
        echo "Largest Number is : ".$c;
    }
}



?>

<form method="post">
    Number 1: <input type="number" name="num1"><br><br>
    Number 2: <input type="number" name="num2"><br><br>
    Number 3: <input type="number" name="num3"><br><br>

    <input type="submit" name="submit" value="Find Largest">
</form>