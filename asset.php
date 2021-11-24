<?php
if (($_SESSION['login']) === 'User' || ($_SESSION['login'])  === 'Admin') {
    $var = "logout";
    $tempLoc = "./logout.php";
    if ($_SESSION === 'Admin') {
        header("Location: ../admin/");
    }
} else {
    $var = "login";
    $tempLoc = "./login/login.php";
}

?>