<?php
require_once("nhr_class.php");

$message = "";

if (isset($_POST["btnsubmit"])) {

    $uid = $_POST["id"];
    $uname = $_POST["name"];
    $uemail = $_POST["email"];

    $r = new Hasan($uid, $uname, $uemail);
    $r->store();
    $message = "✅ Data Successfully Added!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Form</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        /* Center form */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Glass Form */
        .form-box {
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            color: #fff;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-top: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 40px;
            border: none;
            border-radius: 8px;
            outline: none;
        }

        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #00c6ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0072ff;
            transform: scale(1.05);
        }

        .success-msg {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            background: rgba(0, 255, 150, 0.2);
            border: 1px solid rgba(0, 255, 150, 0.5);
            color: #00ffcc;
            text-align: center;
        }

        /* Table Design */
        .table-box {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            padding: 12px;
            background: rgba(0, 0, 0, 0.3);
        }

        td {
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
        }

        tr:hover td {
            background: rgba(0, 255, 150, 0.2);
            transition: 0.3s;
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
        }
</style>

</head>

<body>

    <!-- FORM -->
    <div class="container">
        <div class="form-box">
            <h2>✨ Registration</h2>

            <?php if ($message != ""): ?>
                <div class="success-msg">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="#" method="post">

                <div class="input-group">
                    <i class="fa fa-id-card"></i>
                    <input type="number" name="id" placeholder="Enter ID" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="name" placeholder="Enter Name" required>
                </div>

                <div class="input-group">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>

                <button type="submit" name="btnsubmit">🚀 Submit</button>

            </form>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-box">
        <h3>📋 User Data</h3>

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

</body>

</html>