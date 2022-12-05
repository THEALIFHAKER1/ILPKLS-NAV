<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/auth-admin.php";
include "COMPONENT/nav.php";
if (isset($_POST["update"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = ["jpg", "png", "jpeg", "gif"];
    $ID = $_POST["ID"];
    $PASS = $_POST["PASS"];
    $NAMES = $_POST["NAMES"];
    $EMAIL = $_POST["EMAIL"];
    $TELE = $_POST["TELE"];
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES["image"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));
        $result = mysqli_query(
            $con,
            "UPDATE people SET
   IMG='$imgContent',NAMES='$NAMES',PASS='$PASS',EMAIL='$EMAIL',TELE='$TELE'
   WHERE ID='$ID'"
        );
    } else {
        $result = mysqli_query(
            $con,
            "UPDATE people SET
   NAMES='$NAMES',PASS='$PASS',EMAIL='$EMAIL',TELE='$TELE' WHERE ID='$ID'"
        );
    }
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
<div class="p-8 m-8 bg-white rounded-lg">
    <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="dashboard_admin.php">BACK</a></button>
</div>
<?php
$ID = $_GET["update_bil"];
$result = mysqli_query($con, "SELECT * FROM people WHERE ID='$ID'");
while ($res = mysqli_fetch_array($result)) {
    $IDS = $res["ID"];
    $NAME = $res["NAMES"];
    $PASS = $res["PASS"];
    $EMAIL = $res["EMAIL"];
    $TELE = $res["TELE"];
}
?>
<div class="flex items-center justify-center">
    <div class="px-8 py-6 mt-20 text-left bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold">UPDATE MAKLUMAT <?php echo $NAME; ?></h3>
        <form method="post" enctype='multipart/form-data'>
            <div class="mt-4">
            <div class="mt-4">

<label class="block" for="file_input">Select image [LEAVE EMPTY IF NO CHANGE]</label>
<input type="file" name="image">
</div>
            <div class="mt-4">
                <label class="block">ID</label>
                <input name="ID" type="text" readonly="readonl" class="w-full px-4 py-2 mt-2 border bg-gray-500 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" maxlength="5" value="<?php echo $IDS; ?>">  
                </div>
                <div class="mt-4">
                <label class="block">Name</label>
                <input name="NAMES" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $NAME; ?>">  
                </div>
                <div class="mt-4">
                <label class="block">Password</label>
                <input name="PASS" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $PASS; ?>">  
                </div>
                <div class="mt-4">
                <label class="block">EMAIL</label>
                <input name="EMAIL" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $EMAIL; ?>">  
                </div>
                <div class="mt-4">
                <label class="block">TELE</label>
                <input name="TELE" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  value="<?php echo $TELE; ?>">  
                </div>
                <div class="flex items-baseline justify-between">
                    <button type="submit" name="update" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Update</button>
                    <button type="reset"><a class="text-sm text-blue-600 hover:underline">Clear</a></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "COMPONENT/footer.php"; ?>
