<?php
session_start();
include __DIR__ . '/../Env/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILPKLS NAV</title>
    <link rel="icon" href="/../Assets/Logo/Logo.png">
    <link rel="stylesheet" href="/../Styles/main.css">
    <link rel="stylesheet" href="/../Styles/Tailwind-input.css">
    <link rel="stylesheet" href="/../Styles/Tailwind-output.css">

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

        .fade {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Add animation for fade in effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <?php
    $currentPath = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : 'default_value';
    ?>
    <?php
    include __DIR__ . '/../Components/Navbar/Navbar.php';
    if (isset($_SESSION["ID"])) {
        $component = new Navbar([
            ['url' => '/', 'text' => 'Home'],
            ['url' => '/Pages/Logout/logout.php', 'text' => 'Logout'],
        ]);
    } else {
        $component = new Navbar([
            ['url' => '/Pages/Login/login.php', 'text' => 'Login'],
            ['url' => '/', 'text' => 'Home'],
        ]);
    }
    echo $component->render();
    // echo $currentPath;
    ?>