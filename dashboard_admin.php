<?php
include "COMPONENT/DB/connection.php";
include "COMPONENT/auth-admin.php";
include "COMPONENT/nav.php";
$id = $_SESSION["ID"];
?>
<h1 class="pl-10 font-medium leading-tight text-5xl pt-1 text-white">ADMIN DASHBOARD</h1>
<div class="p-8 m-8 bg-gray-400 rounded-lg">
    <?php
    $data = mysqli_query($con, "SELECT * FROM users WHERE ID='$id'");
    $info = mysqli_fetch_array($data);
    ?>
    <b class="text-lg text-white">WELCOME ADMIN <?php echo strtoupper(
        $info["NAME"]
    ); ?></b><br>
    <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="component/logout.php">Logout</a></button>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="register_places.php">Register Places</a></button>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="register_memos.php">Register MEMOS</a></button>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="register_people.php">Register PEOPLE</a></button>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="register_users.php">Register USERS</a></button>
  </div>
  <center><u class="text-white">PLACES LIST</u></center>
<div class="px-8 pb-6 mt-4 flex flex-col ">
  <div class=" sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden rounded-lg">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                IMG
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              PLACES NAME
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                STATUS
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                LINK
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ACTION
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php
            $data = mysqli_query($con, "SELECT * FROM places");
            while ($info = mysqli_fetch_array($data)) { ?>
                  <tr class="bg-gray-400 border-b">
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <img class="object-cover w-full h-28 rounded-lg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(
                  $info["IMG"]
              ); ?>" />
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["NAMES"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["STATUS"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <a href="<?php echo $info["LINK"]; ?>">LINK</a>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
<div class="flex space-x-2 justify-center">
  <div>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="update_places.php?update_id=<?php echo $info[
        "ID"
    ]; ?>">Update</a></button>
    <button type="button" data-modal-toggle="staticModal" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">delete</button>
                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t bg-red-700 border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    DELETE!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Are you sure want to delete this data? <p class="text-red-300">this action is irreversible!</p> 
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="padampekerja.php?delete_id=<?php echo $info["ID"]; ?>">YES DELETE! <?php echo $info["NAMES"] ?></a></button>
                <button data-modal-toggle="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">CANCEL</button>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
    </td>
<?php }
            ?>
    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- FUCK -->
<center><u class="text-white">MEMOS LIST</u></center>
<div class="px-8 pb-6 mt-4 flex overflow-y-auto w-screen flex-col ">
  <div class=" sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden rounded-lg">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                TAG
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              TITLE
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                CONTENT
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                DATE
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ACTION
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php
            $data = mysqli_query($con, "SELECT * FROM memos ORDER BY id DESC");
            while ($info = mysqli_fetch_array($data)) { ?>
                  <tr class="bg-gray-400 border-b">
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["TAG"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["TITLE"]; ?>
              </td>
              <td class="text-basec text-white font-medium px-6 py-4 whitespace-nowrap">
              <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="content.php?content_id=<?php echo $info[
                  "ID"
              ]; ?>">CONTENT</a></button>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["DATE"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
<div class="flex space-x-2 justify-center">
  <div>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="update_memos.php?update_bil=<?php echo $info[
        "ID"
    ]; ?>">Update</a></button>
<button type="button" data-modal-toggle="staticModal2" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">delete</button>
                <div id="staticModal2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t bg-red-700 border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    DELETE!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="staticModal2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Are you sure want to delete this data? <p class="text-red-300">this action is irreversible!</p> 
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="padampekerja.php?delete_id=<?php echo $info["ID"]; ?>">YES DELETE!</a></button>
                <button data-modal-toggle="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">CANCEL</button>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
    </td>
<?php }
            ?>
    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- FUCK -->
<center><u class="text-white">PEOPLE LIST</u></center>
<div class="px-8 pb-6 mt-4 flex flex-col overflow-y-auto w-screen">
  <div class=" sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden rounded-lg">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ID
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                NAME
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              PASSWORD
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                EMAIL
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                TELE
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ACTION
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php
            $data = mysqli_query($con, "SELECT * FROM people");
            while ($info = mysqli_fetch_array($data)) { ?>
                  <tr class="bg-gray-400 border-b">
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["ID"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["NAMES"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["PASS"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["EMAIL"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["TELE"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
<div class="flex space-x-2 justify-center">
  <div>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="update_people.php?update_bil=<?php echo $info[
        "ID"
    ]; ?>">Update</a></button>
<button type="button" data-modal-toggle="staticModal3" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">delete</button>
                <div id="staticModal3" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t bg-red-700 border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    DELETE!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="staticModal3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Are you sure want to delete this data? <p class="text-red-300">this action is irreversible!</p> 
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="padampekerja.php?delete_id=<?php echo $info["ID"]; ?>">YES DELETE! PEOPLE <?php echo $info["ID"] ?></a></button>
                <button data-modal-toggle="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">CANCEL</button>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
    </td>
<?php }
            ?>
    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- FUCK -->
<center><u class="text-white">USERS LIST</u></center>
<div class="px-8 pb-6 mt-4 flex flex-col overflow-y-auto w-screen">
  <div class=" sm:-mx-6 lg:-mx-8">
    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden rounded-lg">
        <table class="min-w-full text-center">
          <thead class="border-b bg-gray-500">
            <tr>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ID
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                NAME
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
              PASSWORD
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ACCESS
              </th>
              <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                ACTION
              </th>
            </tr>
          </thead class="border-b">
          <tbody>
            <?php
            $data = mysqli_query($con, "SELECT * FROM users");
            while ($info = mysqli_fetch_array($data)) { ?>
                  <tr class="bg-gray-400 border-b">
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["ID"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["NAME"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
                <?php echo $info["PASS"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <?php echo $info["ACCESS"]; ?>
              </td>
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
<div class="flex space-x-2 justify-center">
  <div>
    <button type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><a href="update_users.php?update_bil=<?php echo $info[
        "BIL"
    ]; ?>">Update</a></button>
<button type="button" data-modal-toggle="staticModal4" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">delete</button>
                <div id="staticModal4" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t bg-red-700 border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">
                    DELETE!
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="staticModal4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Are you sure want to delete this data? <p class="text-red-300">this action is irreversible!</p> 
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="padampekerja.php?delete_id=<?php echo $info["ID"]; ?>">YES DELETE! USER <?php echo $info["NAME"] ?></a></button>
                <button data-modal-toggle="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">CANCEL</button>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
    </td>
<?php }
            ?>
    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include "COMPONENT/footer.php"; ?>
