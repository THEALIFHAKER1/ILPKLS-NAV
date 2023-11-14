<?php
function CheckAccess($accessLevel)
{

    if (!isset($_SESSION["ACCESS"]) || $_SESSION["ACCESS"] !== $accessLevel) {
        echo "You do not have permission to access this page";
        header("Location: ../../Pages/Login/login.php");
        exit();
    }
}
?>