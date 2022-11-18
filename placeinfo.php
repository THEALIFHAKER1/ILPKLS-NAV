<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/header.php";
include "COMPONENT/nav.php";
?>
<div class="flex flex-row max-[800px]:flex-col mt-5">
    <div class="flex-[50%] h-screen">
<?php
$id = $_GET['place_id'];
$data = mysqli_query($con, "SELECT * FROM places WHERE ID='$id'");
$info1 = mysqli_fetch_array($data)
?>
<h1 class="text-xl text-white font-bold ml-10"><?php echo $info1["NAMES"]; ?></h1>
<div class="relative center text-white"> 
    <img class="object-cover w-full h-[500px] rounded-[52px] p-10" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info1["IMG"]); ?>" />
</div>
    <h1 class="text-xl text-white font-bold ml-10">MEMOS</h1>
    <?php $data = mysqli_query($con,"SELECT * FROM placesmemos WHERE PLACESID='$id'");
while ($info = mysqli_fetch_array($data)) { ?>
    <div class="relative center m-7 rounded-lg p-5 bg-white"> 
        <?php echo $info["TITLE"]; ?><br>
        <?php echo $info["CONTENT"]; ?><br>
        <?php echo $info["DATE"]; ?>
    </div>
<?php } ?>
</div>
    <div class="h-screen w-full flex-[50%]">
    <h1 class="text-xl text-white font-bold ml-10">PLACES</h1>
    <div style=""><iframe class="h-[500px] p-10 rounded-[52px] w-full"  src="<?php echo $info1["LINK"] ?>"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </div>
</div>
<?php include "COMPONENT/footer.php"; ?>