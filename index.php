<?php
include 'Components/head.php';
include 'Components/Card/Card.php';
include 'Components/MemosCard/MemosCard.php';
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
  <div class="flex-[50%] rounded-lg">
    <?php
    $data = mysqli_query($con, "SELECT * FROM memos");
    $rowcount = mysqli_num_rows($data);
    ?>
    <h1 class="text-xl text-white font-bold ml-10 mb-7">MEMOS [
      <?php echo $rowcount; ?> ]
    </h1>
    <div class="overflow-y-auto h-[calc(100vh-10rem)] scrollbars">
      <?php while (
        $info = mysqli_fetch_array($data)
      ) { ?>
        <?php
        $TAG = $info["TAG"];
        $tagdata = mysqli_query($con, "SELECT * FROM tags WHERE TAG='$TAG'");
        $taginfo = mysqli_fetch_array($tagdata);
        $component = new MemosCard($info, $taginfo);
        echo $component->render($info, $taginfo);
        ?>
      <?php } ?>
    </div>
  </div>
</div>


<style>
  /* if mobile */
  @media (max-width: 640px) {
    .flex-row {
      flex-direction: column;
    }
  }
</style>

<?php
include 'Components/foot.php';
?>