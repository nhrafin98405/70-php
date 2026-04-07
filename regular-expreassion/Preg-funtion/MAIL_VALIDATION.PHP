<?php
$mall = "RAFIN@GMAIL.COM";
$p = "/^[A-Za-z0-9._+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/i";
echo preg_match($p, $mall);
?>