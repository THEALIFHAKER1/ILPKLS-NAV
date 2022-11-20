<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/header.php";
$PLACENAME = $_GET['PLACENAME'];
if (isset($_POST['ID'])) {
    $ID = $_POST["ID"];
    $PASS = $_POST["PASS"];
    $query = mysqli_query($con, "SELECT * FROM people WHERE ID='$ID' AND PASS='$PASS'");
    $count = mysqli_num_rows($query);
    if (mysqli_num_rows($query) == 0) {
    } else {
        $row = mysqli_fetch_assoc($query);
        $ID = $row["ID"];
        $result = mysqli_query(
            $con,
            "UPDATE people SET LOCATION='$PLACENAME' WHERE ID='$ID'");
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
    }
?>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" method="post">
                  <div>
                      <label for="ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin ID</label>
                      <input type="text" name="ID" id="ID" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ID" required="">
                  </div>
                  <div>
                      <label for="PASS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="PASS" id="PASS" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <button  class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
              </form>
          </div>
      </div>
  </div>
</section>
<?php include "COMPONENT/footer.php"; ?>