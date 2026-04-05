<table style="border-collapse: collapse;" border="" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>ID</th>
    </tr>

<?php
$file = file("nhr_text.txt");

foreach($file as $line){
    list($name, $email, $id) = explode(",", trim($line));

    echo "<tr>
            <td>$name</td>
            <td>$email</td>
            <td>$id</td>
          </tr>";
}
?>

</table>