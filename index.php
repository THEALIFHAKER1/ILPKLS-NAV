<?php
include 'Components/head.php';
?>

<?php
include 'Components/Navbar/Navbar.php';
$component = new Navbar([
  ['url' => '/login', 'text' => 'Login'],
]);
echo $component->render();
?>

<div style="display: flex;">
  <div style="width: 50%;">
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
      }
    } else {
      echo "0 results";
    }
    ?>
  </div>
  <div style="width: 50%;">Right Box</div>
</div>

<?php
include 'Components/foot.php';
?>