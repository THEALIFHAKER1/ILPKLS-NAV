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
    <b class="text-lg text-white">WELCOME ADMIN <?php echo strtoupper($info["NAME"]); ?></b><br>
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
            $data = mysqli_query(
                $con,
                "SELECT * FROM places"
            );
            while ($info = mysqli_fetch_array($data)) { ?>
                  <tr class="bg-gray-400 border-b">
              <td class="text-base text-white font-medium px-6 py-4 whitespace-nowrap">
              <img class="object-cover w-full h-28 rounded-lg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info["IMG"]); ?>" />
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
    <button type="button" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="COMPONENT/delete_places.php?delete_id=<?php echo $info[
        "ID"
    ]; ?>">Delete</a></button>
  </div>
</div>
    </td>
<?php ;}?>
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
            $data = mysqli_query(
                $con,
                "SELECT * FROM memos ORDER BY id DESC"
            );
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
    <button type="button" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="COMPONENT/delete_memos.php?delete_id=<?php echo $info[
        "ID"
    ]; ?>">Delete</a></button>
  </div>
</div>
    </td>
<?php ;}?>
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
            $data = mysqli_query(
                $con,
                "SELECT * FROM people"
            );
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
    <button type="button" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="COMPONENT/delete_people.php?delete_id=<?php echo $info[
        "ID"
    ]; ?>">Delete</a></button>
  </div>
</div>
    </td>
<?php ;}?>
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
            $data = mysqli_query(
                $con,
                "SELECT * FROM users"
            );
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
    <button type="button" class="inline-block px-6 py-2.5 bg-red-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"><a href="COMPONENT/delete_users.php?delete_id=<?php echo $info[
        "ID"
    ]; ?>">Delete</a></button>
  </div>
</div>
    </td>
<?php ;}?>
    </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include "COMPONENT/footer.php"; ?>