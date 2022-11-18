<?php
include "COMPONENT/header.php";
if ($_SESSION["ACCESS"] !== "management") {
    header("Location: login.php");
    exit();
}
?>


