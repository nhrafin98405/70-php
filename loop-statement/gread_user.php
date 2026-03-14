<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post">

enter marks : <input type="number" name="marks">
enter name : <input type="text" name="name">
enter email : <input type="email" name="email">
enter full-name : <input type="text" name="f-n">

<input type="submit" name="submit">

</form>

<?php

echo $_POST['marks'];

echo "<br>";

echo $_POST['name'];

echo "<br>";

echo $_POST['email'];

echo "<br>";

echo $_POST['f-n'];

?>
    
</body>
</html>