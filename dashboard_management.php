<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/auth-management.php";
include "COMPONENT/nav.php";
$ID = $_SESSION["ID"];
$data = mysqli_query($con, "SELECT * FROM places WHERE MANAGERID='$ID'");
$info = mysqli_fetch_array($data);
if (isset($_POST["update"])) {
    $STATUS = $_POST["STATUS"];
    $DATES = $_POST["DATES"];
    $DATEE = $_POST["DATEE"];
    echo $DATEE;
    echo $DATES;
    $result = mysqli_query(
        $con,
        "UPDATE places SET STATUS='$STATUS',DATES='$DATES',DATEE='$DATEE' WHERE MANAGERID='$ID'"
    );
    if ($result) { ?>
<main x-data="app">
	<button type="button" @click="closeToast()" x-show="open" x-transition.duration.300ms class="fixed top-4 right-4 z-50 rounded-md bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">
		<div class="flex items-center space-x-2">
			<span class="text-3xl"><i class="bx bx-check"></i></span>
			<p class="font-bold">Success!</p>
		</div>
	</button>
</main>
<?php } else { ?>
<main x-data="app">
	<button type="button" @click="closeToast()" x-show="open" x-transition.duration.300ms class="fixed top-4 right-4 z-50 rounded-md bg-red-500 px-4 py-2 text-white transition hover:bg-red-600">
		<div class="flex items-center space-x-2">
			<span class="text-3xl"><i class="bx bx-x"></i></span>
			<p class="font-bold">Fail!</p>
		</div>
	</button>
</main>
<?php }
}
?>
<h1 class="pl-10 font-medium leading-tight text-5xl pt-1 text-white">MANAGEMENT DASHBOARD</h1>
<div class="flex flex-row max-[800px]:flex-col mt-5">
    <div class="flex-[50%] h-screen">
        <h1 class="text-xl text-white font-bold ml-10"><?php echo $info[
            "NAMES"
        ]; ?></h1>
        <div class="relative center text-white"> 
            <img class="object-cover w-full h-[500px] rounded-[52px] p-7" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(
                $info["IMG"]
            ); ?>" />
        </div>
    </div>
    <div class="h-screen w-full flex-[50%]">
        <h1 class="text-xl text-white font-bold">UPDATE MAKLUMAT</h1>
        <div class="px-8 mt-7 py-6 text-left bg-white shadow-lg rounded-lg">
        <form method="post" enctype='multipart/form-data'>
			<div class="">
				<div class="">
					<label class="block">Status</label>
					<select onchange="yesnoCheck(this);" class="form-select appearance-none block w-full px-3 mt-2 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="STATUS" required>
						<option disabled selected value> -- select an option -- </option>
						<option value="OPEN">OPEN</option>
						<option value="CLOSE">CLOSE</option>
					</select>
				</div>
                <div id="ifYes" class="mt-4" style="display: none;">
                <label class="block">DURATION</label>
                
<div date-rangepicker class="flex items-center">
  <div class="relative">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
    </div>
    <input name="DATES" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
  </div>
  <span class="mx-4 text-gray-500">to</span>
  <div class="relative">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
    </div>
    <input name="DATEE" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
</div>
</div>

            </div>
					<div class="flex items-baseline justify-between">
						<button type="submit" name="update" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Update</button>
						<button type="reset"><a class="text-sm text-blue-600 hover:underline">Clear</a></button>
					</div>
			</div>
		</form>
        </div>
        <?php
        $IDPLACE = $info["ID"];
        $data = mysqli_query(
            $con,
            "SELECT * FROM placesmemos WHERE PLACESID='$IDPLACE'"
        );
        $rowcount = mysqli_num_rows($data);
        ?><h1 class="inline text-xl text-white font-bold my-7">MEMOS [<?php echo $rowcount; ?>]</h1>
<button type="button" class="my-7 px-6 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="register_placesmemos.php?place_id=<?php echo $info[
        "ID"
    ]; ?>">Register MEMOS</a></button>
  <div class="">
    <?php
    $data = mysqli_query(
        $con,
        "SELECT * FROM placesmemos WHERE PLACESID='$IDPLACE'"
    );
    while ($info = mysqli_fetch_array($data)) { ?>
    <?php
    $TAG = $info["TAG"];
    $tagdata = mysqli_query($con, "SELECT * FROM tags WHERE TAG='$TAG'");
    $taginfo = mysqli_fetch_array($tagdata);
    ?>
<div class="relative drop-shadow-2xl center rounded-lg mb-7 p-5 bg-gray-400">
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
            <div class="mt-7">
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="update_placesmemos.php?update_bil=<?php echo $info[
        "ID"
    ]; ?>">Update</a></button>
    <button type="button" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="COMPONENT/delete_placesmemos.php?delete_id=<?php echo $info[
        "ID"
    ]; ?>">Delete</a></button>
  </div>
		</div>
        
<?php }
    ?>
</div>
    </div>
</div>
<script>
    function yesnoCheck(that) {
    if (that.value == "CLOSE") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
<?php include "COMPONENT/footer.php"; ?>
