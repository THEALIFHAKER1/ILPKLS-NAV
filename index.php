<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/header.php";
include "COMPONENT/nav.php";
?>
<style>
.scrollbars::-webkit-scrollbar {
    width: 10px;
    height: 20px;
  }


.scrollbars::-webkit-scrollbar-thumb {
    background: #00a2ff;
    border-radius: 100vh;
}

.scrollbar::-webkit-scrollbar-thumb:hover {
    background: #00c3ff;
}
</style>
<div class="flex flex-row h-screen max-[800px]:flex-col mt-5">
	<div class="flex-[50%]">
		<?php
  $data = mysqli_query($con, "SELECT * FROM places");
  $rowcount=mysqli_num_rows($data);
  ?><h1 class="text-xl text-white font-bold ml-10 mb-7">PLACES [<?php echo $rowcount; ?>]</h1>
  <div class="overflow-y-auto h-screen scrollbars"><?php
  while ($info = mysqli_fetch_array($data)) { ?>
		<div class=" rounded-lg relative overflow-hidden center text-white mx-7 mb-7">
			<a href="placeinfo.php?place_id=<?php echo $info[
       "ID"
   ]; ?>"><img class="hover:scale-105 transition ease-in-out delay-150 object-cover  drop-shadow-2xl w-full h-32" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(
    $info["IMG"]
); ?>" /></a>
			<div class=" absolute top-3 text-black left-4 font-black px-2 bg-white rounded-lg"><?php echo $info["NAMES"]; ?></div>
			<div class=" absolute absolute top-10 rounded-lg px-2 <?php if ($info["STATUS"] == 'OPEN'){echo "bg-green-700";}else{echo "bg-red-700";} ?> left-4"><?php echo $info[
       "STATUS"];?> <?php if ($info["STATUS"] == 'CLOSE'){echo $info['DATES'];}?>  <?php if ($info["STATUS"] == 'CLOSE'){echo '> '; echo $info['DATEE'];}?></div>
		</div>
		<?php }
  ?>
  </div>
	</div>
	<div class="flex-[50%] rounded-lg">
		<?php
  $data = mysqli_query($con, "SELECT * FROM memos ORDER BY id DESC");
  $rowcount=mysqli_num_rows($data);
  ?><h1 class="text-xl text-white font-bold ml-10 mb-7">MEMOS [<?php echo $rowcount; ?>]</h1>
  <div class="h-screen w-full overflow-y-auto scrollbars"><?php
  while ($info = mysqli_fetch_array($data)) { ?>
    <?php
    $TAG = $info["TAG"];
     $tagdata = mysqli_query($con, "SELECT * FROM tags WHERE TAG='$TAG'");
     $taginfo = mysqli_fetch_array($tagdata);
 ?>
		<div class="relative drop-shadow-2xl center rounded-lg mx-7 mb-7 p-5 bg-gray-400">
        <div class='h-5 w-10 rounded-full <?php echo $taginfo["COLOR"]; ?>'><p class="pl-11 text-white pb-3"><?php echo $info['TAG']; ?></p></div>
        <div class="font-black text-white bg-gray-600 px-2 pt-2 rounded-t-lg inline-block mt-3"><?php echo $info["TITLE"]?></div>
			<div class="text-white bg-gray-600 p-2 rounded-b-lg rounded-tr-lg"><?php echo $info["CONTENT"]; ?><br></div>
			<div class="bg-gray-600 w-40 rounded-lg text-white mt-3 px-2"><?php echo $info["DATE"]; ?></div>
		</div>
		<?php }
  ?>
  </div>
	</div>
</div>

<?php include "COMPONENT/footer.php"; ?>g