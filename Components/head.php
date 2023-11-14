<?php
include __DIR__ . '/../Env/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILPKLS NAV</title>
    <link rel="icon" href="/../Assets/Logo/Logo.png">
    <link rel="stylesheet" href="../Styles/Tailwind-input.css">
    <link rel="stylesheet" href="./Styles/Tailwind-output.css">
    <link rel="stylesheet" href="../Styles/main.css">
</head>

<body class="dark bg-background pt-[10vh] h-screen overflow-hidden">
    <style>
        .scrollbars::-webkit-scrollbar {
            width: 10px;
            height: 20px;
        }


        .scrollbars::-webkit-scrollbar-thumb {
            background: #00a2ff;
            border-radius: 100vh;
        }

        .scrollbar::-webkit-scrollbar-thumb:hover {
            background: #00c3ff;
        }

        /* @media (max-width: 640px) {
            .scrollbars {
                overflow-x: scroll;
                overflow-y: hidden;
                white-space: nowrap;
            }
        } */
    </style>
    <?php
    $currentPath = $_SERVER['REQUEST_URI'];
    ?>
    <?php
    include 'Components/Navbar/Navbar.php';
    if ($currentPath == "/") {
        $component = new Navbar([
            ['url' => '/login', 'text' => 'Login'],
        ]);
    } else {
        $component = new Navbar([
            ['url' => '/', 'text' => 'Home'],
            ['url' => '/Logout', 'text' => 'Logout'],
        ]);
    }
    echo $component->render();
    ?>