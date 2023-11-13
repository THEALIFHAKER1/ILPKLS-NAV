<?php
include 'Components/head.php';
include 'Components/Card/Card.php';
?>

<?php
include 'Components/Navbar/Navbar.php';
$component = new Navbar([
  ['url' => '/login', 'text' => 'Login'],
]);
echo $component->render();
?>

<div class="flex flex-row">
  <div class="flex-[50%]">
    <?php
    $data = mysqli_query($con, "SELECT * FROM places");
    $rowcount = mysqli_num_rows($data);
    ?>
    <h1 class="text-xl text-white font-bold ml-10 mb-7">PLACES [
      <?php echo $rowcount; ?> ]
    </h1>
    <div class="overflow-y-auto h-[calc(100vh-10rem)] scrollbars">
      <?php while (
        $info = mysqli_fetch_array($data)
      ) { ?>
        <?php
        $component = new Card($info);
        echo $component->render($info);
        ?>
      <?php } ?>
    </div>
  </div>
  <div class="flex-[50%] rounded-l">

  </div>
</div>

<?php
include 'Components/foot.php';
?>