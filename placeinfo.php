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
<div class="flex flex-row max-[800px]:flex-col mt-5">
    <div class="flex-[50%] h-screen">
<?php
$id = $_GET["place_id"];
$data = mysqli_query($con, "SELECT * FROM places WHERE ID='$id'");
$info1 = mysqli_fetch_array($data);
$NAMAPLACE = $info1["NAMES"];
?>
<h1 class="text-xl text-white font-bold ml-10"><?php echo $NAMAPLACE; ?></h1>
<div class="relative center text-white"> 
    <img class="object-cover w-full h-[500px] rounded-[52px] p-7" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(
        $info1["IMG"]
    ); ?>" />
    <div class=" absolute bottom-10 ml-5 rounded-lg px-2 <?php if (
       $info1["STATUS"] == "OPEN"
   ) {
       echo "bg-green-700";
   } else {
       echo "bg-red-700";
   } ?> left-4"><?php echo $info1["STATUS"]; ?> <?php if (
     $info1["STATUS"] == "CLOSE"
 ) {
     echo $info1["DATES"];
 } ?>  <?php if ($info1["STATUS"] == "CLOSE") {
      echo "> ";
      echo $info1["DATEE"];
  } ?></div>
</div>
<?php
$data = mysqli_query($con, "SELECT * FROM placesmemos WHERE PLACESID='$id'");
$rowcount = mysqli_num_rows($data);
?><h1 class="text-xl text-white font-bold ml-10 mb-7">MEMOS [<?php echo $rowcount; ?>]</h1>
  <div class="h-auto w-full overflow-y-auto scrollbars">
    <?php
    $data = mysqli_query(
        $con,
        "SELECT * FROM placesmemos WHERE PLACESID='$id'"
    );
    while ($info = mysqli_fetch_array($data)) { ?>
    <?php
    $TAG = $info["TAG"];
    $tagdata = mysqli_query($con, "SELECT * FROM tags WHERE TAG='$TAG'");
    $taginfo = mysqli_fetch_array($tagdata);
    ?>
<div class="relative drop-shadow-2xl center rounded-lg mx-7 mb-7 p-5 bg-gray-400">
        <div class='h-5 w-10 rounded-full <?php echo $taginfo[
            "COLOR"
        ]; ?>'><p class="pl-11 text-white pb-3"><?php echo $info[
    "TAG"
]; ?></p></div>
        <div class="font-black text-white bg-gray-600 px-2 pt-2 rounded-t-lg inline-block mt-3"><?php echo $info[
            "TITLE"
        ]; ?></div>
			<div class="text-white bg-gray-600 p-2 rounded-b-lg rounded-tr-lg"><?php echo $info[
       "CONTENT"
   ]; ?><br></div>
			<div class="bg-gray-600 w-40 rounded-lg text-white mt-3 px-2"><?php echo $info[
       "DATE"
   ]; ?></div>
		</div>
<?php }
    ?>
</div>
</div>
    <div class="h-screen w-full flex-[50%]">
        <div>
            <h1 class="text-xl text-white font-bold ml-10">PLACES</h1>
            <div style=""><iframe class="h-[500px] p-7 rounded-[52px] w-full"  src="<?php if (empty($info1["LINK"])){echo "404.php";}else{echo $info1["LINK"];}?>"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
        <div>
        <?php
        $data = mysqli_query(
            $con,
            "SELECT * FROM people WHERE LOCATION='$NAMAPLACE'"
        );
        $rowcount = mysqli_num_rows($data);
        ?>
            <h1 class="text-xl text-white font-bold ml-10 mb-7">PEOPLE [<?php echo $rowcount; ?>]</h1>
            <div class="h-auto w-full overflow-y-auto scrollbars">
            <div class="px-5 mb-7 mx-7 bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
<div class="flow-root">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
    <?php
    $data = mysqli_query(
        $con,
        "SELECT * FROM people WHERE LOCATION='$NAMAPLACE'"
    );
    while ($info = mysqli_fetch_array($data)) { ?>
        <li class="py-3 sm:py-4">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(
                        $info["IMG"]
                    ); ?>" alt="">
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        <?php echo $info["NAMES"]; ?>
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    <?php echo $info["EMAIL"]; ?>
                    </p>
                        <a href="<?php echo $info[
                            "TELE"
                        ]; ?>"><img class="h-4 w-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/2048px-Telegram_logo.svg.png" alt=""></a>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                <?php echo $info["TIME"]; ?>
                </div>
            </div>
        </li>
<?php }
    ?>
</ul>
</div>
</div>
</div>
        </div>
    </div>
</div>
<?php include "COMPONENT/footer.php"; ?>
