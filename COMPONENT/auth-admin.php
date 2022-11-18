<?php
include "COMPONENT/header.php";
if ($_SESSION["ACCESS"] !== "admin") {
    header("Location: login.php");
    exit();
}
?>


