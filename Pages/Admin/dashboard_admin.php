<?php
ob_start(); // Turn on output buffering
include __DIR__ . '/../../Components/head.php';
include __DIR__ . '/../../Components/CheckAccess/CheckAccess.php';
checkAccess("admin");
ob_end_flush(); // Send the buffered output
?>
admin
<?php
// Include foot.php file
include __DIR__ . '/../../Components/foot.php';
?>