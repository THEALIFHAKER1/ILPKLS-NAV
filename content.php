<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/auth-admin.php";
include "COMPONENT/nav.php";
?>
<div class="p-8 m-8 bg-white rounded-lg">
    <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="dashboard_admin.php">BACK</a></button>
</div>
<?php
$ID = $_GET['content_id'];
$result = mysqli_query($con, "SELECT * FROM memos WHERE ID='$ID'");
while($res = mysqli_fetch_array($result))
{
    $CONTENT = $res['CONTENT'];
}
?>
<div class="m-9">
    <h1 class="text-white bg-gray-700 p-7 rounded-lg"><?php echo $CONTENT ?></h1>
</div>
<?php include "COMPONENT/footer.php"; ?>