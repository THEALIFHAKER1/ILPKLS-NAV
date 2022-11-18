<?php
include "DB/connection.php";
$id = $_GET['delete_id'];
$result = mysqli_query($con,"DELETE FROM USERS WHERE ID='$id'");
 echo "<script>window.location='../dashboard_admin.php'</script>";
?>