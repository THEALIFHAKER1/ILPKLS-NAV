<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/header.php";
include "COMPONENT/nav.php";
if (isset($_POST["update"])) {
    $TITLE = $_POST["TITLE"];
    $TAG = $_POST["TAG"];
    $CONTENT = $_POST["CONTENT"];
    $rekod = "INSERT INTO memos (TITLE,TAG,CONTENT)
     VALUES ('$TITLE','$TAG','$CONTENT')";
    $result = mysqli_query($con, $rekod);
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
<?php  ?>
<div class="flex items-center justify-center">
    <div class="px-8 py-6 mt-20 text-left bg-white shadow-lg rounded-lg">
        <h3 class="text-2xl font-bold">REGISTER MAKLUMAT MEMOS</h3>
        <form method="post" enctype='multipart/form-data'>
            <div class="mt-4">
                <div class="mt-4">
                <label class="block">TITLE</label>
                <input name="TITLE" type="text" required class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">  
                </div>
                <div class="mt-4">
                <label class="block">TAG</label>
                <select class="form-select appearance-none block w-full px-3 mt-2 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="TAG" required>
                <option disabled selected value> -- select an option -- </option>
				<?php
    $tagdata = mysqli_query($con, "SELECT * FROM tags");
    while ($taginfo = mysqli_fetch_array($tagdata)) { ?>
	<option value="<?php echo $taginfo["TAG"]; ?>"><?php echo $taginfo[
    "TAG"
]; ?></option>
<?php }
    ?>  
      </select> 
                </div>
                <div class="mt-4">
                <label class="block">CONTENT</label>
                <textarea name="CONTENT" cols="100" rows="10"></textarea>
                </div>
                <td>
                <div class="flex items-baseline justify-between">
                    <button type="submit" name="update" class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">REGISTER</button>
                    <button type="reset"><a class="text-sm text-blue-600 hover:underline">Clear</a></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "COMPONENT/footer.php"; ?>
