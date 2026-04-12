<?php
require_once("nhr_class.php");

$message = "";

if (isset($_POST["btnsubmit"])) {

    $uid = $_POST["id"];
    $uname = $_POST["name"];
    $uemail = $_POST["email"];

    $r = new Hasan($uid, $uname, $uemail);
    $r->store();
    $message = " Data Successfully Added!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Form</title>
</head>

<body>

    <!-- FORM -->
    <div class="container">
        <div class="form-box">
            <h2>Registration</h2>

            <?php if ($message != ""): ?>
                <div class="success-msg">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="#" method="post">

                <div class="input-group">
                    
                    <input type="number" name="id" placeholder="Enter ID" required>
                </div>

                <div class="input-group">
                    
                    <input type="text" name="name" placeholder="Enter Name" required>
                </div>

                <div class="input-group">
                    
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>

                <button type="submit" name="btnsubmit"> Submit</button>

            </form>
        </div>
    </div>

     <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    <!-- TABLE -->
    <div class="table-box">
        <h3> User Data</h3>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>

            <?php
                require_once("nhr_class.php");
                Hasan::display();
            ?>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>