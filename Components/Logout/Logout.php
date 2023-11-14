<?php
session_start();
function logout()
{
    if (isset($_SESSION['ID'])) {
        session_destroy();
    }
    header('Location: ../../Pages/Login/login.php');
    exit;
}