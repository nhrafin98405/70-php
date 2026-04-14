<style>
    /* Background (more vibrant gradient) */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ff7e5f, #feb47b, #6a11cb, #2575fc);
        background-size: 300% 300%;
        animation: gradientMove 8s ease infinite;
    }

    /* Animated gradient */
    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Smaller container */
    .table-box {
        width: 55%;
        margin: 60px auto;
        padding: 20px;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        color: #fff;
    }

    /* Title */
    .table-title {
        text-align: center;
        margin-bottom: 15px;
        font-size: 20px;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Header */
    th {
        padding: 10px;
        background: linear-gradient(45deg, #ff512f, #dd2476);
        font-size: 13px;
    }

    /* Cells */
    td {
        padding: 8px;
        font-size: 13px;
        text-align: center;
        color: #fff;
        font-weight: bolder;
        font-size: 15px;
    }

    /* Row hover */
    tr:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.01);
        transition: 0.3s;
    }

    /* Zebra rows */
    tr:nth-child(even) {
        background: rgba(255, 255, 255, 0.05);
    }

    /* Buttons */
    .btn {
        padding: 4px 8px;
        border: none;
        border-radius: 5px;
        font-size: 11px;
        cursor: pointer;
    }

    /* Edit */
    .edit {
        background: #00dbde;
        color: white;
    }

    /* Delete */
    .delete {
        background: #fc466b;
        color: white;
    }

    /* Button hover */
    .btn:hover {
        transform: scale(1.1);
        opacity: 0.9;
    }
</style>


<table style="border-collapse: collapse;" border="" cellpadding="10">
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