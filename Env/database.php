<?php
include __DIR__ . '/../Env/env.php';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<h1 class="text-3xl font-bold underline text-red-500">' . $e->getMessage() . '</h1>';
}
?>