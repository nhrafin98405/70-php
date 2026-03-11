<?php





echo time();

echo "<br>";

echo date('d');

echo "<br>";

echo date('D');

echo "<br>";

echo date('m');

echo "<br>";

echo date('y');

echo "<br>";

echo date('Y');

echo "<br>";

echo date('n');

echo "<br>";

echo date('L');

echo "<br>";

echo date('f');

echo "<br>";

echo date('d-n-y');

echo "<br>";

echo date('H:i:s');

echo "<br>";

date_default_timezone_set("Asia/Dhaka");

echo "<br>";

echo date("h:i:s A");

echo "<br>";

echo date_default_timezone_get() . date('H:i:s');

echo "<br>";

$b = date_create("20-03-2002");

$a = date_create("11-3-2026");

$gap = date_diff($b,$a);


echo $gap->format("%y YEAR %m MONTH %d DAY");

echo "<br>";


echo $gap->y."YEAR";
echo $gap->m."MONTH";
echo $gap->d."DAY";
echo "<br>";
echo "<br>";

?>