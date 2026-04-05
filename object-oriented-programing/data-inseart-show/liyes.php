<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    $file = fopen("data.txt", "a");
    fwrite($file, "Name: $name, ID: $id\n");
    fclose($file);
}
?>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    ID: <input type="text" name="id"><br><br>
    <input type="submit" name="submit" value="Save">
</form>

<h3>Saved Data:</h3>

<?php
$file = fopen("data.txt", "r");

while(!feof($file)) {
    echo fgets($file) . "<br>";
}

fclose($file);
?>