<?php
include 'Components/head.php';
?>
<?php
include 'Components/Navbar/Navbar.php';
$component = new Navbar([
  ['url' => '/', 'text' => 'Home'],
  ['url' => '/about', 'text' => 'About'],
  ['url' => '/contact', 'text' => 'Contact'],
]);
echo $component->render();
?>
<?php
include 'Components/foot.php';
?>