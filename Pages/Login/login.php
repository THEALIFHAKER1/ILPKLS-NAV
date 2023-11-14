<?php
ob_start(); // Turn on output buffering
// Include head.php
include __DIR__ . '/../../Components/head.php';

if (isset($_POST["ID"])) {
    $ID = $_POST["ID"];
    $PASS = $_POST["PASS"];

    // Use prepared statements to prevent SQL injection attacks
    $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE ID=?");
    mysqli_stmt_bind_param($stmt, "s", $ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        echo "Invalid ID or password";
    } else {
        $row = mysqli_fetch_assoc($result);

        // Use password hashing instead of md5
        if (password_verify($PASS, $row["PASS"])) {
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["NAME"] = $row["NAME"];
            $_SESSION["ACCESS"] = $row["ACCESS"];

            // Use session_regenerate_id() to regenerate the session ID on login
            session_regenerate_id();

            if ($row["ACCESS"] == "admin") {
                header("Location: /Pages/Admin/dashboard_admin.php");
            } elseif ($row["ACCESS"] == "manager") {
                header("Location: /Pages/Manager/dashboard_manager.php");
            }
        }
    }
}
ob_end_flush(); // Send the buffered output
?>
<div class='fade flex flex-rows h-full'>
    <div class='flex-[40%] flex justify-center items-center'>
        <div class="flex justify-center items-center px-6 py-8 mx-auto">
            <div class="w-full bg-white rounded-lg shadow dark:border  dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4" method="post">
                        <div>
                            <label for="ID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                ID</label>
                            <input type="text" name="ID" id="ID"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="ID" required="">
                        </div>
                        <div>
                            <label for="PASS"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="PASS" id="PASS" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <button
                            class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class='img flex-[60%] flex justify-center items-center '>
        <img src="../../Assets/Login/Login-background.jpg" alt="" class="w-full h-full object-fill">
    </div>
</div>

<style>
    @media screen and (max-width: 768px) {
        .img {
            display: none;
        }
    }
</style>

<?php
// Include foot.php file
include __DIR__ . '/../../Components/foot.php';
?>