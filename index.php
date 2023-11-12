<?php
include 'Components/head.php';
?>
<h1 class="text-3xl font-bold underline">
  Hello world!
</h1>
<?php
include 'Components/MyComponent/MyComponent.php';
$component = new MyComponent('Hello, world!');
echo $component->render();
?>
<?php
include 'Components/foot.php';
?>