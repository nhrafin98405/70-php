<?php

echo "First Name:" . $_FILES['filen']['name'];
echo "<br>";
echo "File Type:" . $_FILES['filen']['type'];
echo "<br>";
echo "File Full-Path:" . $_FILES['filen']['full_path'];
echo "<br>";
echo "File Temporary Name:" . $_FILES['filen']['tmp_name'];
echo "<br>";
echo "File Size:" . $_FILES['filen']['size'];
echo "<br>";
echo "File error:" . $_files['filen']['error'];
echo "<br>";




                                                        
?>




<form action="" method="post" enctype="multipart/form-data">

<input type="file" name="filen">
<input type="submit">
</form>